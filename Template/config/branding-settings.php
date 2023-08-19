<fieldset id="AppBrandingSettings" class="panel app-branding-settings">
    <h3 class="">
        <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="" width="30px" alt="<?= t('Workspace logo') ?>">
        <?= t('Application Branding') ?>
    </h3>
    <fieldset class="app-name-settings">
        <legend class=""><?= t('Application Name') ?></legend>
        <p class=""><?= t('Enter the new name for this application') ?></p>
        <div class="">
            <div class="app-rename">
                <?= $this->form->label(t('Site Name'), 'app_rename', array('class=""')) ?>
                <?= $this->form->text('app_rename', $values, $errors, array('placeholder="My Workspace"'), 'site-name-text') ?>
                <p class="form-help"><?= t('By default, this plugin will rename your application to "My Workspace" once installed') ?></p>
            </div>
        </div>
    </fieldset>
    <fieldset class="login-page-settings">
        <legend class=""><?= t('Login Page') ?></legend>
        <p class=""><?= t('Adjust the settings below to customise the login page') ?></p>
        <fieldset class="settings-subsection">
            <legend class=""><?= t('Unsplash Background') ?></legend>
            <div class="settings-radio-options unsplash">
                <?= $this->form->radio('use_unsplash', t('Use Unsplash Random Background'), 'allow_usage', true, isset($values['use_unsplash']) && $values['use_unsplash'] == 'allow_usage') ?>
                <?= $this->form->radio('use_unsplash', t('Plain White Background'), 'dont_allow_usage', isset($values['use_unsplash']) && $values['use_unsplash'] == 'dont_allow_usage') ?>
            </div>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('Login Title') ?></legend>
            <div class="visitor-warning">
                <?= $this->form->label(t('Visitor Warning'), 'login_warning', array('class=""')) ?>
                <?= $this->form->text('login_warning', $values, $errors, array('placeholder="' . t('AUTHORISED USERS ONLY') . '"'), 'login-warning-text') ?>
                <p class="form-help"><?= t('Enter a single line title or leave blank for the default title') ?></p>
            </div>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('Login Text') ?></legend>
            <div class="login-message">
                <?= $this->form->label(t('Login Message'), 'login_message', array('class=""')) ?>
                <?= $this->form->textarea('login_message', $values, $errors, array('placeholder="' . t('Use this platform to manage your productivity. Work with tasks inside project boards to track comments, files and activities.') . '"'), 'login-message-textarea') ?>
                <p class="form-help"><?= t('This message will appear within the form above the username or leave blank for the default message') ?></p>
            </div>
        </fieldset>
        <fieldset class="settings-subsection">
            <legend><?= t('Copyright') ?></legend>
            <div class="app-copyright">
                <?= $this->form->label(t('From Year'), 'copyright_from', array('class=""')) ?>
                <?= $this->form->number('copyright_from', $values, $errors, array('placeholder="2014"'), 'copyright-from') ?>
                <p class="form-help"><?= t('Leave blank to show only the current year') ?></p>
            </div>
        </fieldset>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue" title="<?= t('Saves any changes made on this page') ?>"><?= t('Save Settings') ?></button>
        </div>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('Custom CSS') ?></legend>
        <?= $this->form->label(t('Head Stylesheet'), 'app_branding_custom_head_css', array('class=""')) ?>
        <?= $this->form->textarea('app_branding_custom_head_css', $values, $errors, array('placeholder=" a {color: red; }"'), 'custom-head-css') ?>
        <p class="form-help"><?= e('The default custom CSS at the top of this page loads all styles at the top of the %s tag. The custom styles in this section will be inserted at the bottom of the %s tag and after all plugin styles.', '<i>head</i>', '<i>head</i>') ?></p>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('Site Metadata') ?></legend>
        <p class="">
            <span class="section-desc">
                <span class="metadata-html-icon"></span>
            </span>
            <?= e('The site description and common device icons are shown in the %s section.', $this->url->link(t('Site Metadata'), 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('Visit page'), false, '')) ?>
        </p>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('Manual Edits') ?></legend>
        <p class="">
            <span class="section-desc">
                <span class="manual-edits-icon"></span>
            </span>
            <?= e('For total application rebranding, a few manual changes are required to be made to core files. Follow the suggestions in the %s section to learn more.', $this->url->link(t('Manual Edits'), 'ApplicationBrandingController', 'manualEdits', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('Visit page'), false, '')) ?>
        </p>
    </fieldset>
</fieldset>
