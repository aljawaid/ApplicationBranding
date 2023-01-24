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
    <div class="form-wrapper">
        <div class="login-area">
            <div class="form-login">
                <h2><?= t('Reset Password') ?></h2>
                <form method="post" action="<?= $this->url->href('PasswordResetController', 'save') ?>">
                    <?= $this->form->csrf() ?>

                    <?= $this->form->label(t('Username'), 'username') ?>
                    <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username" placeholder="Required"')) ?>
                    <p class="form-help"><?= t('Your profile must have a valid email address') ?></p>

                    <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                    <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
                    <?= $this->form->text('captcha', array(), $errors, array('required', 'placeholder="Required"')) ?>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-blue"><?= t('Change Password') ?></button>
                    </div>
                </form>
                <kbd class="user-remote-ip">Your IP: <?= $_SERVER["REMOTE_ADDR"]; ?></kbd>
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
