<?php

namespace Kanboard\Plugin\ApplicationBranding\Helper;

use Kanboard\Core\Base;

/**
 * ApplicationBranding Helper
 *
 * @package  Helper
 * @author   aljawaid
 */
class ApplicationBrandingHelper extends Base
{
    /**
     * Get Help Docs
     *
     * @see     about.php
     * @access  public
     * @return  string
     */
    public function getDocs($label, $file)
    {
        $version = 'latest';

        if (substr(APP_VERSION, 0, 1) === 'v') {
            $version = substr(APP_VERSION, 1);
        } elseif (ctype_digit(substr(APP_VERSION, 0, 1))) {
            $version = APP_VERSION;
        }

        $url = sprintf(DOCUMENTATION_URL_PATTERN, $version, $file);
        return sprintf('
            <a href="%s" class="channels-link" title="' . t('Opens in a new window') . '" rel="noopener noreferrer" target="_blank">
                <div class="icon-wrapper wrapper-docs">
                    <span class="kanboard-icon"></span>
                </div> %s
            </a>', $url, $label);
    }

    /**
     * Get Custom CSS
     *
     * Loads styles inline at the bottom of the 'head' section
     * @access      public
     * @return      string
     */
    public function customHeadCss()
    {
        if ($this->configModel->get('app_branding_custom_head_css')) {
            return '<style>' . $this->configModel->get('app_branding_custom_head_css') . '</style>';
        }

        return '';
    }
}
