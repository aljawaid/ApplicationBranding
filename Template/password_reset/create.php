<style type="text/css">
    body {
        background: url(https://source.unsplash.com/random) no-repeat center center fixed;
        background-size: cover;
        padding-top: 1px;
    }
</style>
<div class="form-login">
    <h2><?= t('Reset Password') ?></h2>
    <form method="post" action="<?= $this->url->href('PasswordResetController', 'save') ?>">
        <?= $this->form->csrf() ?>
    <div class="form-wrapper">

        <?= $this->form->label(t('Username'), 'username') ?>
        <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username" placeholder="Required"')) ?>
        <p class="form-help"><?= t('Your profile must have a valid email address.') ?></p>

        <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
        <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
        <?= $this->form->text('captcha', array(), $errors, array('required', 'placeholder="Required"')) ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Change Password') ?></button>
        </div>
    </form>
</div>
    </div>
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
