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
     * Determine whether authentication pages may display the visitor address.
     *
     * The privacy-first default is hidden when the setting has not yet been saved.
     * See tests/ip_visibility_contract.php.
     *
     * @access public
     * @return boolean
     */
    public function shouldShowRemoteAddress()
    {
        return $this->configModel->get('app_branding_show_ip_address') === 'visible';
    }

    /**
     * Return the web server's validated remote address.
     *
     * @access public
     * @return string
     */
    public function getRemoteAddress()
    {
        $remoteAddress = isset($_SERVER['REMOTE_ADDR']) ? (string) $_SERVER['REMOTE_ADDR'] : '';

        return filter_var($remoteAddress, FILTER_VALIDATE_IP) !== false ? $remoteAddress : '';
    }

    /**
     * Determine whether a remote address is the local machine.
     *
     * @access public
     * @param  string $remoteAddress
     * @return boolean
     */
    public function isLocalRemoteAddress($remoteAddress)
    {
        return $remoteAddress === '127.0.0.1' || $remoteAddress === '::1';
    }

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
