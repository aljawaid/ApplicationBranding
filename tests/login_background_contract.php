<?php

/**
 * ApplicationBranding login background contract.
 *
 * Related files: Helper/ApplicationBrandingHelper.php, configuration and layout templates.
 */

$pluginRoot = dirname(__DIR__);
$helper = file_get_contents($pluginRoot . '/Helper/ApplicationBrandingHelper.php');
$settings = file_get_contents($pluginRoot . '/Template/config/branding-settings.php');
$stylesheet = file_get_contents($pluginRoot . '/Assets/css/application-branding.css');
$layouts = array(
    'Template/layout_latest.php',
    'Template/layout_customizer_latest.php',
);

$failures = array();

if (strpos($settings, "isset(\$values['app_branding_login_background']) ? \$values['app_branding_login_background'] : 'default'") === false) {
    $failures[] = 'The login background setting must default to the active theme.';
}

foreach (
    array(
        array("'default' => t('Use theme background')", "'default' => t('application_branding.use_theme_background')"),
        array("'white' => t('Use white background')", "'white' => t('application_branding.use_white_background')"),
    ) as $optionVariants
) {
    if (strpos($settings, $optionVariants[0]) === false && strpos($settings, $optionVariants[1]) === false) {
        $failures[] = 'The login background setting is missing an expected option.';
    }
}

if (strpos($helper, "get('app_branding_login_background') !== 'white'") === false) {
    $failures[] = 'The white background class must require the explicit white setting.';
}

if (strpos($stylesheet, 'body.application-branding-background-white') === false || strpos($stylesheet, 'background-image: none') === false) {
    $failures[] = 'The white background option must disable the theme background image.';
}

foreach ($layouts as $layout) {
    $contents = file_get_contents($pluginRoot . '/' . $layout);

    if (strpos($contents, 'getAuthenticationBackgroundClass($incomingController)') === false) {
        $failures[] = $layout . ' must apply the selected authentication background.';
    }
}

$remoteUrlPatterns = array('source.unsplash.com', 'images.unsplash.com', 'api.unsplash.com');
foreach ($remoteUrlPatterns as $pattern) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pluginRoot, FilesystemIterator::SKIP_DOTS));
    foreach ($iterator as $file) {
        if (
            $file->isFile()
            && $file->getPathname() !== __FILE__
            && strpos($file->getPathname(), DIRECTORY_SEPARATOR . '.git' . DIRECTORY_SEPARATOR) === false
        ) {
            if (strpos(file_get_contents($file->getPathname()), $pattern) !== false) {
                $failures[] = 'Third-party background reference remains in ' . $file->getPathname();
            }
        }
    }
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, array_unique($failures)) . PHP_EOL);
    exit(1);
}

echo 'Login background contract passed.' . PHP_EOL;
