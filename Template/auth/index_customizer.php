<?php // See tests/output_safety_contract.php for configured-text escaping. ?>
<section class="login-logo center-login">
    <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="ws-logo" alt="<?= t('application_branding.workspace_logo') ?>">
    <h3 class="no-top no-bottom login-title">
        <?= $this->text->e(strtoupper($this->helper->applicationBrandingHelper->getApplicationName())) ?>
    </h3>
    <div class="form-wrapper">
        <div class="login-area">
            <div class="form-login">
                <h4 class="no-top warning">
                    <?php if (!empty($this->task->configModel->get('login_warning'))): ?>
                        <?= $this->text->e($this->task->configModel->get('login_warning')) ?>
                    <?php else: ?>
                        <?= t('application_branding.authorised_users_only') ?>
                    <?php endif ?>
                </h4>

                <?= $this->hook->render('template:auth:login-form:before') ?>

                <?php if (isset($errors['login'])): ?>
                    <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
                <?php endif ?>

                <p class="login-message">
                    <?php if (!empty($this->task->configModel->get('login_message'))): ?>
                        <?= $this->text->e($this->task->configModel->get('login_message')) ?>
                    <?php else: ?>
                        <?= t('application_branding.productivity_message') ?>
                    <?php endif ?>
                </p>

                <?php if (!HIDE_LOGIN_FORM): ?>
                    <form method="post" class="login-form relative" action="<?= $this->url->href('AuthController', 'check') ?>">
                        <?= $this->form->csrf() ?>

                        <?= $this->form->label(t('Username'), 'username') ?>
                        <span class="required-wrapper relative">
                            <span class="user-icon"></span>
                            <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username" placeholder="Required"'), 'username-input') ?>
                        </span>
                        <?= $this->form->label(t('Password'), 'password') ?>
                        <span class="required-wrapper relative">
                            <span class="password-icon"></span>
                            <?= $this->form->password('password', $values, $errors, array('required', 'autocomplete="current-password" placeholder="Required"'), 'password-input') ?>
                        </span>

                        <?php if (isset($captcha) && $captcha): ?>
                            <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                            <img src="<?= $this->url->href('CaptchaController', 'image') ?>" class="captcha-img" alt="Captcha">
                            <span class="required-wrapper-captcha relative">
                                <?= $this->form->text('captcha', array(), $errors, array('required', 'placeholder="Required"'), 'captcha-input') ?>
                            </span>
                        <?php endif ?>

                        <?php if (REMEMBER_ME_AUTH): ?>
                            <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
                        <?php endif ?>

                        <div class="form-actions">
                            <?php if ($this->app->config('password_reset') == 1): ?>
                                <div class="reset-password">
                                    <?= $this->url->link(t('application_branding.reset_password') . '<i class="fa fa-question-circle-o" aria-hidden="true"></i>', 'PasswordResetController', 'create', array(), false, 'reset-password-link', '') ?>
                                </div>
                            <?php endif ?>
                            <button type="submit" class="btn login-btn">
                                <?= t('Login') ?>
                                <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/login.svg" class="login-icon" width="30px" alt="<?= t('application_branding.enter_application') ?>" title="<?= t('application_branding.enter_application') ?>">
                            </button>
                        </div>

                    </form>
                <?php endif ?>

                <?= $this->hook->render('template:auth:login-form:after') ?>

                <?php $remoteAddress = $this->helper->applicationBrandingHelper->getRemoteAddress() ?>
                <?php if ($this->helper->applicationBrandingHelper->shouldShowRemoteAddress() && $remoteAddress !== ''): ?>
                    <?php if ($this->helper->applicationBrandingHelper->isLocalRemoteAddress($remoteAddress)): ?>
                        <kbd class="user-remote-ip"><?= t('application_branding.your_ip') ?> <i><abbr title="<?= $this->text->e($remoteAddress) ?>">localhost</abbr></i></kbd>
                    <?php else: ?>
                        <kbd class="user-remote-ip"><?= t('application_branding.your_ip') ?> <?= $this->text->e($remoteAddress) ?></kbd>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <?= $this->hook->render('template:auth:login-form:newbox') ?>

</section>
<footer class="copyright">
    <span class="center">&copy;&nbsp;
        <?= $this->text->e($this->helper->applicationBrandingHelper->getApplicationName()) ?>
        <?= $this->text->e($this->helper->applicationBrandingHelper->getCopyrightYears()) ?>
    </span>
</footer>
