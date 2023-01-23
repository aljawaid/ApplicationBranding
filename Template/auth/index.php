<style type="text/css">
    body {
        background: url(https://source.unsplash.com/random) no-repeat center center fixed;
        background-size: cover;
        padding-top: 1px;
    }
</style>

<section class="login-logo">
    <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="ws-logo">
    <h3 class="no-top login-title">
        <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
            <?= strtoupper($this->task->configModel->get('app_rename')) ?>
        <?php else: ?>
            <?= strtoupper(t('My Workspace')) ?>
        <?php endif ?>
    </h3>
    <div class="login-wrapper">
        <div class="login-area">
            <div class="form-login">
                <h4 class="no-top warning"><?= t('AUTHORISED USERS ONLY') ?></h4>

                <?= $this->hook->render('template:auth:login-form:before') ?>

                <?php if (isset($errors['login'])): ?>
                    <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
                <?php endif ?>

                <p class=""><?= t('Use this platform to manage your productivity. Work with tasks inside project boards to track comments, files and activities.') ?></p>

                <?php if (! HIDE_LOGIN_FORM): ?>
                    <form method="post" action="<?= $this->url->href('AuthController', 'check') ?>" class="relative">
                        <?= $this->form->csrf() ?>

                        <?= $this->form->label(t('Username'), 'username') ?>
                        <span class="required-wrapper relative">
                            <svg version="1.1" id="" class="user-icon" fill="#4D4D4D" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 409.165 409.164" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id=""> <g> <g> <path d="M204.583,216.671c50.664,0,91.74-48.075,91.74-107.378c0-82.237-41.074-107.377-91.74-107.377 c-50.668,0-91.74,25.14-91.74,107.377C112.844,168.596,153.916,216.671,204.583,216.671z"></path> <path d="M407.164,374.717L360.88,270.454c-2.117-4.771-5.836-8.728-10.465-11.138l-71.83-37.392 c-1.584-0.823-3.502-0.663-4.926,0.415c-20.316,15.366-44.203,23.488-69.076,23.488c-24.877,0-48.762-8.122-69.078-23.488 c-1.428-1.078-3.346-1.238-4.93-0.415L58.75,259.316c-4.631,2.41-8.346,6.365-10.465,11.138L2.001,374.717 c-3.191,7.188-2.537,15.412,1.75,22.005c4.285,6.592,11.537,10.526,19.4,10.526h362.861c7.863,0,15.117-3.936,19.402-10.527 C409.699,390.129,410.355,381.902,407.164,374.717z"></path> </g> </g> </g>
                            </svg>
                            <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username" placeholder="Required"'), 'username-input') ?>
                        </span>
                        <?= $this->form->label(t('Password'), 'password') ?>
                        <span class="required-wrapper relative">
                            <svg class="password-icon" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#4D4D4D" stroke="0">
                                <g id="" stroke-width="0"></g>
                                <g id="" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id=""> <g id="" data-name="Layer 2"> <g id="" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> </g> <g id="" data-name="Layer 7"> <g> <path d="M39,18H35V13A11,11,0,0,0,24,2H22A11,11,0,0,0,11,13v5H7a2,2,0,0,0-2,2V44a2,2,0,0,0,2,2H39a2,2,0,0,0,2-2V20A2,2,0,0,0,39,18ZM15,13a7,7,0,0,1,7-7h2a7,7,0,0,1,7,7v5H15ZM37,42H9V22H37Z"></path> <circle cx="15" cy="32" r="3"></circle> <circle cx="23" cy="32" r="3"></circle> <circle cx="31" cy="32" r="3"></circle> </g> </g> </g> </g>
                            </svg>
                            <?= $this->form->password('password', $values, $errors, array('required', 'autocomplete="current-password"'), 'password-input') ?>
                        </span>

                        <?php if (isset($captcha) && $captcha): ?>
                            <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                            <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
                            <?= $this->form->text('captcha', array(), $errors, array('required'), 'captcha-input') ?>
                        <?php endif ?>

                        <?php if (REMEMBER_ME_AUTH): ?>
                            <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
                        <?php endif ?>

                        <div class="form-actions">
                            <button type="submit" class="btn login-btn">
                                <?= t('Sign in') ?>
                                <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/login.svg" class="login-icon" width="30px" alt="<?= t('Enter Application') ?>" title="<?= t('Enter Application') ?>">
                            </button>
                        </div>

                        <?php if ($this->app->config('password_reset') == 1): ?>
                            <div class="reset-password">
                                <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create', array(), false, 'reset-password-link', '') ?>
                            </div>
                        <?php endif ?>

                    </form>
                <?php endif ?>

                <?= $this->hook->render('template:auth:login-form:after') ?>

                <kbd class="user-remote-ip">Your IP: <?php echo $_SERVER["REMOTE_ADDR"]; ?></kbd>
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
        2015-<?php echo date("Y"); ?>
    </span>
</footer>
