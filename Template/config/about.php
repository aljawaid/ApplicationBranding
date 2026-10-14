<?php // See tests/output_safety_contract.php for configured application-name escaping. ?>
<div class="about-page">
    <h2 class="app-header">
        <?= $this->text->e($this->helper->applicationBrandingHelper->getApplicationName()) ?> <?= t('Dashboard') ?>
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
                    <span class="data-value data-open" title="<?= t('application_branding.open_projects') ?>"><?= count($allProjectsOpen) ?></span>
                    <span class="data-value data-closed" title="<?= t('application_branding.closed_projects') ?>"><?= count($allProjectsClosed) ?></span>
                    <span class="data-value data-totals cursor" title="<?= t('application_branding.total_projects') ?>"><?= count($allProjects) ?></span>
                </div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="kanban-personal-icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.personal_projects') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allPrivateProjects) ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <span class="kanban-public-icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.public_projects') ?></div>
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
                <div class="box-title"><?= t('application_branding.automatic_actions') ?></div>
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
                    <span class="data-value data-open" title="<?= t('application_branding.open_tasks') ?>"><?= count($allTasksOpen) ?></span>
                    <span class="data-value data-closed" title="<?= t('application_branding.closed_tasks') ?>"><?= count($allTasksClosed) ?></span>
                    <span class="data-value data-totals cursor" title="<?= t('application_branding.total_tasks') ?>"><?= $allTasks ?></span>
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
                    <span class="data-value data-project" title="<?= t('application_branding.project_tags') ?>"><?= $allTagsCount - $globalTagsCount ?></span>
                    <span class="data-value data-global" title="<?= t('application_branding.global_tags') ?>"><?= $globalTagsCount ?></span>
                    <span class="data-value data-totals" title="<?= t('application_branding.total_tags') ?>"><?= $allTagsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-grey">
                <div class="box-icon">
                    <i class="fa fa-fw fa-link" aria-hidden="true"></i>
                </div>
                <div class="box-title"><?= t('application_branding.link_labels') ?></div>
                <div class="box-data">
                    <span class="data-value bold" title="<?= t('application_branding.link_label_pairs') ?>"><?= $linkLabelsCount / 2 ?></span>
                    <span class="data-value data-totals" title="<?= t('application_branding.total_links') ?>"><?= $linkLabelsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-grey">
                <div class="box-icon">
                    <span class="ext-links-icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.external_links') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $externalLinks ?></span></div>
            </div>
            <?php if (file_exists('plugins/TemplateManager')): ?>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="template-manager-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('application_branding.templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="description-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('application_branding.task_templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allTaskTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="comment-templates-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('application_branding.comment_templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allCommentTemplates ?></span></div>
                </div>
                <div class="box-wrapper back-deep-green">
                    <div class="box-icon">
                        <span class="global-templates-icon-white"></span>
                    </div>
                    <div class="box-title"><?= t('application_branding.global_templates') ?></div>
                    <div class="box-data"><span class="data-value bold"><?= $allGlobalTemplates ?></span></div>
                </div>
            <?php endif ?>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="users_icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.user_groups') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allGroups) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="globe-icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.user_timezones') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentTimezonesCount - 1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="translate-icon-white"></span>
                </div>
                <div class="box-title"><?= t('application_branding.user_languages') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentLanguagesCount - 1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <span class="user_icon-white"></span>
                </div>
                <div class="box-title"><?= t('Users') ?></div>
                <div class="box-data">
                    <span class="data-value data-active" title="<?= t('application_branding.active_users') ?>"><?= count($activeUserCount) ?></span>
                    <span class="data-value data-disabled" title="<?= t('application_branding.disabled_users') ?>"><?= ($userCount - count($activeUserCount)) ?></span>
                    <span class="data-value data-totals" title="<?= t('application_branding.total_users') ?>"><?= $userCount ?></span>
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
                <div class="box-title"><?= t('application_branding.managers') ?></div>
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
                <span class="config-details-name"><?= t('application_branding.application_version') ?></span>
                <span class="config-details-value"><?= APP_VERSION ?></span>
                <?php $installDate = date("d F Y", filemtime(APP_DIR)); ?>
                <span class="install-date" title=""><i><?= t('application_branding.installed_on') ?> <?= $installDate ?></i></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.php_version') ?></span>
                <span class="config-details-value"><?= PHP_VERSION ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.php_sapi') ?></span>
                <span class="config-details-value"><?= PHP_SAPI ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.http_client') ?></span>
                <span class="config-details-value"><?= Kanboard\Core\Http\Client::backend() ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><abbr title="<?= t('application_branding.server_operating_system') ?>"><?= t('application_branding.server_os') ?></abbr></span>
                <span class="config-details-value"><?= @php_uname('s') . ' ' . @php_uname('r') ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.database_driver') ?></span>
                <span class="config-details-value"><?= DB_DRIVER ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.database_version') ?></span>
                <span class="config-details-value"><?= $this->text->e($db_version) ?></span>
            </li>
            <li class="config-details-item">
                <span class="config-details-name"><?= t('application_branding.browser') ?></span>
                <span class="config-details-value"><?= $this->text->e($user_agent) ?></span>
            </li>
        </ul>
        <?php if (file_exists('plugins/KanboardSupport')): ?>
            <div class="kb-info-btn">
                <?= $this->url->link('<span class="kanboard-support-icon"></span>' . t('application_branding.detailed_configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport'], false, 'btn kb-support-btn', t('application_branding.view_technical_information')) ?>
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
                    <?= t('application_branding.database_size') ?>
                    <strong><?= $this->text->bytes($db_size) ?></strong>
                </li>
                <li class="">
                    <?= $this->url->link(t('application_branding.download_database'), 'ConfigController', 'downloadDb', array(), true) ?>&nbsp;
                    <?= t('application_branding.sqlite_download_note') ?>
                </li>
                <li class="">
                    <?= $this->url->link(t('application_branding.upload_database'), 'ConfigController', 'uploadDb', array(), false, 'js-modal-medium') ?>
                </li>
                <li class="">
                    <?= $this->url->link(t('application_branding.optimize_database'), 'ConfigController', 'optimizeDb', array(), true) ?>&nbsp;
                    <?= t('(VACUUM command)') ?>
                </li>
                <?php // See tests/template_compatibility_contract.php for this Kanboard SQLite-options contract. ?>
                <?php foreach ($db_options as $option => $value): ?>
                    <li><strong><?= $this->text->e($option) ?></strong> = <?= $this->text->e($value) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <div class="app-header">
        <h2 class=""><?= t('application_branding.application_platform') ?></h2>
    </div>
    <div class="panel relative">
        <div class="channels-list">
            <div class="channels-wrapper">
                <a href="https://kanboard.org" class="channels-link" title="<?= t('application_branding.opens_new_window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('application_branding.website') ?></span>
                </a>
            </div>
            <?php if (APP_VERSION > '1.2.25'): ?>
                <div class="channels-wrapper">
                    <?= $this->helper->applicationBrandingHelper->getDocs(t('Documentation')) ?>
                </div>
            <?php endif ?>
            <div class="channels-wrapper">
                <a href="https://kanboard.org/plugins.html" class="channels-link" title="<?= t('application_branding.opens_new_window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-plugins">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('Plugins') ?></span>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://kanboard.discourse.group" class="channels-link" title="<?= t('application_branding.opens_new_window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-forum">
                        <span class="kanboard-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('application_branding.forum') ?></span>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://github.com/kanboard/kanboard/" class="channels-link" title="<?= t('application_branding.opens_new_window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper-gh">
                        <span class="github-icon"></span>
                    </div>
                    <span class="channels-name"><?= t('application_branding.source_code') ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="app-header">
        <h2 id="LicenseMIT" class=""><?= t('License') ?></h2>
    </div>
    <div class="panel">
        <details class="license">
            <summary><?= t('application_branding.application_license') ?></summary>
            <br>
            <?= nl2br($this->text->e(file_get_contents(ROOT_DIR . DIRECTORY_SEPARATOR . 'LICENSE'))) ?>
        </details>
    </div>
</div>
