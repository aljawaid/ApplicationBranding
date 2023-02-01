<section class="login-logo">
    <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="ws-logo">
    <h3 class="no-top no-bottom login-title">
        <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
            <?= strtoupper($this->task->configModel->get('app_rename')) ?>
        <?php else: ?>
            <?= strtoupper(t('My Workspace')) ?>
        <?php endif ?>
    </h3>
    <div class="page-header">
        <h2><?= t('Two factor authentication') ?></h2>
    </div>
    <form method="post" action="<?= $this->url->href('TwoFactorController', 'check', array('user_id' => $this->user->getId())) ?>">
        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('Code'), 'code') ?>
        <?= $this->form->text('code', array(), array(), array('placeholder="123456"', 'autofocus', 'autocomplete="one-time-code"', 'pattern="[0-9]*"', 'inputmode="numeric"'), 'form-numeric') ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Check my code') ?></button>
            <button type="button" class="btn btn-blue back-btn"><?= $this->url->link(t('Cancel'), 'AuthController', 'logout', array(), false, 'logout-button', t('Logout')) ?></button>
        </div>
    </form>
</section>
