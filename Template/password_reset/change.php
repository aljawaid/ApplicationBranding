<div class="form-login">
    <h2><?= t('application_branding.reset_password') ?></h2>
    <form method="post" action="<?= $this->url->href('PasswordResetController', 'update', array('token' => $token)) ?>">
        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('application_branding.new_password'), 'password') ?>
        <?= $this->form->password('password', $values, $errors, ['autocomplete="new-password" placeholder="Required"']) ?>

        <?= $this->form->label(t('application_branding.confirm_new_password'), 'confirmation') ?>
        <?= $this->form->password('confirmation', $values, $errors, ['autocomplete="new-password" placeholder="Required"']) ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Change Password') ?></button>
        </div>
    </form>
</div>
