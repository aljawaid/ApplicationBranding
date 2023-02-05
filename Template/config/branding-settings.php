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
                <?= $this->form->text('app_rename', $values, $errors, array('placeholder="My Workspace"')) ?>
                <p class="form-help"><?= t('By default, this plugin will rename your application to "My Workspace" once installed') ?></p>
            </div>
        </div>
    </fieldset>
    <fieldset class="login-page-settings">
        <legend class=""><?= t('Login Page') ?></legend>
        <p class=""><?= t('Adjust the settings below to customise the login page') ?></p>
            <div class="visitor-warning">
                <?= $this->form->label(t('Visitor Warning'), 'login_warning', array('class=""')) ?>
                <?= $this->form->text('login_warning', $values, $errors, array('placeholder="' . t('AUTHORISED USERS ONLY') . '"')) ?>
                <p class="form-help"><?= t('Enter a single line title or leave blank for the default title') ?></p>
            </div>
            <div class="login-message">
                <?= $this->form->label(t('Login Message'), 'login_message', array('class=""')) ?>
                <?= $this->form->textarea('login_message', $values, $errors, array('placeholder="'. t('Use this platform to manage your productivity. Work with tasks inside project boards to track comments, files and activities.') .'"'), 'login-message-textarea') ?>
                <p class="form-help"><?= t('This message will appear within the form above the username or leave blank for the default message') ?></p>
            </div>
            <div class="app-copyright">
                <?= $this->form->label(t('From Year'), 'copyright_from', array('class=""')) ?>
                <?= $this->form->number('copyright_from', $values, $errors, array('placeholder="2014"')) ?>
                <p class="form-help"><?= t('Leave blank to show only the current year') ?></p>
            </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-blue" title="<?= t('Saves any changes made on this page') ?>"><?= t('Save Settings') ?></button>
        </div>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('Site Metadata') ?></legend>
        <p class="">
            <span class="section-desc">
                <svg width="40px" fill="currentColor" class="metadata-html-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 550.801 550.801" xml:space="preserve" stroke="currentColor">
                    <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M475.095,131.986c-0.032-2.525-0.844-5.015-2.568-6.992L366.324,3.684c-0.021-0.029-0.053-0.045-0.084-0.071 c-0.633-0.712-1.36-1.289-2.141-1.803c-0.232-0.15-0.465-0.29-0.707-0.422c-0.686-0.372-1.393-0.669-2.131-0.891 c-0.2-0.058-0.379-0.145-0.59-0.188C359.87,0.114,359.037,0,358.203,0H97.2C85.292,0,75.6,9.688,75.6,21.601v507.6 c0,11.907,9.692,21.601,21.6,21.601H453.6c11.908,0,21.601-9.693,21.601-21.601V133.197 C475.2,132.791,475.137,132.393,475.095,131.986z M97.2,21.601h250.203v110.51c0,5.962,4.831,10.8,10.8,10.8H453.6l0.011,223.837 H97.2V21.601z M180.457,499.311h-21.642v-41.26h-35.744v41.26h-21.769v-98.613h21.769v37.895h35.744v-37.895h21.642V499.311z M265.874,419.429h-26.188v79.882h-21.779v-79.882h-25.763v-18.731h73.73V419.429z M359.416,499.311l-1.424-37.747 c-0.422-11.85-0.854-26.188-0.854-40.532h-0.422c-2.996,12.583-6.982,26.631-10.685,38.19l-11.665,38.476H317.43l-10.252-38.18 c-3.133-11.56-6.412-25.608-8.69-38.486h-0.285c-0.564,13.321-1.002,28.535-1.692,40.827l-1.72,37.457h-20.07l6.117-98.613h28.903 l9.397,32.917c2.995,11.412,5.975,23.704,8.121,35.264h0.422c2.711-11.417,5.975-24.427,9.112-35.406l10.252-32.774h28.329 l5.263,98.613h-21.221V499.311z M457.238,499.311h-59.938v-98.613h21.779v79.882h38.153v18.731H457.238z"></path> <polygon points="154.132,249.086 236.872,287.523 236.872,269.254 174.295,241.851 174.295,241.505 236.872,214.094 236.872,195.827 154.132,234.262 "></polygon> <polygon points="249.642,294.416 267.047,294.416 303.93,169.452 286.527,169.452 "></polygon> <polygon points="313.938,214.094 377.895,241.505 377.895,241.851 313.938,269.254 313.938,287.523 396.668,249.605 396.668,233.745 313.938,195.827 "></polygon> </g> </g> </g>
                </svg>
            </span>
            <?= e('The site description and common device icons are shown in the %s section.', $this->url->link(t('Site Metadata'), 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('Visit page'), false, '')) ?>
        </p>
    </fieldset>
    <fieldset class="site-metadata-settings">
        <legend class=""><?= t('Manual Edits') ?></legend>
        <p class="">
            <span class="section-desc">
                <svg width="40px" height="40px" class="manual-edits-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g><path d="M3 23h18V6.709L15.29 1H3zM15 2h.2L20 6.8V7h-5zM4 2h10v6h6v14H4zm9.13 9.044l.938.35-3.199 8.583-.937-.35zm2.224 1.603l2.853 2.853-2.854 2.854-.707-.707 2.147-2.147-2.146-2.146zm-6 .707L7.207 15.5l2.146 2.146-.707.707L5.793 15.5l2.854-2.854z"></path><path fill="none" d="M0 0h24v24H0z"></path></g>
                </svg>
            </span>
            <?= e('For total application rebranding, a few manual changes are required to be made to core files. Follow the suggestions in the %s section to learn more.', $this->url->link(t('Manual Edits'), 'ApplicationBrandingController', 'manualEdits', ['plugin' => 'ApplicationBranding'], false, 'application-link', t('Visit page'), false, '')) ?>
        </p>
    </fieldset>
</fieldset>
