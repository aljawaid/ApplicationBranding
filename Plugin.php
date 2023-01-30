<?php

namespace Kanboard\Plugin\ApplicationBranding;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Helper;  // Add core Helper for using forms etc. inside external templates

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('layout', 'applicationBranding:layout');
        $this->template->setTemplateOverride('header/title', 'applicationBranding:header/title');
        $this->template->setTemplateOverride('auth/index', 'applicationBranding:auth/index');
        $this->template->setTemplateOverride('password_reset/change', 'applicationBranding:password_reset/change');
        $this->template->setTemplateOverride('password_reset/create', 'applicationBranding:password_reset/create');
        $this->template->setTemplateOverride('password_reset/email', 'applicationBranding:password_reset/email');
        $this->template->setTemplateOverride('config/about', 'applicationBranding:config/about');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/ApplicationBranding/Assets/css/application-branding.css'));

        // Views - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:application', 'applicationBranding:config/branding-settings');

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:sidebar', 'applicationBranding:config/sidebar');

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'myController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('/settings/metadata', 'ApplicationBrandingController', 'show', 'ApplicationBranding');

    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions
        // Do not translate the plugin name here
        return 'ApplicationBranding';
    }

    public function getPluginDescription()
    {
        return t('This plugin will rename your installation to \'My Workspace\', and include matching device icons in the site metadata for a better user experience. A revamped login page, with a new Admin Dashboard showing global installation activity data with corrected page titles will give a more professional appeal across the site and when sharing links.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/ApplicationBranding';
    }
}
