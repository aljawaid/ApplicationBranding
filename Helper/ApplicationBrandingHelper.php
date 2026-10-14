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
     * Return the optional white background class for authentication pages.
     *
     * An empty class preserves the active Kanboard or user-theme background.
     * See tests/login_background_contract.php.
     *
     * @access public
     * @param  string $controller
     * @return string
     */
    public function getAuthenticationBackgroundClass($controller)
    {
        $authenticationControllers = array('AuthController', 'PasswordResetController', 'TwoFactorController');

        if ($this->configModel->get('app_branding_login_background') !== 'white') {
            return '';
        }

        return in_array($controller, $authenticationControllers, true) ? 'application-branding-background-white' : '';
    }

    /**
     * Return the configured application name or the translated default.
     *
     * See tests/output_safety_contract.php.
     *
     * @access public
     * @return string
     */
    public function getApplicationName()
    {
        $applicationName = trim((string) $this->configModel->get('app_rename'));

        return $applicationName !== '' ? $applicationName : t('application_branding.workspace_name');
    }

    /**
     * Return the current canonical URL using only the configured application origin.
     *
     * See tests/canonical_url_contract.php and tests/output_safety_contract.php.
     *
     * @access public
     * @return string
     */
    public function getCanonicalUrl()
    {
        $applicationUrl = trim((string) $this->configModel->get('application_url'));
        $base = parse_url($applicationUrl);

        if (
            $applicationUrl === ''
            || filter_var($applicationUrl, FILTER_VALIDATE_URL) === false
            || $base === false
            || !isset($base['scheme'], $base['host'])
            || !in_array(strtolower($base['scheme']), array('http', 'https'), true)
            || isset($base['user'])
            || isset($base['pass'])
            || isset($base['query'])
            || isset($base['fragment'])
        ) {
            return '';
        }

        $requestUri = (string) $this->request->getUri();
        if (!$this->request->isSafeRedirectUri($requestUri)) {
            return rtrim($applicationUrl, '/');
        }

        $origin = strtolower($base['scheme']) . '://' . $base['host'];
        if (isset($base['port'])) {
            $origin .= ':' . $base['port'];
        }

        return $origin . $requestUri;
    }

    /**
     * Return a validated copyright year range.
     *
     * @access public
     * @return string
     */
    public function getCopyrightYears()
    {
        $currentYear = (int) date('Y');
        $configuredYear = trim((string) $this->configModel->get('copyright_from'));

        if (!preg_match('/^\d{4}$/', $configuredYear)) {
            return (string) $currentYear;
        }

        $startYear = (int) $configuredYear;
        if ($startYear < 1000 || $startYear >= $currentYear) {
            return (string) $currentYear;
        }

        return $startYear . '-' . $currentYear;
    }

    /**
     * Return a bounded Customizer header-logo height.
     *
     * @access public
     * @return integer
     */
    public function getHeaderLogoHeight()
    {
        $height = (int) $this->configModel->get('headerlogo_size', '30');

        return max(1, min(512, $height));
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
            <a href="%s" class="channels-link" title="' . t('application_branding.opens_new_window') . '" rel="noopener noreferrer" target="_blank">
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
        $customCss = (string) $this->configModel->get('app_branding_custom_head_css');

        if ($customCss !== '') {
            // Prevent stored values from closing the style element while preserving administrator CSS.
            $customCss = str_ireplace('</style', '<\\/style', $customCss);

            return '<style>' . $customCss . '</style>';
        }

        return '';
    }
}
