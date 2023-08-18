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
     * Get Help Docs - Helper to generate a link to the documentation
     *
     * @see     about.php
     * @see     UrlHelper.php
     * @access  public
     * @return  string
     */
    public function getDocs($label, $file = '')
    {
        $url = sprintf(DOCUMENTATION_URL_PATTERN, $file);

        return sprintf('
            <a href="%s" class="channels-link" title="' . t('Opens in a new window') . '" rel="noopener noreferrer" target="_blank">
                <div class="icon-wrapper wrapper-docs">
                    <span class="kanboard-icon"></span>
                </div>
                <span class="channels-name">%s</span>
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
