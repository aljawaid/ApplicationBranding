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
                    <svg version="1.0" width="20px" height="20px" class="kanboard-icon" fill="currentColor" viewBox="0 0 144 144" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0.000000,144.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                            <path fill="#000000" d="M820 704 l0 -525 208 3 c204 3 208 3 260 31 91 48 135 132 135 257 -1 123 -46 212 -127 252 l-44 21 41 21 c56 28 86 84 94 174 8 99 -14 167 -71 220 -66 61 -116 72 -323 72 l-173 0 0 -526z m375 392 c50 -21 75 -68 75 -141 0 -72 -14 -102 -59 -132 -31 -21 -45 -23 -157 -23 l-124 0 0 155 0 155 115 0 c78 0 127 -5 150 -14z m33 -441 c52 -32 75 -90 71 -185 -4 -88 -21 -120 -78 -154 -27 -16 -54 -19 -159 -20 l-127 -1 -3 193 -2 194 132 -4 c111 -2 139 -6 166 -23z"/>
                            <path fill="#d40000" d="M90 705 l0 -515 90 0 90 0 2 201 3 201 139 -197 c77 -108 145 -199 151 -201 6 -3 59 -3 117 -2 l105 3 -188 265 c-104 146 -186 271 -184 278 3 7 76 113 163 235 87 122 162 228 166 235 6 9 -17 12 -98 12 l-105 0 -133 -186 -133 -186 -3 186 -2 186 -90 0 -90 0 0 -515z"/>
                        </g>
                    </svg>
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
