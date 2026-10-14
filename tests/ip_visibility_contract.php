<?php

/**
 * ApplicationBranding IP visibility contract.
 *
 * Related files: Helper/ApplicationBrandingHelper.php and authentication templates.
 */

$pluginRoot = dirname(__DIR__);
$helper = file_get_contents($pluginRoot . '/Helper/ApplicationBrandingHelper.php');
$settings = file_get_contents($pluginRoot . '/Template/config/branding-settings.php');
$translations = file_get_contents($pluginRoot . '/Locale/en_GB/translations.php');
$templates = array(
    'Template/auth/index.php',
    'Template/auth/index_customizer.php',
    'Template/password_reset/create.php',
    'Template/twofactor/check.php',
);

$failures = array();

if (strpos($helper, "get('app_branding_show_ip_address') === 'visible'") === false) {
    $failures[] = 'IP visibility must require the explicit visible setting.';
}

if (strpos($settings, "isset(\$values['app_branding_show_ip_address']) ? \$values['app_branding_show_ip_address'] : 'hidden'") === false) {
    $failures[] = 'The IP visibility setting must default to hidden.';
}

if (strpos($settings . $translations, 'Works with Apache, Nginx and other web servers') === false) {
    $failures[] = 'The IP visibility setting must explain its web-server support.';
}

if (strpos($settings . $translations, 'Reverse-proxy forwarding is not handled') === false) {
    $failures[] = 'The IP visibility setting must explain the reverse-proxy security boundary.';
}

foreach ($templates as $template) {
    $contents = file_get_contents($pluginRoot . '/' . $template);

    if (strpos($contents, 'shouldShowRemoteAddress()') === false) {
        $failures[] = $template . ' must respect the IP visibility setting.';
    }

    if (strpos($contents, '$_SERVER["REMOTE_ADDR"]') !== false || strpos($contents, "\$_SERVER['REMOTE_ADDR']") !== false) {
        $failures[] = $template . ' must not render the raw server value.';
    }
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'IP visibility contract passed.' . PHP_EOL;
