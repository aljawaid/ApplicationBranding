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
                                    <?= $this->url->link(t('Reset Password') . '
                                    <svg fill="currentColor" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" stroke=""><g id="" stroke-width="0"></g><g id="" stroke-linecap="round" stroke-linejoin="round"></g><g id=""> <g fill="#4D4D4D"> <path d="M8 0a8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 8-8 8 8 0 0 0-8-8zm0 1a7 7 0 0 1 7 7 7 7 0 0 1-7 7 7 7 0 0 1-7-7 7 7 0 0 1 7-7z"></path> <path d="M8.226 3.001c-.444 0-.864.051-1.26.153-.36.094-.679.222-.973.371l.3.832c.574-.291 1.162-.45 1.764-.45.506 0 .907.133 1.184.41.272.262.41.613.41 1.03a1.5 1.5 0 0 1-.18.723c-.108.214-.25.419-.424.613-.17.19-.35.379-.54.568v.001h-.002a5.4 5.4 0 0 0-.527.583l-.001.002c-.164.2-.3.418-.41.655-.097.231-.147.49-.147.779 0 .174.02.336.047.495h.906c0-.02-.005-.037-.005-.057v-.155c0-.323.064-.617.193-.876.126-.26.28-.498.465-.712l.001-.002c.182-.22.382-.43.601-.63.214-.194.408-.398.584-.61.174-.211.32-.436.439-.673.115-.24.174-.511.174-.819 0-.243-.04-.497-.123-.762v-.004a1.703 1.703 0 0 0-.402-.721 2.161 2.161 0 0 0-.797-.526h-.002l-.002-.002C9.177 3.075 8.753 3 8.225 3zM8 11.304c-.27 0-.468.082-.619.25a.854.854 0 0 0-.229.598c0 .232.075.426.23.598.15.168.347.25.618.25.27 0 .468-.082.62-.25a.855.855 0 0 0 .228-.598.854.854 0 0 0-.229-.598c-.15-.168-.348-.25-.619-.25z" font-family="Ubuntu" font-size="72.036" font-weight="500" letter-spacing="0" style="line-height:125%;text-align:center" text-anchor="middle" word-spacing="0"></path> </g> </g></svg>', 'PasswordResetController', 'create', array(), false, 'reset-password-link', '') ?>
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
