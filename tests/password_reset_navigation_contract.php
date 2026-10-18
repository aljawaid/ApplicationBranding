<?php

/**
 * ApplicationBranding password-reset navigation contract.
 *
 * Related file: Template/password_reset/create.php.
 */

$template = file_get_contents(dirname(__DIR__) . '/Template/password_reset/create.php');
$failures = array();

if ($template === false) {
    fwrite(STDERR, 'Unable to read the password-reset template.' . PHP_EOL);
    exit(1);
}

if (strpos($template, "\$this->url->href('AuthController', 'login')") === false) {
    $failures[] = 'The password-reset return action does not use the Kanboard login route.';
}

if (strpos($template, '$this->url->base()') !== false) {
    $failures[] = 'The password-reset return action still uses the server-local base URL.';
}

if ($failures !== array()) {
    fwrite(STDERR, implode(PHP_EOL, $failures) . PHP_EOL);
    exit(1);
}

echo 'Password-reset navigation contract passed.' . PHP_EOL;
