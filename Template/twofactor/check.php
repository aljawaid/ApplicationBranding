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
                <svg class="otp-icon" fill="currentColor" width="48px" height="48px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                    <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g>
                        <path d="M458.4741,112H265V62.41A31.3815,31.3815,0,0,0,233.5879,31H62.4077A31.3806,31.3806,0,0,0,31,62.41V449.59A31.4379,31.4379,0,0,0,62.4077,481h171.18A31.4388,31.4388,0,0,0,265,449.59V292H458.4771A22.5231,22.5231,0,0,0,481,269.4771V134.5259A22.5257,22.5257,0,0,0,458.4741,112ZM125.5,50.08h45a11.25,11.25,0,0,1,0,22.5h-45a11.25,11.25,0,0,1,0-22.5Zm44.9956,411.7651h-45a11.25,11.25,0,1,1,0-22.5h45a11.25,11.25,0,0,1,0,22.5ZM245.1982,420.25H50.7974V91.75H245.1982V112H125.3149A22.3149,22.3149,0,0,0,103,134.3149V269.6641A22.3357,22.3357,0,0,0,125.3359,292H166v36.1489a11.1221,11.1221,0,0,0,18.9868,7.8643L229,292h16.1982Zm-24.39-210.06a11.3086,11.3086,0,0,1,4.14,15.39,11.198,11.198,0,0,1-15.39,4.14L195.25,221.44V238a11.25,11.25,0,0,1-22.5,0V221.44L158.437,229.72a11.198,11.198,0,0,1-15.39-4.14,11.3164,11.3164,0,0,1,4.14-15.39L161.5,202l-14.313-8.28a11.2689,11.2689,0,0,1,11.25-19.5293L172.75,182.47V166a11.25,11.25,0,0,1,22.5,0v16.47l14.3086-8.2793a11.2689,11.2689,0,0,1,11.25,19.5293L206.5,202Zm108,0a11.3086,11.3086,0,0,1,4.14,15.39,11.198,11.198,0,0,1-15.39,4.14L303.25,221.44V238a11.25,11.25,0,0,1-22.5,0V221.44L266.437,229.72a11.198,11.198,0,0,1-15.39-4.14,11.3164,11.3164,0,0,1,4.14-15.39L269.5,202l-14.313-8.28a11.2689,11.2689,0,0,1,11.25-19.5293L280.75,182.47V166a11.25,11.25,0,0,1,22.5,0v16.47l14.3086-8.2793a11.2689,11.2689,0,0,1,11.25,19.5293L314.5,202Zm108,0a11.3086,11.3086,0,0,1,4.14,15.39,11.198,11.198,0,0,1-15.39,4.14L411.25,221.44V238a11.25,11.25,0,0,1-22.5,0V221.44L374.437,229.72a11.198,11.198,0,0,1-15.39-4.14,11.3164,11.3164,0,0,1,4.14-15.39L377.5,202l-14.313-8.28a11.2689,11.2689,0,0,1,11.25-19.5293L388.75,182.47V166a11.25,11.25,0,0,1,22.5,0v16.47l14.3086-8.2793a11.2689,11.2689,0,0,1,11.25,19.5293L422.5,202Z"></path> </g>
                    </g>
                </svg>
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
                        <button type="button" class="btn btn-blue back-btn"><?= $this->url->link(t('Cancel'), 'AuthController', 'logout', array(), false, 'logout-button', t('Logout')) ?></button>
                        <button type="submit" class="btn verify-btn"><?= t('Verify') ?> &#10004;</button>
                    </div>
                </form>
                <?php if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1'): ?>
                    <kbd class="user-remote-ip"><?= t('Your IP:') ?> <i><abbr title="127.0.0.1">localhost</abbr></i> ?></kbd>
                <?php else: ?>
                    <kbd class="user-remote-ip mt-20"><?= t('Your IP:') ?> <?= $_SERVER["REMOTE_ADDR"]; ?></kbd>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
