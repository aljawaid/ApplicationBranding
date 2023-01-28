<h2 class="app-header">
    <?php if (!empty($this->task->configModel->get('app_rename'))): ?>
        <?= $this->task->configModel->get('app_rename') ?> <?= t('Dashboard') ?>
    <?php else: ?>
        <?= t('My Workspace Dashboard') ?>
    <?php endif ?>
</h2>

<?php
$allProjectsOpen = $this->task->projectModel->getListByStatus(1);
$allProjectsClosed = $this->task->projectModel->getListByStatus(0);
$allProjects = $this->task->projectModel->getAll();
$allPrivateProjects = $this->task->db->table('projects')->eq('is_private', 1)->findAll();
$allPublicProjects = $this->task->db->table('projects')->eq('is_public', 1)->findAll();
$allCategories = $this->task->db->table('project_has_categories')->count();
$allActions = $this->task->db->table('actions')->count();
$allTasks = $this->task->db->table('tasks')->count();
$allComments = $this->task->db->table('comments')->count();
$projectFiles = $this->task->db->table('project_has_files')->count();
$taskFiles = $this->task->db->table('task_has_files')->count();
$allFiles = ($projectFiles + $taskFiles);
$allTags = $this->task->tagModel->getAll();
$allTagsCount = count($allTags);
$globalTags = $this->model->tagModel->getAllByProject(0);
$globalTagsCount = count($globalTags);
$linkLabels = $this->task->linkModel->getAll();
$linkLabelsCount = count($linkLabels);
$installedPlugins = $this->task->pluginLoader->getPlugins();
$installedPluginsCount = count($installedPlugins);
$userCount = $this->task->db->table('users')->count();
$activeUserCount = $this->task->db->table('users')->eq('is_active', 1)->findAll();
$allGroups = $this->task->groupModel->getAll();
$allAdmins = $this->task->db->table('users')->eq('role', 'app-admin')->findAll();
?>

<div class="page-header">
    <h2 class=""><?= t('Platform') ?></h2>
</div>
<div class="panel">
    <ul class="">
        <li class="">
            <?= t('Official website:') ?>
            <a href="https://kanboard.org/" target="_blank" rel="noopener noreferrer">https://kanboard.org/</a>
        </li>
        <li class="">
            <?= t('Author:') ?>
            <strong>Frédéric Guillot</strong> (<a href="https://github.com/kanboard/kanboard/graphs/contributors" target="_blank" rel="noopener noreferrer"><?= t('contributors') ?></a>)
        </li>
        <li class="">
            <?= t('License:') ?>
            <strong>MIT</strong>
        </li>
    </ul>
</div>

<?= $this->hook->render('template:config:about') ?>

<div class="page-header">
    <h2><?= t('Configuration') ?></h2>
</div>
<div class="panel">
    <ul class="">
        <li class="">
            <?= t('Application version:') ?>
            <strong><?= APP_VERSION ?></strong>
        </li>
        <li class="">
            <?= t('PHP version:') ?>
            <strong><?= PHP_VERSION ?></strong>
        </li>
        <li class="">
            <?= t('PHP SAPI:') ?>
            <strong><?= PHP_SAPI ?></strong>
        </li>
        <li class="">
            <?= t('HTTP Client:') ?>
            <strong><?= Kanboard\Core\Http\Client::backend() ?></strong>
        </li>
        <li class="">
            <?= t('OS version:') ?>
            <strong><?= @php_uname('s').' '.@php_uname('r') ?></strong>
        </li>
        <li class="">
            <?= t('Database driver:') ?>
            <strong><?= DB_DRIVER ?></strong>
        </li>
        <li class="">
            <?= t('Database version:') ?>
            <strong><?= $this->text->e($db_version) ?></strong>
        </li>
        <li class="">
            <?= t('Browser:') ?>
            <strong><?= $this->text->e($user_agent) ?></strong>
        </li>
    </ul>
</div>

<?php if (DB_DRIVER === 'sqlite'): ?>
    <div class="page-header">
        <h2><?= t('Database') ?></h2>
    </div>
    <div class="panel">
        <ul>
            <li>
                <?= t('Database size:') ?>
                <strong><?= $this->text->bytes($db_size) ?></strong>
            </li>
            <li>
                <?= $this->url->link(t('Download the database'), 'ConfigController', 'downloadDb', array(), true) ?>&nbsp;
                <?= t('(Gzip compressed Sqlite file)') ?>
            </li>
            <li>
                <?= $this->url->link(t('Upload the database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium') ?>
            </li>
            <li>
                <?= $this->url->link(t('Optimize the database'), 'ConfigController', 'optimizeDb', array(), true) ?>&nbsp;
                <?= t('(VACUUM command)') ?>
            </li>
        </ul>
    </div>
<?php endif ?>

<div class="page-header">
    <h2><?= t('License') ?></h2>
</div>
<div class="panel">
<?= nl2br(file_get_contents(ROOT_DIR.DIRECTORY_SEPARATOR.'LICENSE')) ?>
</div>
