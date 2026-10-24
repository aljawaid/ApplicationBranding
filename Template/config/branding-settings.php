<?php
// Explain how the administrator's existing settings drive the home-screen shortcut.
?><fieldset id="AppBrandingSettings" class="panel app-branding-settings">
    <h3 class="">
        <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="" width="30px" alt="<?= t('application_branding.workspace_logo') ?>">
        <?= t('application_branding.settings_title') ?>
    </h3>
    <fieldset class="app-name-settings">
        <legend class="">
            <?= t('application_branding.application_name') ?>
            <?= $this->app->tooltipHTML($this->text->e(t('application_branding.home_screen_help'))) ?>
        </legend>
        <p class=""><?= t('application_branding.application_name_help') ?></p>
        <div class="">
            <div class="app-rename">
                <?= $this->form->label(t('application_branding.site_name'), 'app_rename', array('class=""')) ?>
                <?= $this->form->text('app_rename', $values, $errors, array('placeholder="My Workspace"'), 'site-name-text') ?>
                <p class="form-help"><?= t('application_branding.application_name_default') ?></p>
            </div>
        </div>
    </fieldset>
    <fieldset class="login-page-settings">
        <legend class=""><?= t('application_branding.login_page') ?></legend>
        <p class=""><?= t('application_branding.login_settings_help') ?></p>
        <fieldset class="settings-subsection">
            <legend><?= t('application_branding.login_title') ?></legend>
            <div class="visitor-warning">
                <?= $this->form->label(t('application_branding.visitor_warning'), 'login_warning', array('class=""')) ?>
                <?= $this->form->text('login_warning', $values, $errors, array('placeholder="' . t('application_branding.authorised_users_only') . '"'), 'login-warning-text') ?>
                <p class="form-help"><?= t('application_branding.login_title_help') ?></p>
            </div>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('application_branding.login_text') ?></legend>
            <div class="login-message">
                <?= $this->form->label(t('application_branding.login_message'), 'login_message', array('class=""')) ?>
                <?= $this->form->textarea('login_message', $values, $errors, array('placeholder="' . t('application_branding.productivity_message') . '"'), 'login-message-textarea') ?>
                <p class="form-help"><?= t('application_branding.login_message_help') ?></p>
            </div>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('application_branding.ip_address') ?></legend>
            <?php $ipAddressVisibility = isset($values['app_branding_show_ip_address']) ? $values['app_branding_show_ip_address'] : 'hidden' ?>
            <?= $this->form->radios('app_branding_show_ip_address', array(
                'hidden' => t('application_branding.hide_ip_address'),
                'visible' => t('application_branding.show_ip_address'),
            ), array('app_branding_show_ip_address' => $ipAddressVisibility)) ?>
            <p class="form-help"><?= t('application_branding.ip_address_help') ?></p>
            <p class="form-help"><?= t('application_branding.ip_address_proxy_help') ?></p>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('application_branding.login_background') ?></legend>
            <?php $loginBackground = isset($values['app_branding_login_background']) ? $values['app_branding_login_background'] : 'default' ?>
            <?= $this->form->radios('app_branding_login_background', array(
                'default' => t('application_branding.use_theme_background'),
                'white' => t('application_branding.use_white_background'),
            ), array('app_branding_login_background' => $loginBackground)) ?>
            <p class="form-help"><?= t('application_branding.login_background_help') ?></p>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('application_branding.copyright') ?></legend>
            <div class="app-copyright">
                <?= $this->form->label(t('application_branding.from_year'), 'copyright_from', array('class=""')) ?>
                <?= $this->form->number('copyright_from', $values, $errors, array('placeholder="2014"'), 'copyright-from') ?>
                <p class="form-help"><?= t('application_branding.copyright_year_help') ?></p>
            </div>
        </fieldset>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue" title="<?= t('application_branding.save_settings_help') ?>"><?= t('application_branding.save_settings') ?></button>
        </div>
    </fieldset>
    <?php // See tests/output_safety_contract.php for the trusted administrator CSS boundary. ?>
    <fieldset class="site-metadata-settings">
        <legend class="">
            <?= t('application_branding.custom_css') ?>
            <?= $this->app->tooltipHTML($this->text->e(t('application_branding.custom_css_warning'))) ?>
        </legend>
        <?= $this->form->label(t('application_branding.head_stylesheet'), 'app_branding_custom_head_css', array('class=""')) ?>
        <?= $this->form->textarea('app_branding_custom_head_css', $values, $errors, array('placeholder=" a {color: red; }"'), 'custom-head-css') ?>
        <p class="form-help"><?= e('application_branding.custom_css_help', '<i>head</i>', '<i>head</i>') ?></p>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('application_branding.site_metadata') ?></legend>
        <p class="">
            <span class="section-desc">
                <span class="metadata-html-icon"></span>
            </span>
            <?= e('application_branding.metadata_help', $this->url->link(t('application_branding.site_metadata'), 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('application_branding.visit_page'), false, '')) ?>
        </p>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('application_branding.manual_edits') ?></legend>
        <p class="">
            <span class="section-desc">
                <span class="manual-edits-icon"></span>
            </span>
            <?= e('application_branding.manual_edits_help', $this->url->link(t('application_branding.manual_edits'), 'ApplicationBrandingController', 'manualEdits', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('application_branding.visit_page'), false, '')) ?>
        </p>
    </fieldset>
</fieldset>
