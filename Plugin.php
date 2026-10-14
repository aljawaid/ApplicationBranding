<?php

namespace Kanboard\Plugin\ApplicationBranding;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Core\Translator;
use Kanboard\Helper;

class Plugin extends Base
{
    public function initialize()
    {
        // Keep all branding configuration routes administrator-only; see tests/output_safety_contract.php.
        $this->applicationAccessMap->add('ApplicationBrandingController', '*', Role::APP_ADMIN);

        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        if (file_exists('plugins/Customizer')) {
            $this->template->setTemplateOverride('layout', 'applicationBranding:layout_customizer_latest');
            $this->template->setTemplateOverride('header/title', 'applicationBranding:header/title_customizer');
            $this->template->setTemplateOverride('auth/index', 'applicationBranding:auth/index_customizer');
        } else {
            $this->template->setTemplateOverride('layout', 'applicationBranding:layout_latest');
            $this->template->setTemplateOverride('header/title', 'applicationBranding:header/title');
            $this->template->setTemplateOverride('auth/index', 'applicationBranding:auth/index');
        }

        $this->template->setTemplateOverride('password_reset/change', 'applicationBranding:password_reset/change');
        $this->template->setTemplateOverride('password_reset/create', 'applicationBranding:password_reset/create');
        $this->template->setTemplateOverride('password_reset/email', 'applicationBranding:password_reset/email');
        $this->template->setTemplateOverride('config/about', 'applicationBranding:config/about');
        $this->template->setTemplateOverride('twofactor/check', 'applicationBranding:twofactor/check');

        // CSS - Asset Hook
        $this->hook->on('template:layout:css', array('template' => 'plugins/ApplicationBranding/Assets/css/application-branding.css'));
        $this->hook->on('template:layout:css', array('template' => 'plugins/ApplicationBranding/Assets/css/application-branding-icons.css'));

        // JS - Asset Hook
        $this->hook->on('template:layout:js', array('template' => 'plugins/ApplicationBranding/Assets/js/application-branding.js'));

        // Views - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:application', 'applicationBranding:config/branding-settings');
        $this->template->hook->attach('template:layout:head', 'applicationBranding:layout_head_hook');

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'applicationBranding:config/sidebar');

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'MyController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('/settings/metadata', 'ApplicationBrandingController', 'show', 'ApplicationBranding');
        $this->route->addRoute('/security-check', 'TwoFactorController', 'code');
        $this->route->addRoute('/settings/manual-edits', 'ApplicationBrandingController', 'manualEdits', 'ApplicationBranding');

        // Helper
        //  - Example: $this->helper->register('helperClassNameCamelCase', '\Kanboard\Plugin\PluginNameExampleStudlyCaps\Helper\HelperNameExampleStudlyCaps');
        //  - Add each Helper in the 'use' section at the top of this file
        $this->helper->register('applicationBrandingHelper', '\Kanboard\Plugin\ApplicationBranding\Helper\ApplicationBrandingHelper');
    }

    public function onStartup()
    {
        // Load the complete US English catalogue first, then override it with the selected locale.
        Translator::load('en_US', __DIR__ . '/Locale');

        $currentLanguage = $this->languageModel->getCurrentLanguage();
        if ($currentLanguage !== 'en_US') {
            Translator::load($currentLanguage, __DIR__ . '/Locale');
        }
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions - do not translate the plugin name here
        return 'ApplicationBranding';
    }

    public function getPluginDescription()
    {
        return t('application_branding.plugin_description');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '4.0.0';
    }

    public function getCompatibleVersion()
    {
        // See tests/template_compatibility_contract.php.
        return '>=1.2.54';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/ApplicationBranding';
    }
}
