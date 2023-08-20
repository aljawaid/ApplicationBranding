<?php

namespace Kanboard\Plugin\ApplicationBranding;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Helper;

class Plugin extends Base
{
    public function initialize()
    {
        // Get accurate version of Kanboard
        $accurate_version = str_replace('v', '', APP_VERSION);
        $accurate_version = preg_replace('/\s+/', '', $accurate_version);

        if (strpos(APP_VERSION, 'master') !== false || strpos(APP_VERSION, 'main') !== false && file_exists('ChangeLog')) {
            $accurate_version = trim(file_get_contents('ChangeLog', false, null, 8, 6), ' ');
        }

        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        if (file_exists('plugins/Customizer')) {
            if (version_compare($accurate_version, '1.2.29') >= 0) {
                $this->template->setTemplateOverride('layout', 'applicationBranding:layout_customizer_latest');
            } else {
                $this->template->setTemplateOverride('layout', 'applicationBranding:layout_customizer');
            }
            $this->template->setTemplateOverride('header/title', 'applicationBranding:header/title_customizer');
            $this->template->setTemplateOverride('auth/index', 'applicationBranding:auth/index_customizer');
        } else {
            if (version_compare($accurate_version, '1.2.29') >= 0) {
                $this->template->setTemplateOverride('layout', 'applicationBranding:layout_latest');
            } else {
                $this->template->setTemplateOverride('layout', 'applicationBranding:layout');
            }
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
        //  - Example: $this->route->addRoute('/my/custom/route', 'myController', 'show', 'PluginNameExampleStudlyCaps');
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
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions - do not translate the plugin name here
        return 'ApplicationBranding';
    }

    public function getPluginDescription()
    {
        return t('This plugin will rename your installation to \'My Workspace\' and include matching device icons in the site metadata for a better user experience. A revamped login page, with a new Admin Dashboard showing global installation activity data with corrected page titles will give a more professional appeal across the site and when sharing links.');
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
        // Examples: '>=1.0.37' '<1.0.37' '<=1.0.37'
        // Tested on KB v1.2.20 upto plugin v3.3.0, then KB v1.2.32+
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/ApplicationBranding';
    }
}
