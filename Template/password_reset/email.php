<p><?= t('application_branding.password_reset_link') ?></p>

<p><?= $this->url->to('PasswordResetController', 'change', array('token' => $token), '', true) ?></p>

<hr>
<?php // See tests/output_safety_contract.php for configured-text escaping. ?>
<footer class="copyright">
    <span class="center">&copy;&nbsp;
        <?= $this->text->e($this->helper->applicationBrandingHelper->getApplicationName()) ?>
        <?= $this->text->e($this->helper->applicationBrandingHelper->getCopyrightYears()) ?>
    </span>
</footer>
