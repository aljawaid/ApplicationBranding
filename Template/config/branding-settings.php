<fieldset id="AppBrandingSettings" class="panel app-branding-settings">
    <h3 class="">
        <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="" width="30px" alt="<?= t('Workspace logo') ?>">
        <?= t('Application Branding') ?>
    </h3>
    <fieldset class="">
        <legend class=""><?= t('Application Name') ?></legend>
        <p class=""><?= t('Enter the new name for this application') ?></p>
        <div class="">
            <div class="app-rename">
                <?= $this->form->label(t('Site Name'), 'app_rename', array('class=""')) ?>
                <?= $this->form->text('app_rename', $values, $errors, array('placeholder="My Workspace"')) ?>
                <p class="form-help"><?= t('By default, this plugin will rename your application to "My Workspace" once installed') ?></p>
            </div>
        </div>
    </fieldset>
    <fieldset class="">
        <legend class=""><?= t('Login Page') ?></legend>
        <p class=""><?= t('Adjust the settings below to customise the login page') ?></p>
        <div class="">
            <div class="visitor-warning">
                <?= $this->form->label(t('Visitor Warning'), 'login_warning', array('class=""')) ?>
                <?= $this->form->text('login_warning', $values, $errors, array('placeholder="AUTHORISED USERS ONLY"')) ?>
                <p class="form-help"><?= t('Enter a single line title or leave blank for the default title') ?></p>
            </div>
            <div class="login-message">
                <?= $this->form->label(t('Login Message'), 'login_message', array('class=""')) ?>
                <?= $this->form->text('login_message', $values, $errors, array('placeholder="AUTHORISED USERS ONLY"')) ?>
                <p class="form-help"><?= t('This message will appear within the form above the username') ?></p>
            </div>
            <div class="app-rename">
                <?= $this->form->label(t('Copyright From'), 'copyright_from', array('class=""')) ?>
                <?= $this->form->number('copyright_from', $values, $errors, array('placeholder="2014"')) ?>
                <p class="form-help"><?= t('If no year is entered, the standard copyright message with the current year is shown') ?></p>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <button type="submit" class="btn btn-blue" title="<?= t('Saves any changes made on this page') ?>"><?= t('Save Settings') ?></button>
    </div>
</fieldset>
