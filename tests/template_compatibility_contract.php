<?php

/**
 * ApplicationBranding Kanboard template compatibility contract.
 *
 * Related files: Plugin.php and the layout, header and About template overrides.
 */

$pluginRoot = dirname(__DIR__);
$plugin = file_get_contents($pluginRoot . '/Plugin.php');
$layouts = array(
    'Template/layout_latest.php',
    'Template/layout_customizer_latest.php',
);
$headers = array(
    'Template/header/title.php',
    'Template/header/title_customizer.php',
);
$failures = array();

if (strpos($plugin, "return '>=1.2.54';") === false) {
    $failures[] = 'The plugin must require Kanboard 1.2.54 or later.';
}

foreach (array('version_compare(', "file_get_contents('ChangeLog'") as $obsoleteVersionCheck) {
    if (strpos($plugin, $obsoleteVersionCheck) !== false) {
        $failures[] = 'Obsolete runtime version detection remains in Plugin.php.';
    }
}

foreach (array('Template/layout.php', 'Template/layout_customizer.php') as $legacyLayout) {
    if (file_exists($pluginRoot . '/' . $legacyLayout)) {
        $failures[] = $legacyLayout . ' must be removed at the Kanboard 1.2.54 compatibility floor.';
    }
}

foreach ($layouts as $layout) {
    $contents = file_get_contents($pluginRoot . '/' . $layout);

    if (strpos($contents, 'isRtlLanguage()') === false) {
        $failures[] = $layout . ' must preserve Kanboard RTL markup.';
    }

    if (strpos($contents, 'apple-mobile-web-app-capable') === false) {
        $failures[] = $layout . ' must preserve Kanboard Apple web-app metadata.';
    }
}

foreach ($headers as $header) {
    $contents = file_get_contents($pluginRoot . '/' . $header);

    if (strpos($contents, "t('Task limit')") === false || strpos($contents, "t('Task Limit')") !== false) {
        $failures[] = $header . ' must use the Kanboard 1.2.54 Task limit translation key.';
    }
}

$about = file_get_contents($pluginRoot . '/Template/config/about.php');
if (strpos($about, 'foreach ($db_options as $option => $value)') === false) {
    $failures[] = 'The About template must display Kanboard SQLite options.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Template compatibility contract passed.' . PHP_EOL;
