<?php if ($this->task->configModel->get('use_unsplash', '') == 'allow_usage'): ?>
    <style type="text/css">
        body {
            background: url(https://source.unsplash.com/featured) no-repeat center center fixed;
            background-size: cover;
            padding-top: 1px;
        }
    </style>
<?php endif ?>
<section class="login-logo center-login">
    <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="ws-logo" alt="<?= t('Workspace logo') ?>">
    <h3 class="no-top no-bottom login-title">
        <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
            <?= strtoupper($this->task->configModel->get('app_rename')) ?>
        <?php else: ?>
            <?= strtoupper(t('My Workspace')) ?>
        <?php endif ?>
    </h3>
    <div class="form-wrapper">
        <div class="login-area">
            <div class="form-login">
                <h4 class="no-top warning">
                    <?php if (!empty($this->task->configModel->get('login_warning'))): ?>
                        <?= $this->task->configModel->get('login_warning') ?>
                    <?php else: ?>
                        <?= t('AUTHORISED USERS ONLY') ?>
                    <?php endif ?>
                </h4>

                <?= $this->hook->render('template:auth:login-form:before') ?>

                <?php if (isset($errors['login'])): ?>
                    <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
                <?php endif ?>

                <p class="login-message">
                    <?php if (!empty($this->task->configModel->get('login_message'))): ?>
                        <?= $this->task->configModel->get('login_message') ?>
                    <?php else: ?>
                        <?= t('Use this platform to manage your productivity. Work with tasks inside project boards to track comments, files and activities.') ?>
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
                                    <?= $this->url->link(t('Reset Password') . '<i class="fa fa-question-circle-o" aria-hidden="true"></i>', 'PasswordResetController', 'create', array(), false, 'reset-password-link', '') ?>
                                </div>
                            <?php endif ?>
                            <button type="submit" class="btn login-btn">
                                <?= t('Login') ?>
                                <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/login.svg" class="login-icon" width="30px" alt="<?= t('Enter Application') ?>" title="<?= t('Enter Application') ?>">
                            </button>
                        </div>

                    </form>
                <?php endif ?>

                <?= $this->hook->render('template:auth:login-form:after') ?>

                <?php if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1'): ?>
                    <kbd class="user-remote-ip"><?= t('Your IP:') ?> <i><abbr title="127.0.0.1">localhost</abbr></i></kbd>
                <?php else: ?>
                    <kbd class="user-remote-ip"><?= t('Your IP:') ?> <?= $_SERVER["REMOTE_ADDR"]; ?></kbd>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<footer class="copyright">
    <span class="center">&copy;&nbsp;
        <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
            <?= $this->task->configModel->get('app_rename') ?>
        <?php else: ?>
            <?= t('My Workspace') ?>
        <?php endif ?>
        <?php if (!empty($this->task->configModel->get('copyright_from'))): ?>
            <?= $this->task->configModel->get('copyright_from') ?>-<?= date("Y"); ?>
        <?php else: ?>
            <?= date("Y"); ?>
        <?php endif ?>
    </span>
</footer>
