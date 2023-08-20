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
        <div class="password-area">
            <div class="reset-form form-login relative">
                <h2 class="reset-title">
                    <span class="reset-icon"></span>
                    <?= t('Reset Password') ?>
                </h2>
                <p class="reset-message">
                    <?= t('A link to change your password will be sent by email to the username registered in the system') ?>
                </p>
                <form method="post" class="form-reset relative" action="<?= $this->url->href('PasswordResetController', 'save') ?>">
                    <?= $this->form->csrf() ?>

                    <?= $this->form->label(t('Username'), 'username') ?>
                    <span class="required-wrapper relative">
                        <span class="user-icon"></span>
                        <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username" placeholder="Required"')) ?>
                    </span>
                    <p class="form-help"><?= t('Your profile must have a valid email address') ?></p>

                    <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                    <img src="<?= $this->url->href('CaptchaController', 'image') ?>" class="captcha-img" alt="Captcha">
                    <span class="required-wrapper-captcha relative">
                        <?= $this->form->text('captcha', array(), $errors, array('required', 'placeholder="Required"'), 'captcha-input') ?>
                    </span>
                    <div class="form-actions">
                        <a href="<?= $this->url->base() ?>" class="btn back-btn">
                            <span class="back-home-icon"></span> <?= t('Back to Login') ?>
                        </a>
                        <button type="submit" class="btn btn-reset-password">
                            <span class="envelope-icon"></span> <?= t('Change Password') ?>
                        </button>
                    </div>
                </form>
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
