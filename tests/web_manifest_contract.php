<?php

/**
 * Verify ApplicationBranding home-screen identity, URLs, icon sizes and access.
 *
 * Related files: Plugin.php, Helper/ApplicationBrandingHelper.php,
 * Controller/ManifestController.php and the two layout templates.
 */

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses -- Contract test defines minimal namespaced fixtures.
namespace Kanboard\Core {
    class Base
    {
        protected $container;

        public function __construct(array $container)
        {
            $this->container = $container;
        }

        public function __get($name)
        {
            return $this->container[$name];
        }
    }
}

namespace {
    use Kanboard\Plugin\ApplicationBranding\Helper\ApplicationBrandingHelper;

    require dirname(__DIR__) . '/Helper/ApplicationBrandingHelper.php';

    class ManifestConfigStub
    {
        private $values;

        public function __construct(array $values)
        {
            $this->values = $values;
        }

        public function get($name, $default = '')
        {
            return isset($this->values[$name]) ? $this->values[$name] : $default;
        }
    }

    function buildManifestForContract($url, $name)
    {
        $helper = new ApplicationBrandingHelper(array(
            'configModel' => new ManifestConfigStub(array(
                'application_url' => $url,
                'app_rename' => $name,
            )),
        ));

        return $helper->getWebManifest();
    }

    $manifest = buildManifestForContract('https://workspace.example.test/kanboard/', 'Shop Workspace');
    $expected = array(
        'id' => '/kanboard/',
        'name' => 'Shop Workspace',
        'short_name' => 'Shop Workspace',
        'start_url' => 'https://workspace.example.test/kanboard/',
        'scope' => '/kanboard/',
    );

    foreach ($expected as $key => $value) {
        if (!isset($manifest[$key]) || $manifest[$key] !== $value) {
            fwrite(STDERR, 'Incorrect manifest ' . $key . PHP_EOL);
            exit(1);
        }
    }

    if (
        count($manifest['icons']) !== 2
        || $manifest['icons'][0]['sizes'] !== '192x192'
        || $manifest['icons'][1]['sizes'] !== '512x512'
        || $manifest['icons'][1]['src'] !== 'https://workspace.example.test/kanboard/plugins/ApplicationBranding/Assets/img/favicon/android-chrome-512x512.png'
    ) {
        fwrite(STDERR, 'Manifest icons do not match the application subpath.' . PHP_EOL);
        exit(1);
    }

    $rootManifest = buildManifestForContract('https://workspace.example.test', '');
    if ($rootManifest['start_url'] !== 'https://workspace.example.test/' || $rootManifest['scope'] !== '/' || $rootManifest['name'] !== 'My Workspace') {
        fwrite(STDERR, 'Root URL or default name is incorrect.' . PHP_EOL);
        exit(1);
    }

    $unsafeUrls = array(
        '',
        'http://workspace.example.test/',
        'https://user@workspace.example.test/',
        'https://user:password@workspace.example.test/',
        'https://workspace.example.test/?token=secret',
        'https://workspace.example.test/#section',
        'javascript:alert(1)',
    );
    foreach ($unsafeUrls as $unsafeUrl) {
        if (buildManifestForContract($unsafeUrl, 'Workspace') !== array()) {
            fwrite(STDERR, 'Unsafe application URL produced a manifest.' . PHP_EOL);
            exit(1);
        }
    }

    $localManifest = buildManifestForContract('http://localhost:8000/kanboard/', 'Local Workspace');
    if (empty($localManifest) || $localManifest['start_url'] !== 'http://localhost:8000/kanboard/') {
        fwrite(STDERR, 'Local development URL was rejected.' . PHP_EOL);
        exit(1);
    }

    $dimensions = getimagesize(dirname(__DIR__) . '/Assets/img/favicon/android-chrome-512x512.png');
    if ($dimensions === false || $dimensions[0] !== 512 || $dimensions[1] !== 512) {
        fwrite(STDERR, 'The branded app icon is not 512 x 512 pixels.' . PHP_EOL);
        exit(1);
    }

    $plugin = file_get_contents(dirname(__DIR__) . '/Plugin.php');
    if (
        strpos($plugin, "applicationAccessMap->add('ManifestController', 'show', Role::APP_PUBLIC)") === false
        || strpos($plugin, "applicationAccessMap->add('ApplicationBrandingController', '*', Role::APP_ADMIN)") === false
        || strpos($plugin, "route->addRoute('/application-branding/manifest.webmanifest', 'ManifestController', 'show', 'ApplicationBranding')") === false
    ) {
        fwrite(STDERR, 'Manifest or settings access rules are incorrect.' . PHP_EOL);
        exit(1);
    }

    foreach (array('layout_latest.php', 'layout_customizer_latest.php') as $layout) {
        $contents = file_get_contents(dirname(__DIR__) . '/Template/' . $layout);
        if (
            strpos($contents, "href('ManifestController', 'show', array('plugin' => 'ApplicationBranding'))") === false
            || strpos($contents, 'getWebManifest() !== array()') === false
            || strpos($contents, 'site.webmanifest') !== false
        ) {
            fwrite(STDERR, 'A layout does not use the settings-based manifest: ' . $layout . PHP_EOL);
            exit(1);
        }
    }

    $controller = file_get_contents(dirname(__DIR__) . '/Controller/ManifestController.php');
    if (
        strpos($controller, "application/manifest+json; charset=utf-8") === false
        || strpos($controller, "withHeader('Cache-Control', 'no-store')") === false
        || strpos($controller, 'JSON_THROW_ON_ERROR') === false
    ) {
        fwrite(STDERR, 'Manifest response headers or encoding are incomplete.' . PHP_EOL);
        exit(1);
    }

    echo 'Home-screen manifest contract passed.' . PHP_EOL;
}
