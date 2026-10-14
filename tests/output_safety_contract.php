<?php

/**
 * ApplicationBranding output safety and theme contract.
 *
 * Related files: Controller/ApplicationBrandingController.php, Plugin.php,
 * Helper/ApplicationBrandingHelper.php, templates and Assets/css/application-branding.css.
 */

$pluginRoot = dirname(__DIR__);
$controller = file_get_contents($pluginRoot . '/Controller/ApplicationBrandingController.php');
$plugin = file_get_contents($pluginRoot . '/Plugin.php');
$helper = file_get_contents($pluginRoot . '/Helper/ApplicationBrandingHelper.php');
$stylesheet = file_get_contents($pluginRoot . '/Assets/css/application-branding.css');
$settings = file_get_contents($pluginRoot . '/Template/config/branding-settings.php');
$failures = array();

$templateIterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($pluginRoot . '/Template', FilesystemIterator::SKIP_DOTS)
);

foreach ($templateIterator as $template) {
    if (!$template->isFile() || $template->getExtension() !== 'php') {
        continue;
    }

    $contents = file_get_contents($template->getPathname());
    $relativePath = str_replace('\\', '/', substr($template->getPathname(), strlen($pluginRoot) + 1));

    if (preg_match('/<\?=\s*\$this->task->configModel->get\(/', $contents)) {
        $failures[] = $relativePath . ' renders configuration without explicit escaping.';
    }

    if (strpos($contents, "\$_SERVER['HTTP_HOST']") !== false || strpos($contents, "\$_SERVER['REQUEST_URI']") !== false) {
        $failures[] = $relativePath . ' constructs metadata from raw request values.';
    }

    foreach (preg_split('/\R/', $contents) as $line) {
        if (strpos($line, '<?=') !== false
            && strpos($line, 'getApplicationName()') !== false
            && strpos($line, '$this->text->e(') === false) {
            $failures[] = $relativePath . ' renders the application name without escaping.';
        }
    }
}

if (strpos($plugin, "applicationAccessMap->add('ApplicationBrandingController', '*', Role::APP_ADMIN)") === false) {
    $failures[] = 'ApplicationBranding configuration routes must require the administrator role.';
}

foreach (array('extends BaseController', 'userSession->isAdmin()', 'checkCSRFForm()', "array('meta_description')", 'array_diff(array_keys($values), $allowedSettings)') as $saveBoundary) {
    if (strpos($controller, $saveBoundary) === false) {
        $failures[] = 'The settings save boundary is missing: ' . $saveBoundary;
    }
}

foreach (array('getApplicationName()', 'getCanonicalUrl()', 'getCopyrightYears()', 'getHeaderLogoHeight()') as $helperCall) {
    if (strpos($helper, 'function ' . rtrim($helperCall, '()')) === false) {
        $failures[] = 'Missing validated output helper: ' . $helperCall;
    }
}

foreach (array("configModel->get('application_url')", 'request->getUri()', 'request->isSafeRedirectUri($requestUri)') as $canonicalBoundary) {
    if (strpos($helper, $canonicalBoundary) === false) {
        $failures[] = 'The canonical URL boundary is missing: ' . $canonicalBoundary;
    }
}

if (strpos($helper, "array('http', 'https')") === false
    || strpos($helper, "isset(\$base['user'])") === false
    || strpos($helper, "isset(\$base['pass'])") === false
    || strpos($helper, "isset(\$base['query'])") === false
    || strpos($helper, "isset(\$base['fragment'])") === false) {
    $failures[] = 'Canonical URLs must use a credential-free configured HTTP(S) origin.';
}

if (strpos($helper, "str_ireplace('</style', '<\\\\/style', \$customCss)") === false) {
    $failures[] = 'Custom CSS must not be able to close its containing style element.';
}

$styleBreakout = '</StYlE><script>alert(1)</script>';
$protectedCss = str_ireplace('</style', '<\\/style', $styleBreakout);
if (stripos($protectedCss, '</style') !== false || strpos($protectedCss, '<script>') === false) {
    $failures[] = 'The custom CSS style-breakout protection is not case-insensitive and content-preserving.';
}

foreach (array('var(--panel-background-color)', 'var(--input-background-color)', 'var(--button-primary-background-color)') as $themeVariable) {
    if (strpos($stylesheet, $themeVariable) === false) {
        $failures[] = 'Theme-aware styling is missing ' . $themeVariable . '.';
    }
}

foreach (array('.bold {', '.relative {', '.no-top {', '.no-bottom {', '.cursor {') as $globalSelector) {
    if (preg_match('/^' . preg_quote($globalSelector, '/') . '/m', $stylesheet)) {
        $failures[] = 'Unscoped utility selector remains: ' . $globalSelector;
    }
}

if ((strpos($settings, "t('application_branding.custom_css_warning')") === false
        && strpos($settings, "t('Administrator-supplied CSS is trusted and inserted without filtering. It can change every application page.')") === false)
    || strpos($settings, 'tooltipHTML') === false) {
    $failures[] = 'The custom CSS setting must explain its trusted, unfiltered behaviour in a helper tooltip.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Output safety and theme contract passed.' . PHP_EOL;
