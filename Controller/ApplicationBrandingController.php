<?php

namespace Kanboard\Plugin\ApplicationBranding\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;

/**
 * Plugin ApplicationBranding
 * Class ApplicationBrandingController
 * See tests/output_safety_contract.php for the administrator-only settings boundary.
 * @author aljawaid
 */

class ApplicationBrandingController extends BaseController
{
    /**
     * Display the Settings Page
     * Use this function to create a page showing your template content.
     * This function must be checked with 'Views - Add Menu Item - Template Hook' in Plugin.php
     * This function must be checked with 'Extra Page - Routes' in Plugin.php
     * Use: $this->helper->layout->config for config settings menu sidebar
     * Use: $this->helper->layout->plugin for plugin menu sidebar
     * @access public
     */

    public function show()
    {
        $this->response->html($this->helper->layout->config('applicationBranding:config/metadata', array(
            'title' => t('Application Branding'),
        )));
    }

    public function manualEdits()
    {
        $this->response->html($this->helper->layout->config('applicationBranding:config/manual-edits', array(
            'title' => t('Application Branding'),
        )));
    }

    /**
     * Save settings
     *
     */
    public function save()
    {
        if (!$this->userSession->isAdmin()) {
            throw new AccessForbiddenException();
        }

        $this->checkCSRFForm();
        $values = $this->request->getValues();
        $allowedSettings = array('meta_description');

        if (array_diff(array_keys($values), $allowedSettings) !== array()) {
            throw new AccessForbiddenException();
        }

        $values = array_intersect_key($values, array_flip($allowedSettings));

        if ($this->configModel->save($values)) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Settings saved successfully'));
        } else {
            $this->flash->failure(t('Unable to save your settings'));
        }

        $this->response->redirect($this->helper->url->to('ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding']));
    }
}
