<div id="MetadataPage" class="metadata-page-header">
    <h2 class="">
        <svg width="32px" fill="#4D4D4D" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 550.801 550.801" xml:space="preserve" stroke="#4D4D4D">
            <g id="" stroke-width="0"></g><g id="" stroke-linecap="round" stroke-linejoin="round"></g><g id=""> <g> <g> <path d="M475.095,131.986c-0.032-2.525-0.844-5.015-2.568-6.992L366.324,3.684c-0.021-0.029-0.053-0.045-0.084-0.071 c-0.633-0.712-1.36-1.289-2.141-1.803c-0.232-0.15-0.465-0.29-0.707-0.422c-0.686-0.372-1.393-0.669-2.131-0.891 c-0.2-0.058-0.379-0.145-0.59-0.188C359.87,0.114,359.037,0,358.203,0H97.2C85.292,0,75.6,9.688,75.6,21.601v507.6 c0,11.907,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.693,21.601-21.601V133.197 C475.2,132.791,475.137,132.393,475.095,131.986z M97.2,21.601h250.203v110.51c0,5.962,4.831,10.8,10.8,10.8H453.6l0.011,223.837 H97.2V21.601z M180.457,499.311h-21.642v-41.26h-35.744v41.26h-21.769v-98.613h21.769v37.895h35.744v-37.895h21.642V499.311z M265.874,419.429h-26.188v79.882h-21.779v-79.882h-25.763v-18.731h73.73V419.429z M359.416,499.311l-1.424-37.747 c-0.422-11.85-0.854-26.188-0.854-40.532h-0.422c-2.996,12.583-6.982,26.631-10.685,38.19l-11.665,38.476H317.43l-10.252-38.18 c-3.133-11.56-6.412-25.608-8.69-38.486h-0.285c-0.564,13.321-1.002,28.535-1.692,40.827l-1.72,37.457h-20.07l6.117-98.613h28.903 l9.397,32.917c2.995,11.412,5.975,23.704,8.121,35.264h0.422c2.711-11.417,5.975-24.427,9.112-35.406l10.252-32.774h28.329 l5.263,98.613h-21.221V499.311z M457.238,499.311h-59.938v-98.613h21.779v79.882h38.153v18.731H457.238z"></path> <polygon points="154.132,249.086 236.872,287.523 236.872,269.254 174.295,241.851 174.295,241.505 236.872,214.094 236.872,195.827 154.132,234.262 "></polygon> <polygon points="249.642,294.416 267.047,294.416 303.93,169.452 286.527,169.452 "></polygon> <polygon points="313.938,214.094 377.895,241.505 377.895,241.851 313.938,269.254 313.938,287.523 396.668,249.605 396.668,233.745 313.938,195.827 "></polygon> </g> </g> </g>
        </svg>
        <?= t('Site Metadata') ?>
    </h2>

    <div class="metadata-form-wrapper">
        <form class="metadata-form panel" method="post" action="<?= $this->url->href('ApplicationBrandingController', 'save', array('redirect' => 'show', 'plugin' => 'ApplicationBranding')) ?>" autocomplete="on">
        <?= $this->form->csrf() ?>
        <fieldset class="site-name-metadata">
            <legend class=""><?= t('Site Name') ?></legend>
            <div class="site-name-wrapper">
                <p class="">
                    <?= t('The site name can be changed in the') ?> <?= $this->url->link(t('Application Settings'), 'ConfigController', 'application', array(), false, 'application-link', t('Go to Application Settings'), false, 'AppBrandingSettings') ?>
                </p>
            </div>
        </fieldset>
        <fieldset class="site-desc-metadata">
            <legend class=""><?= t('Site Description') ?></legend>
            <div class="metadata-wrapper">
                <p class=""><?= t('The meta description applies across the site except for the \'Reset Password\' page') ?></p>
                <?= $this->form->label(t('Meta Description'), 'meta_description', array('class="meta-desc"')) ?>
                <?= $this->form->text('meta_description', $values, $errors, array('placeholder="'. t('Use this kanban platform to manage your productivity using tasks inside project boards to track files, comments and activities.') .'"'), 'meta-desc-text') ?>
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
                <p class=""><?= t('The images below are used for various devices and become most useful when sharing and saving links. The icons are all based on the generic image included with this plugin.') ?></p>
                <h4 class=""><?= t('Included Icons') ?></h4>
                <ul class="icon-list">
                <?php $files = array_diff( scandir('plugins/ApplicationBranding/Assets/img/favicon/'), array('.', '..') ); ?>
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
