<section class="login-logo center-login">
    <img src="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" class="ws-logo" alt="<?= t('Workspace logo') ?>">
    <h3 class="no-top no-bottom login-title">
        <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
            <?= strtoupper($this->task->configModel->get('app_rename')) ?>
        <?php else: ?>
            <?= strtoupper(t('My Workspace')) ?>
        <?php endif ?>
    </h3>
    <div class="form-wrapper relative">
        <div class="otp-area">
            <div class="otp-form form-login relative">
                <span class="otp-icon"></span>
                <h2 class="otp-title">
                    <?= t('Authentication') ?> <abbr title="<?= t('Time-based One-Time Password') ?>">(TOTP)</abbr>
                </h2>
                <p class="otp-message">
                    <?= t('Open the two-factor authenticator app on your mobile device to view your authentication code') ?>
                </p>
                <form method="post" action="<?= $this->url->href('TwoFactorController', 'check', array('user_id' => $this->user->getId())) ?>">
                    <?= $this->form->csrf() ?>
                    <?= $this->form->label(t('Authentication Code'), 'code') ?>
                    <span class="required-wrapper-otp relative">
                        <?= $this->form->text('code', array(), array(), array('placeholder="XXXXXX"', 'autofocus', 'autocomplete="one-time-code"', 'pattern="[0-9]*"', 'inputmode="numeric"'), 'form-numeric otp-field') ?>
                    </span>
                    <div class="form-actions">
                        <button type="submit" class="btn verify-btn"><?= t('Verify') ?> &#10004;</button>
                        <?= $this->url->link(t('Cancel') . ' &#10008;', 'AuthController', 'logout', array(), false, 'btn back-btn logout-button', t('Logout')) ?>
                    </div>
                </form>
                <?php if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1'): ?>
                    <kbd class="user-remote-ip"><?= t('Your IP:') ?> <i><abbr title="127.0.0.1">localhost</abbr></i></kbd>
                <?php else: ?>
                    <kbd class="user-remote-ip mt-20"><?= t('Your IP:') ?> <?= $_SERVER["REMOTE_ADDR"]; ?></kbd>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
