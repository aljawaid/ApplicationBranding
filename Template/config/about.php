<div class="about-page">
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
    $allTasksOpen = $this->task->db->table('tasks')->eq('is_active', 1)->findAll();
    $allTasksClosed = $this->task->db->table('tasks')->eq('is_active', 0)->findAll();
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
    $userTimezones = $this->task->db->table('users')->findAllByColumn('timezone');
    $userDifferentTimezones = array_unique($userTimezones);
    $userDifferentTimezonesCount = count($userDifferentTimezones);
    $userLanguages = $this->task->db->table('users')->findAllByColumn('language');
    $userDifferentLanguages = array_unique($userLanguages);
    $userDifferentLanguagesCount = count($userDifferentLanguages);
    $allManagers = $this->task->db->table('users')->eq('role', 'app-manager')->findAll();
    $allMembers = $this->task->db->table('users')->eq('role', 'app-user')->findAll();
    $userCount = $this->task->db->table('users')->count();
    $activeUserCount = $this->task->db->table('users')->eq('is_active', 1)->findAll();
    $allGroups = $this->task->groupModel->getAll();
    $allAdmins = $this->task->db->table('users')->eq('role', 'app-admin')->findAll();
    $externalLinks = $this->task->db->table('task_has_external_links')->count();
    if (file_exists('plugins/TemplateManager')) {
        $allTaskTemplates = $this->task->db->table('predefined_task_descriptions')->count();
        $allCommentTemplates = $this->task->db->table('comment_templates')->count();
        $allGlobalTemplates = $this->task->db->table('global_templates')->count();
        $allTemplates = ($allTaskTemplates + $allCommentTemplates + $allGlobalTemplates);
    }
    ?>

    <div class="dash-block">
        <div class="box-row">
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="kanban-icon-white"></span>
                </div>
                <div class="box-title"><?= t('Projects') ?></div>
                <div class="box-data">
                    <span class="data-value data-open" title="<?= t('Open Projects') ?>"><?= count($allProjectsOpen) ?></span>
                    <span class="data-value data-closed" title="<?= t('Closed Projects') ?>"><?= count($allProjectsClosed) ?></span>
                    <span class="data-value data-totals cursor" title="<?= t('Total Projects') ?>"><?= count($allProjects) ?></span>
                </div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="kanban-personal-icon-white"></span>
                </div>
                <div class="box-title"><?= t('Personal Projects') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allPrivateProjects) ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="kanban-public-icon-white"></span>
                </div>
                <div class="box-title"><?= t('Public Projects') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allPublicProjects) ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <i class="fa fa-fw fa-folder-open" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('Categories') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allCategories ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="aa-icon-faded"></span>
                </div>
                <div class="box-title"><?= t('Automatic Actions') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allActions ?></span></div>
            </div>
            <div class="box-wrapper back-green">
                <div class="box-icon">
                    <span class="plugin-icon-white"></span>
                </div>
                <div class="box-title"><?= t('Plugins') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $installedPluginsCount ?></span></div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon">
                    <i class="fa fa-fw fa-sticky-note" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('Tasks') ?></div>
                <div class="box-data">
                    <span class="data-value data-open" title="<?= t('Open Tasks') ?>"><?= count($allTasksOpen) ?></span>
                    <span class="data-value data-closed" title="<?= t('Closed Tasks') ?>"><?= count($allTasksClosed) ?></span>
                    <span class="data-value data-totals cursor" title="<?= t('Total Tasks') ?>"><?= $allTasks ?></span>
                </div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon">
                    <i class="fa fa-fw fa-comments-o" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('Comments') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allComments ?></span></div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon">
                    <i class="fa fa-fw fa-file" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('Attachments') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allFiles ?></span></div>
            </div>
            <div class="box-wrapper back-purple">
                <div class="box-icon">
                    <span class="project-tags-icon-white"></span>
                </div>
                <div class="box-title"><?= t('Tags') ?></div>
                <div class="box-data">
                    <span class="data-value data-project" title="<?= t('Project Tags') ?>"><?= $allTagsCount - $globalTagsCount ?></span>
                    <span class="data-value data-global" title="<?= t('Global Tags') ?>"><?= $globalTagsCount ?></span>
                    <span class="data-value data-totals" title="<?= t('Total Tags') ?>"><?= $allTagsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-grey">
                <div class="box-icon">
                    <i class="fa fa-fw fa-link" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('Link Labels') ?></div>
                <div class="box-data">
                    <span class="data-value bold" title="<?= t('Link Label Pairs') ?>"><?= $linkLabelsCount / 2 ?></span>
                    <span class="data-value data-totals" title="<?= t('Total Links') ?>"><?= $linkLabelsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-grey">
                <div class="box-icon">
                    <span class="ext-links-icon-white"></span>
                </div>
                <div class="box-title"><?= t('External Links') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $externalLinks ?></span></div>
            </div>
            <?php if (file_exists('plugins/TemplateManager')): ?>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="template-manager-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('Templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="description-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('Task Templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allTaskTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="comment-templates-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('Comment Templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allCommentTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="global-templates-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('Global Templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allGlobalTemplates ?></span></div>
                </div>
            <?php endif ?>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="users_icon-white"></span>
                </div>
                <div class="box-title"><?= t('User Groups') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allGroups) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="globe-icon-white"></span>
                </div>
                <div class="box-title"><?= t('User Timezones') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentTimezonesCount - 1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="translate-icon-white"></span>
                </div>
                <div class="box-title"><?= t('User Languages') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentLanguagesCount - 1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="user_icon-white"></span>
                </div>
                <div class="box-title"><?= t('Users') ?></div>
                <div class="box-data">
                    <span class="data-value data-active" title="<?= t('Active Users') ?>"><?= count($activeUserCount) ?></span>
                    <span class="data-value data-disabled" title="<?= t('Disabled Users') ?>"><?= ($userCount - count($activeUserCount)) ?></span>
                    <span class="data-value data-totals" title="<?= t('Total Users') ?>"><?= $userCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="members_icon-white"></span>
                </div>
                <div class="box-title"><?= t('Members') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allMembers) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="managers_icon-white"></span>
                </div>
                <div class="box-title"><?= t('Managers') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allManagers) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="admins_icon-white"></span>
                </div>
                <div class="box-title"><?= t('Administrators') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allAdmins) ?></span></div>
            </div>
        </div>
    </div>

    <?= $this->hook->render('template:config:about') ?>

    <div class="app-header">
        <h2><?= t('Configuration') ?></h2>
    </div>
    <div class="panel relative">
        <ul class="config-details">
            <li class="config-details-item">
                <span class="config-details-name"><?= t('Application Version') ?></span>
                <span class="config-details-value"><?= APP_VERSION ?></span>
                <?php $installDate = date("d F Y", filemtime(APP_DIR)); ?>
                <span class="install-date" title=""><i><?= t('Installed on') ?> <?= $installDate ?></i></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('PHP Version') ?></span>
                <span class="config-details-value"><?= PHP_VERSION ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('PHP SAPI') ?></span>
                <span class="config-details-value"><?= PHP_SAPI ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('HTTP Client') ?></span>
                <span class="config-details-value"><?= Kanboard\Core\Http\Client::backend() ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><abbr title="<?= t('Server Operating System') ?>"><?= t('Server OS') ?></abbr></span>
                <span class="config-details-value"><?= @php_uname('s') . ' ' . @php_uname('r') ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('Database Driver') ?></span>
                <span class="config-details-value"><?= DB_DRIVER ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('Database Version') ?></span>
                <span class="config-details-value"><?= $this->text->e($db_version) ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('Browser') ?></span>
                <span class="config-details-value"><?= $this->text->e($user_agent) ?></span>
            </li>
        </ul>
        <?php if (file_exists('plugins/KanboardSupport')): ?>
            <div class="kb-info-btn">
                <?= $this->url->link('<span class="kanboard-support-icon"></span>' . t('Detailed Configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport'], false, 'btn kb-support-btn', t('View Technical Information')) ?>
            </div>
        <?php endif ?>
    </div>

    <?php if (DB_DRIVER === 'sqlite'): ?>
        <div class="app-header">
            <h2 class=""><?= t('Database') ?></h2>
        </div>
        <div class="panel">
            <ul class="">
                <li class="">
                    <?= t('Database Size') ?>
                    <strong><?= $this->text->bytes($db_size) ?></strong>
                </li>
                <li class="">
                    <?= $this->url->link(t('Download Database'), 'ConfigController', 'downloadDb', array(), true) ?>&nbsp;
                    <?= t('(Gzip compressed SQLite file)') ?>
                </li>
                <li class="">
                    <?= $this->url->link(t('Upload Database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium') ?>
                </li>
                <li class="">
                    <?= $this->url->link(t('Optimize Database'), 'ConfigController', 'optimizeDb', array(), true) ?>&nbsp;
                    <?= t('(VACUUM command)') ?>
                </li>
            </ul>
        </div>
    <?php endif ?>

    <div class="app-header">
        <h2 class=""><?= t('Application Platform') ?></h2>
    </div>
    <div class="panel relative">
        <div class="channels-list">
            <div class="channels-wrapper">
                <a href="https://kanboard.org" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('Website') ?></span>
                </a>
            </div>
            <?php if (APP_VERSION > '1.2.25'): ?>
                <div class="channels-wrapper">
                    <?= $this->helper->applicationBrandingHelper->getDocs(t('Documentation')) ?>
                </div>
            <?php endif ?>
            <div class="channels-wrapper">
                <a href="https://kanboard.org/plugins.html" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-plugins">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('Plugins') ?></span>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://kanboard.discourse.group" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-forum">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('Forum') ?></span>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://github.com/kanboard/kanboard/" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper-gh">
                        <span class="github-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('Source Code') ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="app-header">
        <h2 id="LicenseMIT" class=""><?= t('License') ?></h2>
    </div>
    <div class="panel">
        <details class="license">
            <summary><?= t('Application License') ?></summary>
            <br>
            <?= nl2br(file_get_contents(ROOT_DIR . DIRECTORY_SEPARATOR . 'LICENSE')) ?>
        </details>
    </div>
</div>
