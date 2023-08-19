<div id="MetadataPage" class="metadata-page-header">
    <h2 class="">
        <span class="metadata-html-icon"></span> <?= t('Site Metadata') ?>
    </h2>
    <div class="metadata-form-wrapper">
        <form class="metadata-form panel" method="post" action="<?= $this->url->href('ApplicationBrandingController', 'save', array('redirect' => 'show', 'plugin' => 'ApplicationBranding')) ?>" autocomplete="on">
            <?= $this->form->csrf() ?>
            <fieldset class="site-name-metadata">
                <legend class=""><?= t('Site Name') ?></legend>
                <div class="site-name-wrapper">
                    <p class="">
                        <?= e('The site name can be changed in the %s.', $this->url->link(t('Application Settings'), 'ConfigController', 'application', array(), false, 'application-link', t('Go to Application Settings'), false, 'AppBrandingSettings')) ?>
                    </p>
                </div>
            </fieldset>
            <fieldset class="site-desc-metadata">
                <legend class=""><?= t('Site Description') ?></legend>
                <div class="metadata-wrapper">
                    <p class="">
                        <?= e('The meta description applies across the site except for the %s page.', $this->url->link(t('Reset Password'), 'PasswordResetController', 'create', array(), false, 'application-link', t('Opens in a new window'), true)) ?>
                    </p>
                    <?= $this->form->label(t('Meta Description'), 'meta_description', array('class="meta-desc"')) ?>
                    <?= $this->form->text('meta_description', $values, $errors, array('placeholder="' . t('Use this kanban platform to manage your productivity using tasks inside project boards to track files, comments and activities.') . '"'), 'meta-desc-text') ?>
                    <p class="form-help"><?= t('The generic description will be used if this field is left empty') ?></p>
                    <details class="generic-desc">
                        <summary><?= t('Generic Description') ?></summary>
                        <p class="generic-desc-text"><?= t('Use this kanban platform to manage your productivity using tasks inside project boards to track files, comments and activities.') ?></p>
                    </details>
                    <details class="reset-desc">
                        <summary><?= t('Reset Password Page Description') ?></summary>
                        <p class="reset-desc-text"><?= t('Change your password for this kanban platform.') ?></p>
                    </details>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-blue"><?= t('Save Settings') ?></button>
                </div>
            </fieldset>
            <fieldset class="device-icons-metadata">
                <legend class=""><?= t('Device Icons') ?></legend>
                <div class="icons-wrapper">
                    <p class="">
                        <?= t('The images below are used for various devices and become most useful when sharing and saving links. The icons are all based on the generic image included with this plugin.') ?>
                    </p>

                    <?php $files = array_diff(scandir('plugins/ApplicationBranding/Assets/img/favicon/'), array('.', '..')); ?>

                    <h4 class=""><?= t('Included Icons') ?>
                        <span>(<?= (count($files) - 2) ?>)</span>
                    </h4>
                    <ul class="icon-list">
                        <?php foreach ($files as $file): ?>
                            <?php if ((!$this->text->contains($file, '.webmanifest')) && (!$this->text->contains($file, '.xml'))): ?>
                                <li class="">
                                    <span class="filename"><?= $file ?></span>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </fieldset>
        </form>
    </div>
</div>
