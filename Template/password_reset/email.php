<p><?= t('Click on the following link to reset your password:') ?></p>

<p><?= $this->url->to('PasswordResetController', 'change', array('token' => $token), '', true) ?></p>

<hr>
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
