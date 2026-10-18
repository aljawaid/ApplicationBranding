<?php

/**
 * ApplicationBranding dashboard and manual-edit contrast contract.
 *
 * Related file: Assets/css/application-branding.css.
 */

$stylesheet = file_get_contents(dirname(__DIR__) . '/Assets/css/application-branding.css');
$failures = array();

if (!preg_match('/--dashboard-card-blend-color:\s*#([0-9A-Fa-f]{6});/', $stylesheet, $blendMatch)) {
    $failures[] = 'The dashboard card blend colour is missing or invalid.';
}

if (strpos($stylesheet, 'background-blend-mode: multiply;') === false) {
    $failures[] = 'Dashboard gradients must use multiply blending.';
}

$cardClasses = array(
    'back-orange',
    'back-copper',
    'back-grey',
    'back-red',
    'back-green',
    'back-purple',
    'back-deep-green',
);

if (isset($blendMatch[1])) {
    $blend = array(
        hexdec(substr($blendMatch[1], 0, 2)),
        hexdec(substr($blendMatch[1], 2, 2)),
        hexdec(substr($blendMatch[1], 4, 2)),
    );

    foreach ($cardClasses as $cardClass) {
        if (!preg_match('/\.' . preg_quote($cardClass, '/') . '\s*\{([^}]+)\}/s', $stylesheet, $cardMatch)) {
            $failures[] = 'Missing dashboard card gradient: ' . $cardClass;
            continue;
        }

        preg_match_all('/rgb\((\d+),\s*(\d+),\s*(\d+)\)/', $cardMatch[1], $stops, PREG_SET_ORDER);
        if ($stops === array()) {
            $failures[] = 'Missing RGB stops for dashboard card gradient: ' . $cardClass;
            continue;
        }

        foreach ($stops as $stop) {
            $blended = array(
                (int) round(((int) $stop[1] * $blend[0]) / 255),
                (int) round(((int) $stop[2] * $blend[1]) / 255),
                (int) round(((int) $stop[3] * $blend[2]) / 255),
            );
            $luminance = 0.2126 * linearize($blended[0])
                + 0.7152 * linearize($blended[1])
                + 0.0722 * linearize($blended[2]);
            $contrast = 1.05 / ($luminance + 0.05);

            if ($contrast < 4.5) {
                $failures[] = sprintf(
                    '%s has a blended gradient stop below WCAG AA contrast: %.2f:1.',
                    $cardClass,
                    $contrast
                );
            }
        }
    }
}

$themeVariables = array(
    'manual-code-background-color',
    'manual-code-color',
    'manual-kbd-background-color',
);
$themeColors = array();

foreach ($themeVariables as $themeVariable) {
    $pattern = '/--' . preg_quote($themeVariable, '/')
        . ':\s*light-dark\(#([0-9A-Fa-f]{6}),\s*#([0-9A-Fa-f]{6})\);/';
    if (!preg_match($pattern, $stylesheet, $themeMatch)) {
        $failures[] = 'Missing Light and Dark colours for ' . $themeVariable . '.';
        continue;
    }

    $themeColors[$themeVariable] = array($themeMatch[1], $themeMatch[2]);
}

foreach (array(
    'color: var(--manual-code-color);',
    'background-color: var(--manual-code-background-color);',
    'background-color: var(--manual-kbd-background-color);',
) as $manualStyle) {
    if (strpos($stylesheet, $manualStyle) === false) {
        $failures[] = 'Missing manual-edit theme style: ' . $manualStyle;
    }
}

if (count($themeColors) === count($themeVariables)) {
    foreach (array(0 => 'Light', 1 => 'Dark') as $index => $themeName) {
        $foreground = $themeColors['manual-code-color'][$index];
        foreach (array('code' => 'manual-code-background-color', 'keyboard' => 'manual-kbd-background-color') as $label => $backgroundVariable) {
            $contrast = contrastRatio($foreground, $themeColors[$backgroundVariable][$index]);
            if ($contrast < 4.5) {
                $failures[] = sprintf(
                    '%s-theme manual-edit %s contrast is below WCAG AA: %.2f:1.',
                    $themeName,
                    $label,
                    $contrast
                );
            }
        }
    }
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Dashboard card contrast contract passed.' . PHP_EOL;

/**
 * Convert an sRGB channel to linear light for WCAG contrast calculations.
 */
function linearize($channel)
{
    $value = $channel / 255;

    return $value <= 0.04045
        ? $value / 12.92
        : (($value + 0.055) / 1.055) ** 2.4;
}

/**
 * Calculate the WCAG contrast ratio between two six-digit hexadecimal colours.
 */
function contrastRatio($foreground, $background)
{
    $colors = array();
    foreach (array($foreground, $background) as $hex) {
        $red = hexdec(substr($hex, 0, 2));
        $green = hexdec(substr($hex, 2, 2));
        $blue = hexdec(substr($hex, 4, 2));
        $colors[] = 0.2126 * linearize($red)
            + 0.7152 * linearize($green)
            + 0.0722 * linearize($blue);
    }

    $lighter = max($colors);
    $darker = min($colors);

    return ($lighter + 0.05) / ($darker + 0.05);
}
