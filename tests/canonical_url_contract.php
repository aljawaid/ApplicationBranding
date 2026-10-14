<?php

/**
 * ApplicationBranding canonical URL contract.
 *
 * Related file: Helper/ApplicationBrandingHelper.php.
 */

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

    class CanonicalUrlConfigStub
    {
        private $applicationUrl;

        public function __construct($applicationUrl)
        {
            $this->applicationUrl = $applicationUrl;
        }

        public function get($name, $default = '')
        {
            return $name === 'application_url' ? $this->applicationUrl : $default;
        }
    }

    class CanonicalUrlRequestStub
    {
        private $uri;

        public function __construct($uri)
        {
            $this->uri = $uri;
        }

        public function getUri()
        {
            return $this->uri;
        }

        public function isSafeRedirectUri($uri)
        {
            if ($uri === '' || $uri[0] !== '/' || strpos($uri, '//') === 0 || strpos($uri, '\\') !== false) {
                return false;
            }

            $parsed = parse_url($uri);

            return $parsed !== false && !isset($parsed['scheme'], $parsed['host']);
        }
    }

    function getCanonicalUrlForContract($applicationUrl, $requestUri)
    {
        $helper = new ApplicationBrandingHelper(array(
            'configModel' => new CanonicalUrlConfigStub($applicationUrl),
            'request' => new CanonicalUrlRequestStub($requestUri),
        ));

        return $helper->getCanonicalUrl();
    }

    $cases = array(
        'task route' => array(
            'https://kanboard.example.test/workspace/',
            '/workspace/?controller=TaskViewController&action=show&task_id=42',
            'https://kanboard.example.test/workspace/?controller=TaskViewController&action=show&task_id=42',
        ),
        'plug-in route' => array(
            'https://kanboard.example.test/workspace/',
            '/workspace/?controller=ExampleController&action=show&plugin=Example&item_id=7',
            'https://kanboard.example.test/workspace/?controller=ExampleController&action=show&plugin=Example&item_id=7',
        ),
        'unconfigured application URL' => array(
            '',
            '/workspace/?controller=DashboardController&action=show',
            '',
        ),
        'unsafe request URI' => array(
            'https://kanboard.example.test/workspace/',
            '//attacker.example.test/forged',
            'https://kanboard.example.test/workspace',
        ),
        'credential-bearing application URL' => array(
            'https://user:password@kanboard.example.test/workspace/',
            '/workspace/',
            '',
        ),
    );

    foreach ($cases as $name => $case) {
        list($applicationUrl, $requestUri, $expected) = $case;
        $actual = getCanonicalUrlForContract($applicationUrl, $requestUri);

        if ($actual !== $expected) {
            fwrite(STDERR, $name . ' failed: expected ' . $expected . ', received ' . $actual . PHP_EOL);
            exit(1);
        }
    }

    echo 'Canonical URL contract passed.' . PHP_EOL;
}
