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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                        <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                        <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                    </svg>
                </div>
                <div class="box-title"><?= t('User Languages') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentLanguagesCount - 1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg version="1.1" class="user_icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 409.165 409.164" xml:space="preserve">
                        <g id="" stroke-width="0"></g>
                        <g id="" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id=""> <g> <g> <path d="M204.583,216.671c50.664,0,91.74-48.075,91.74-107.378c0-82.237-41.074-107.377-91.74-107.377 c-50.668,0-91.74,25.14-91.74,107.377C112.844,168.596,153.916,216.671,204.583,216.671z"></path> <path d="M407.164,374.717L360.88,270.454c-2.117-4.771-5.836-8.728-10.465-11.138l-71.83-37.392 c-1.584-0.823-3.502-0.663-4.926,0.415c-20.316,15.366-44.203,23.488-69.076,23.488c-24.877,0-48.762-8.122-69.078-23.488 c-1.428-1.078-3.346-1.238-4.93-0.415L58.75,259.316c-4.631,2.41-8.346,6.365-10.465,11.138L2.001,374.717 c-3.191,7.188-2.537,15.412,1.75,22.005c4.285,6.592,11.537,10.526,19.4,10.526h362.861c7.863,0,15.117-3.936,19.402-10.527 C409.699,390.129,410.355,381.902,407.164,374.717z"></path> </g> </g> </g>
                    </svg>
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
                    <svg class="members_icon" fill="currentColor" width="18px" height="18px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 479.293 479.293" xml:space="preserve">
                        <g stroke-width="0"></g><g  stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M179.379,248.994l16.238-8.453c2.654-1.383,5.585-2.212,8.565-2.455c-1.731-1.782-3.425-3.628-5.069-5.551 c-19.569-22.905-30.346-53.182-30.346-85.254c0-42.062,10.536-73.904,31.315-94.637c3.263-3.255,6.76-6.217,10.48-8.897 c-4.008-0.368-8.099-0.548-12.26-0.548c-49.112,0-88.925,24.368-88.925,104.082C109.379,197.163,139.359,238.839,179.379,248.994z "></path> <path d="M62.872,397.28l44.863-101.063c3.695-8.324,10.18-15.227,18.26-19.434l20.074-10.449 c-5.081-2.75-10.002-5.904-14.721-9.474c-1.383-1.045-3.242-1.2-4.777-0.401l-69.624,36.244 c-4.489,2.336-8.091,6.17-10.144,10.795L1.939,404.561c-3.092,6.966-2.458,14.938,1.696,21.329 c4.154,6.389,11.184,10.204,18.806,10.204h43.775c-0.094-0.144-0.198-0.277-0.292-0.421 C58.446,424.17,57.306,409.818,62.872,397.28z"></path> <path d="M280.988,251.364c49.11,0,88.924-46.6,88.924-104.082c0-79.714-39.812-104.082-88.924-104.082 c-49.113,0-88.926,24.368-88.926,104.082C192.063,204.765,231.876,251.364,280.988,251.364z"></path> <path d="M477.354,404.561L432.49,303.498c-2.053-4.625-5.656-8.459-10.146-10.797l-69.624-36.242 c-1.535-0.799-3.396-0.644-4.777,0.4c-19.689,14.895-42.844,22.768-66.955,22.768c-24.112,0-47.265-7.873-66.958-22.768 c-1.383-1.045-3.242-1.201-4.777-0.4l-69.623,36.242c-4.489,2.338-8.091,6.172-10.144,10.797L84.624,404.561 c-3.092,6.966-2.458,14.938,1.696,21.329c4.154,6.389,11.184,10.204,18.806,10.204h351.726c7.622,0,14.652-3.814,18.806-10.204 C479.811,419.499,480.445,411.525,477.354,404.561z"></path> </g> </g> </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('Members') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allMembers) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg class="managers_icon" fill="currentColor" width="18px" height="18px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 436.38 436.381" xml:space="preserve">
                        <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M218.19,232c54.735,0,99.107-51.936,99.107-116c0-88.842-44.371-116-99.107-116c-54.736,0-99.107,27.158-99.107,116 C119.083,180.064,163.455,232,218.19,232z"></path> <path d="M432.47,408.266l-50-112.636c-1.838-4.142-5.027-7.534-9.045-9.626l-79.62-41.445c-4.809-2.504-10.423-2.947-15.564-1.231 c-5.141,1.715-9.364,5.442-11.707,10.329L232.7,324.266l4.261-38.408c0.133-1.201-0.174-2.412-0.865-3.405l-13.8-19.839 c-0.048-0.068-0.104-0.131-0.154-0.195l11.935-9.061c1.028-0.781,1.633-1.998,1.633-3.291c0-4.834-3.935-8.769-8.77-8.769h-17.498 c-4.835,0-8.769,3.935-8.769,8.769c0,1.293,0.604,2.51,1.633,3.291l11.934,9.061c-0.051,0.064-0.106,0.127-0.154,0.195 l-13.8,19.839c-0.691,0.993-0.999,2.204-0.865,3.405l4.26,38.408l-33.834-70.609c-2.342-4.887-6.566-8.614-11.707-10.329 c-5.14-1.716-10.757-1.271-15.564,1.231l-79.62,41.445c-4.018,2.092-7.207,5.484-9.045,9.626l-50,112.636 c-2.746,6.188-2.177,13.342,1.512,19.018c3.689,5.674,9.999,9.098,16.768,9.098h392c6.769,0,13.078-3.424,16.768-9.1 C434.648,421.607,435.216,414.453,432.47,408.266z"></path> </g> </g> </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('Managers') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allManagers) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg class="admins_icon" fill="currentColor" width="18px" height="18px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 106.391 106.391" xml:space="preserve">
                        <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <g> <path d="M102.527,75.992l-0.352-0.129c-0.002-0.5-0.021-0.996-0.059-1.494l0.336-0.154c1.436-0.66,2.527-1.84,3.074-3.324 c0.547-1.481,0.483-3.086-0.177-4.52l-1.362-2.961c-0.963-2.088-3.071-3.438-5.373-3.438c-0.857,0-1.688,0.183-2.469,0.541 l-0.34,0.156c-0.354-0.35-0.72-0.688-1.098-1.014l0.131-0.353c1.126-3.059-0.443-6.465-3.498-7.591l-3.061-1.131 c-0.637-0.234-1.307-0.354-1.991-0.354c-2.498,0-4.749,1.547-5.603,3.852l-0.129,0.352c-0.496,0.002-0.994,0.021-1.492,0.058 l-0.156-0.338c-0.961-2.088-3.07-3.438-5.373-3.438c-0.857,0-1.688,0.182-2.469,0.541l-2.963,1.363 c-2.959,1.363-4.259,4.883-2.896,7.844l0.155,0.338c-0.352,0.355-0.688,0.721-1.014,1.101L64.01,61.77 c-0.639-0.238-1.312-0.357-2.003-0.357c-0.438,0-0.866,0.062-1.284,0.154c-0.604-0.234-1.201-0.476-1.806-0.707 c-0.521-0.197-1.146-0.599-1.361-1.054c-0.569-1.264-0.964-2.602-1.378-3.92c-0.252-0.85-0.479-1.643-1.403-2.053 c-0.253-0.111-0.479-0.598-0.479-0.912c0.056-3.067-0.659-6.291,1.62-8.969c0.068-0.082,0.098-0.201,0.146-0.299 c1.229-2.688,1.439-5.764,3.158-8.266c0.043-0.055,0.053-0.137,0.062-0.209c0.201-1.916,0.404-3.814,0.568-5.725 c0.016-0.232-0.191-0.654-0.395-0.727c-0.944-0.332-0.896-1.096-0.889-1.854c0-3.729,0-4.271-0.008-8 c0-2.168-0.637-4.092-2.271-5.568c-1.87-1.676-3.785-3.299-5.704-4.916C49.663,7.604,49.578,7,50.447,6.141 c0.388-0.379,0.872-0.654,1.322-0.973c-0.103-0.148-0.197-0.293-0.292-0.439c-0.581,0-1.164-0.076-1.726,0.01 c-2.122,0.34-4.254,0.643-6.333,1.131c-3.979,0.938-7.839,2.182-11.063,4.844c-2.204,1.818-3.965,3.936-4.188,6.934 c-0.111,1.57-0.099,3.152-0.111,4.721c-0.013,2.564,0.022,1.941-0.032,4.496c-0.014,0.416-0.243,1.102-0.535,1.193 c-1.033,0.338-1.066,1-0.925,1.863c0.102,0.594,0.026,1.213,0.154,1.793c0.357,1.602,0.737,3.205,1.2,4.779 c0.341,1.174,1.007,2.283,1.197,3.477c0.363,2.385,1.256,4.457,2.866,6.262c0.263,0.297,0.463,0.797,0.433,1.193 c-0.127,1.83-0.314,3.666-0.563,5.49c-0.053,0.354-0.423,0.885-0.729,0.955c-1.22,0.248-1.407,1.186-1.698,2.141 c-0.381,1.254-0.791,2.502-1.276,3.718c-0.151,0.379-0.531,0.77-0.905,0.94c-2.164,0.938-4.375,1.812-6.56,2.726 c-2.321,0.977-4.67,1.911-6.939,2.987c-2.339,1.121-4.611,2.377-6.901,3.607c-1.348,0.721-2.607,1.521-3.66,2.512L0,86.082 c15.526,0,23.634,11.227,39.79,12.611l-5.953-8.218l9.232-25.25l-2.856-6.133h5.72l-2.863,6.133l9.233,25.25l-5.799,8.017 c5.602-0.937,12.793-3.795,19.773-6.533c0.107,0.098,0.209,0.201,0.318,0.295l-0.126,0.342c-0.552,1.482-0.489,3.091,0.171,4.523 c0.659,1.436,1.84,2.529,3.322,3.078l3.057,1.127c0.661,0.246,1.352,0.369,2.053,0.369c0.854,0,1.687-0.183,2.47-0.543 c1.435-0.66,2.526-1.84,3.073-3.32l0.129-0.352c0.498-0.003,0.996-0.021,1.494-0.06l0.154,0.34 c0.963,2.088,3.072,3.438,5.375,3.438c0.857,0,1.688-0.185,2.469-0.543l2.961-1.363c2.961-1.363,4.26-4.883,2.896-7.844 l-0.155-0.338c0.352-0.354,0.688-0.722,1.014-1.099l0.353,0.131c1.472,0.546,3.103,0.478,4.521-0.178 c1.434-0.658,2.523-1.838,3.072-3.319l1.129-3.06C107.152,80.531,105.586,77.125,102.527,75.992z M103.568,82.514l-1.129,3.06 c-0.271,0.729-0.808,1.311-1.513,1.635c-0.707,0.326-1.498,0.357-2.229,0.088l-2.418-0.893c-1,1.463-2.217,2.787-3.631,3.932 l1.076,2.336c0.672,1.459,0.033,3.191-1.426,3.863l-2.961,1.363c-1.457,0.672-3.191,0.03-3.863-1.427L84.4,94.135 c-1.789,0.332-3.588,0.396-5.35,0.203l-0.895,2.418c-0.269,0.729-0.805,1.312-1.512,1.638c-0.707,0.323-1.498,0.354-2.228,0.086 l-3.06-1.13c-0.729-0.27-1.311-0.809-1.635-1.516c-0.326-0.707-0.357-1.496-0.086-2.227l0.893-2.416 c-1.465-1-2.791-2.218-3.934-3.631l-2.337,1.075c-1.458,0.672-3.19,0.031-3.862-1.426l-1.363-2.963 c-0.672-1.457-0.032-3.189,1.427-3.861l2.336-1.075c-0.332-1.787-0.396-3.587-0.203-5.349l-2.418-0.895 c-0.728-0.269-1.31-0.806-1.638-1.513c-0.323-0.705-0.354-1.495-0.086-2.227l1.13-3.059c0.538-1.462,2.284-2.265,3.741-1.722 l2.414,0.892c1.002-1.463,2.22-2.789,3.633-3.935l-1.076-2.336c-0.671-1.457-0.031-3.19,1.427-3.863l2.961-1.362 c1.458-0.672,3.191-0.031,3.863,1.428l1.075,2.334c1.787-0.33,3.587-0.393,5.349-0.203l0.894-2.418 c0.539-1.457,2.28-2.26,3.74-1.723l3.059,1.131c1.505,0.555,2.277,2.234,1.723,3.74l-0.893,2.416 c1.463,1.002,2.789,2.217,3.932,3.633l2.338-1.078c1.457-0.672,3.189-0.031,3.861,1.428l1.363,2.959 c0.672,1.459,0.032,3.193-1.427,3.863l-2.336,1.076c0.332,1.789,0.396,3.586,0.204,5.35l2.418,0.894 C103.351,79.332,104.125,81.009,103.568,82.514z"></path> </g> <g> <path d="M81.016,87.441c-4.482,0-8.59-2.631-10.464-6.7c-2.655-5.769-0.126-12.621,5.642-15.277 c1.524-0.702,3.145-1.058,4.812-1.058c4.481,0,8.591,2.629,10.466,6.698c2.655,5.769,0.125,12.62-5.641,15.276 C84.303,87.084,82.684,87.441,81.016,87.441z M81.005,67.406c-1.231,0-2.429,0.263-3.558,0.782 c-4.264,1.965-6.135,7.031-4.17,11.297c1.387,3.011,4.424,4.956,7.738,4.956c1.23,0,2.43-0.265,3.559-0.784 c4.264-1.964,6.135-7.032,4.172-11.298C87.359,69.349,84.32,67.406,81.005,67.406z"></path> </g> </g> </g> </g>
                    </svg>
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
                <?= $this->url->link('
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-journal-code" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z"/><path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/><path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>' . t('Detailed Configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport'], false, 'btn kb-support-btn', t('View Technical Information')) ?>
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
                        <svg version="1.0" width="20px" height="20px" class="kanboard-icon" fill="currentColor" viewBox="0 0 144 144" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0.000000,144.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path fill="#000000" d="M820 704 l0 -525 208 3 c204 3 208 3 260 31 91 48 135 132 135 257 -1 123 -46 212 -127 252 l-44 21 41 21 c56 28 86 84 94 174 8 99 -14 167 -71 220 -66 61 -116 72 -323 72 l-173 0 0 -526z m375 392 c50 -21 75 -68 75 -141 0 -72 -14 -102 -59 -132 -31 -21 -45 -23 -157 -23 l-124 0 0 155 0 155 115 0 c78 0 127 -5 150 -14z m33 -441 c52 -32 75 -90 71 -185 -4 -88 -21 -120 -78 -154 -27 -16 -54 -19 -159 -20 l-127 -1 -3 193 -2 194 132 -4 c111 -2 139 -6 166 -23z"/>
                                <path fill="#d40000" d="M90 705 l0 -515 90 0 90 0 2 201 3 201 139 -197 c77 -108 145 -199 151 -201 6 -3 59 -3 117 -2 l105 3 -188 265 c-104 146 -186 271 -184 278 3 7 76 113 163 235 87 122 162 228 166 235 6 9 -17 12 -98 12 l-105 0 -133 -186 -133 -186 -3 186 -2 186 -90 0 -90 0 0 -515z"/>
                            </g>
                        </svg>
                    </div><?= t('Website') ?>
                </a>
            </div>
            <div class="channels-wrapper">
                <?= $this->helper->applicationBrandingHelper->getDocs(t('Documentation'), 'index') ?>
            </div>
            <div class="channels-wrapper">
                <a href="https://kanboard.org/plugins.html" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-plugins">
                        <svg version="1.0" width="20px" height="20px" class="kanboard-icon" fill="currentColor" viewBox="0 0 144 144" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0.000000,144.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path fill="#000000" d="M820 704 l0 -525 208 3 c204 3 208 3 260 31 91 48 135 132 135 257 -1 123 -46 212 -127 252 l-44 21 41 21 c56 28 86 84 94 174 8 99 -14 167 -71 220 -66 61 -116 72 -323 72 l-173 0 0 -526z m375 392 c50 -21 75 -68 75 -141 0 -72 -14 -102 -59 -132 -31 -21 -45 -23 -157 -23 l-124 0 0 155 0 155 115 0 c78 0 127 -5 150 -14z m33 -441 c52 -32 75 -90 71 -185 -4 -88 -21 -120 -78 -154 -27 -16 -54 -19 -159 -20 l-127 -1 -3 193 -2 194 132 -4 c111 -2 139 -6 166 -23z"/>
                                <path fill="#d40000" d="M90 705 l0 -515 90 0 90 0 2 201 3 201 139 -197 c77 -108 145 -199 151 -201 6 -3 59 -3 117 -2 l105 3 -188 265 c-104 146 -186 271 -184 278 3 7 76 113 163 235 87 122 162 228 166 235 6 9 -17 12 -98 12 l-105 0 -133 -186 -133 -186 -3 186 -2 186 -90 0 -90 0 0 -515z"/>
                            </g>
                        </svg>
                    </div><?= t('Plugins') ?>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://kanboard.discourse.group" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-forum">
                        <svg version="1.0" width="20px" height="20px" class="kanboard-icon" fill="currentColor" viewBox="0 0 144 144" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0.000000,144.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path fill="#000000" d="M820 704 l0 -525 208 3 c204 3 208 3 260 31 91 48 135 132 135 257 -1 123 -46 212 -127 252 l-44 21 41 21 c56 28 86 84 94 174 8 99 -14 167 -71 220 -66 61 -116 72 -323 72 l-173 0 0 -526z m375 392 c50 -21 75 -68 75 -141 0 -72 -14 -102 -59 -132 -31 -21 -45 -23 -157 -23 l-124 0 0 155 0 155 115 0 c78 0 127 -5 150 -14z m33 -441 c52 -32 75 -90 71 -185 -4 -88 -21 -120 -78 -154 -27 -16 -54 -19 -159 -20 l-127 -1 -3 193 -2 194 132 -4 c111 -2 139 -6 166 -23z"/>
                                <path fill="#d40000" d="M90 705 l0 -515 90 0 90 0 2 201 3 201 139 -197 c77 -108 145 -199 151 -201 6 -3 59 -3 117 -2 l105 3 -188 265 c-104 146 -186 271 -184 278 3 7 76 113 163 235 87 122 162 228 166 235 6 9 -17 12 -98 12 l-105 0 -133 -186 -133 -186 -3 186 -2 186 -90 0 -90 0 0 -515z"/>
                            </g>
                        </svg>
                    </div><?= t('Forum') ?>
                </a>
            </div>
            <div class="channels-wrapper">
                <a href="https://github.com/kanboard/kanboard/" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper-gh">
                        <svg width="20px" height="20px" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        </svg>
                    </div><?= t('Source Code') ?>
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
