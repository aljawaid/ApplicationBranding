<p><?= t('To reset your password click on this link:') ?></p>

<p><?= $this->url->to('PasswordResetController', 'change', array('token' => $token), '', true) ?></p>

<hr>
<footer class="copyright">
    <span class="center">&copy;&nbsp;
        <?php if (!empty($this->task->configModel->get('copyright_from'))): ?>
            <?= $this->task->configModel->get('copyright_from') ?>-<?= date("Y"); ?>
        <?php else: ?>
            <?= date("Y"); ?>
        <?php endif ?>
    </span>
</footer>
