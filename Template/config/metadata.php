<div id="MetadataPage" class="metadata-page-header">
    <h2 class="">
        <span class="metadata-html-icon"></span> <?= t('application_branding.site_metadata') ?>
    </h2>
    <div class="metadata-form-wrapper">
        <form class="metadata-form panel" method="post" action="<?= $this->url->href('ApplicationBrandingController', 'save', array('redirect' => 'show', 'plugin' => 'ApplicationBranding')) ?>" autocomplete="on">
            <?= $this->form->csrf() ?>
            <fieldset class="site-name-metadata">
                <legend class=""><?= t('application_branding.site_name') ?></legend>
                <div class="site-name-wrapper">
                    <p class="">
                        <?= e('application_branding.site_name_location', $this->url->link(t('application_branding.application_settings'), 'ConfigController', 'application', array(), false, 'application-link', t('application_branding.go_to_application_settings'), false, 'AppBrandingSettings')) ?>
                    </p>
                </div>
            </fieldset>
            <fieldset class="site-desc-metadata">
                <legend class=""><?= t('application_branding.site_description_title') ?></legend>
                <div class="metadata-wrapper">
                    <p class="">
                        <?= e('application_branding.meta_description_scope', $this->url->link(t('application_branding.reset_password'), 'PasswordResetController', 'create', array(), false, 'application-link', t('application_branding.opens_new_window'), true)) ?>
                    </p>
                    <?= $this->form->label(t('application_branding.meta_description'), 'meta_description', array('class="meta-desc"')) ?>
                    <?= $this->form->text('meta_description', $values, $errors, array('placeholder="' . t('application_branding.site_description') . '"'), 'meta-desc-text') ?>
                    <p class="form-help"><?= t('application_branding.generic_description_help') ?></p>
                    <details class="generic-desc">
                        <summary><?= t('application_branding.generic_description') ?></summary>
                        <p class="generic-desc-text"><?= t('application_branding.site_description') ?></p>
                    </details>
                    <details class="reset-desc">
                        <summary><?= t('application_branding.reset_description_title') ?></summary>
                        <p class="reset-desc-text"><?= t('application_branding.reset_description') ?></p>
                    </details>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-blue"><?= t('application_branding.save_settings') ?></button>
                </div>
            </fieldset>
            <fieldset class="device-icons-metadata">
                <legend class=""><?= t('application_branding.device_icons') ?></legend>
                <div class="icons-wrapper">
                    <p class="">
                        <?= t('application_branding.device_icons_help') ?>
                    </p>

                    <?php $files = array_diff(scandir('plugins/ApplicationBranding/Assets/img/favicon/'), array('.', '..')); ?>

                    <h4 class=""><?= t('application_branding.included_icons') ?>
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
