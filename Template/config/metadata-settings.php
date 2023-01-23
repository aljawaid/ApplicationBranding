<fieldset id="AppMetadataSettings" class="panel app-metadata-settings">
    <h3 class="">
        <img src="<?= $this->url->dir() ?>plugins/ApplicationMetadata/Assets/img/workspace-icon-500x500.png" class="" width="30px" alt="<?= t('Workspace logo') ?>">
        ApplicationMetadata <?= t('Settings') ?>
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
    <div class="form-actions">
        <button type="submit" class="btn btn-blue" title="<?= t('Saves any changes made on this page') ?>"><?= t('Save Settings') ?></button>
    </div>
</fieldset>
