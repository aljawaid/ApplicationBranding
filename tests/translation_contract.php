<?php

/**
 * ApplicationBranding translation completeness and isolation contract.
 *
 * Related files: Plugin.php, Locale catalogues and translated templates.
 */

$pluginRoot = dirname(__DIR__);
$localeFiles = array(
    'en_US' => $pluginRoot . '/Locale/en_US/translations.php',
    'en_GB' => $pluginRoot . '/Locale/en_GB/translations.php',
    'fr_FR' => $pluginRoot . '/Locale/fr_FR/translations.php',
);
$catalogues = array();
$failures = array();

foreach ($localeFiles as $locale => $localeFile) {
    if (!file_exists($localeFile)) {
        $failures[] = 'Missing locale catalogue: ' . $locale;
        continue;
    }

    $catalogues[$locale] = require $localeFile;
    foreach ($catalogues[$locale] as $key => $value) {
        if (strpos($key, 'application_branding.') !== 0) {
            $failures[] = $locale . ' contains an unnamespaced active key: ' . $key;
        }

        if (trim((string) $value) === '') {
            $failures[] = $locale . ' contains an empty translation: ' . $key;
        }
    }
}

if (count($catalogues) === count($localeFiles)) {
    $referenceKeys = array_keys($catalogues['en_US']);
    sort($referenceKeys);

    foreach ($catalogues as $locale => $catalogue) {
        $keys = array_keys($catalogue);
        sort($keys);
        if ($keys !== $referenceKeys) {
            $failures[] = $locale . ' does not contain the complete en_US key set.';
        }
    }
}

$sourceFiles = array_merge(
    array($pluginRoot . '/Plugin.php', $pluginRoot . '/Helper/ApplicationBrandingHelper.php'),
    iterator_to_array(new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($pluginRoot . '/Template', FilesystemIterator::SKIP_DOTS)
    ))
);
$usedKeys = array();
$coreKeysUsed = array();

foreach ($sourceFiles as $sourceFile) {
    if (!is_file($sourceFile) || pathinfo($sourceFile, PATHINFO_EXTENSION) !== 'php') {
        continue;
    }

    $contents = file_get_contents($sourceFile);
    preg_match_all("/(?:t|e)\\('((?:application_branding\\.)[^']+)'/", $contents, $matches);
    $usedKeys = array_merge($usedKeys, $matches[1]);
    preg_match_all("/(?<![A-Za-z0-9_>])(?:t|e)\\('((?!application_branding\\.)[^']+)'/", $contents, $coreMatches);
    $coreKeysUsed = array_merge($coreKeysUsed, $coreMatches[1]);
}

$usedKeys = array_values(array_unique($usedKeys));
sort($usedKeys);
$catalogueKeys = isset($catalogues['en_US']) ? array_keys($catalogues['en_US']) : array();
sort($catalogueKeys);

if ($usedKeys !== $catalogueKeys) {
    $failures[] = 'The en_US catalogue and namespaced source keys are not identical.';
}

$starterCatalogue = require $pluginRoot . '/Locale/translations-starter-template.php';
$starterKeys = array_keys($starterCatalogue);
sort($starterKeys);
if ($starterKeys !== $catalogueKeys) {
    $failures[] = 'The translation starter template is not complete.';
}

$kanboardRoot = getenv('KANBOARD_ROOT');
$kanboardFrenchCatalogue = $kanboardRoot . '/app/Locale/fr_FR/translations.php';
if ($kanboardRoot !== false && file_exists($kanboardFrenchCatalogue)) {
    $kanboardKeys = array_keys(require $kanboardFrenchCatalogue);
    foreach (array_unique($coreKeysUsed) as $coreKey) {
        if (!in_array($coreKey, $kanboardKeys, true)) {
            $failures[] = 'Unnamespaced source key is not translated by Kanboard fr_FR: ' . $coreKey;
        }
    }
}

$plugin = file_get_contents($pluginRoot . '/Plugin.php');
if (strpos($plugin, "Translator::load('en_US'") === false) {
    $failures[] = 'Plugin.php must load en_US before the selected locale.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Translation completeness and isolation contract passed.' . PHP_EOL;
