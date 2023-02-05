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
    $allManagers= $this->task->db->table('users')->eq('role', 'app-manager')->findAll();
    $allMembers= $this->task->db->table('users')->eq('role', 'app-user')->findAll();
    $userCount = $this->task->db->table('users')->count();
    $activeUserCount = $this->task->db->table('users')->eq('is_active', 1)->findAll();
    $allGroups = $this->task->groupModel->getAll();
    $allAdmins = $this->task->db->table('users')->eq('role', 'app-admin')->findAll();
    ?>

    <div class="dash-block">
        <div class="box-row">
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <svg class="kanban-icon" fill="currentColor" width="18px" height="18px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path d="M9,3 L9,21 L15,21 L15,3 L9,3 Z M8,3 L3.5,3 C2.67157288,3 2,3.67157288 2,4.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 L8,21 L8,3 Z M16,3 L16,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,4.5 C22,3.67157288 21.3284271,3 20.5,3 L16,3 Z M1,4.5 C1,3.11928813 2.11928813,2 3.5,2 L20.5,2 C21.8807119,2 23,3.11928813 23,4.5 L23,19.5 C23,20.8807119 21.8807119,22 20.5,22 L3.5,22 C2.11928813,22 1,20.8807119 1,19.5 L1,4.5 Z M4,6 L6,6 C6.55228475,6 7,6.44771525 7,7 L7,8 C7,8.55228475 6.55228475,9 6,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M4,10 L6,10 C6.55228475,10 7,10.4477153 7,11 L7,12 C7,12.5522847 6.55228475,13 6,13 L4,13 C3.44771525,13 3,12.5522847 3,12 L3,11 C3,10.4477153 3.44771525,10 4,10 Z M11,6 L13,6 C13.5522847,6 14,6.44771525 14,7 L14,8 C14,8.55228475 13.5522847,9 13,9 L11,9 C10.4477153,9 10,8.55228475 10,8 L10,7 C10,6.44771525 10.4477153,6 11,6 Z M18,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L18,9 C17.4477153,9 17,8.55228475 17,8 L17,7 C17,6.44771525 17.4477153,6 18,6 Z M18,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,12 C21,12.5522847 20.5522847,13 20,13 L18,13 C17.4477153,13 17,12.5522847 17,12 L17,11 C17,10.4477153 17.4477153,10 18,10 Z M18,14 L20,14 C20.5522847,14 21,14.4477153 21,15 L21,16 C21,16.5522847 20.5522847,17 20,17 L18,17 C17.4477153,17 17,16.5522847 17,16 L17,15 C17,14.4477153 17.4477153,14 18,14 Z M4,7 L4,8 L6,8 L6,7 L4,7 Z M4,11 L4,12 L6,12 L6,11 L4,11 Z M11,7 L11,8 L13,8 L13,7 L11,7 Z M18,7 L18,8 L20,8 L20,7 L18,7 Z M18,11 L18,12 L20,12 L20,11 L18,11 Z M18,15 L18,16 L20,16 L20,15 L18,15 Z M3.5,5 C3.22385763,5 3,4.77614237 3,4.5 C3,4.22385763 3.22385763,4 3.5,4 L6.5,4 C6.77614237,4 7,4.22385763 7,4.5 C7,4.77614237 6.77614237,5 6.5,5 L3.5,5 Z M10.5,5 C10.2238576,5 10,4.77614237 10,4.5 C10,4.22385763 10.2238576,4 10.5,4 L13.5,4 C13.7761424,4 14,4.22385763 14,4.5 C14,4.77614237 13.7761424,5 13.5,5 L10.5,5 Z M17.5,5 C17.2238576,5 17,4.77614237 17,4.5 C17,4.22385763 17.2238576,4 17.5,4 L20.5,4 C20.7761424,4 21,4.22385763 21,4.5 C21,4.77614237 20.7761424,5 20.5,5 L17.5,5 Z"></path> </g>
                    </svg>
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
                    <svg class="kanban-personal-icon" fill="currentColor" width="18px" height="18px" viewBox="0 0 73 73" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="container" transform="translate(2.000000, 2.000000)" fill="#FFFFFF" fill-rule="nonzero" stroke="#1E1917" stroke-width="2"> <rect id="mask" x="-1" y="-1" width="71" height="71" rx="14"> </rect> </g> <g id="equalizing-bars" transform="translate(36.500000, 36.500000) rotate(-180.000000) translate(-36.500000, -36.500000) translate(13.000000, 15.000000)" fill="#000000" fill-rule="nonzero"> <path d="M11.75,33.869 L1.855,33.869 C0.831,33.869 0,34.699 0,35.724 L0,40.671 C0,41.695 0.831,42.525 1.855,42.525 L11.75,42.525 C12.774,42.525 13.605,41.694 13.605,40.671 L13.605,35.724 C13.605,34.699 12.774,33.869 11.75,33.869 Z"> </path> <path d="M11.75,22.737 L1.855,22.737 C0.831,22.737 0,23.568 0,24.591 L0,29.538 C0,30.563 0.831,31.393 1.855,31.393 L11.75,31.393 C12.774,31.393 13.605,30.563 13.605,29.538 L13.605,24.591 C13.605,23.567 12.774,22.737 11.75,22.737 Z"> </path> <path d="M11.75,11.605 L1.855,11.605 C0.831,11.605 0,12.435 0,13.46 L0,18.407 C0,19.432 0.831,20.262 1.855,20.262 L11.75,20.262 C12.774,20.262 13.605,19.431 13.605,18.407 L13.605,13.46 C13.605,12.436 12.774,11.605 11.75,11.605 Z"> </path> <path d="M28.447,33.869 L18.551,33.869 C17.527,33.869 16.696,34.699 16.696,35.724 L16.696,40.671 C16.696,41.695 17.527,42.525 18.551,42.525 L28.447,42.525 C29.47,42.525 30.301,41.694 30.301,40.671 L30.301,35.724 C30.303,34.699 29.473,33.869 28.447,33.869 Z"> </path> <path d="M28.447,22.737 L18.551,22.737 C17.527,22.737 16.696,23.568 16.696,24.591 L16.696,29.538 C16.696,30.563 17.527,31.393 18.551,31.393 L28.447,31.393 C29.47,31.393 30.301,30.563 30.301,29.538 L30.301,24.591 C30.303,23.567 29.473,22.737 28.447,22.737 Z"> </path> <path d="M45.145,33.869 L35.25,33.869 C34.227,33.869 33.395,34.699 33.395,35.724 L33.395,40.671 C33.395,41.695 34.227,42.525 35.25,42.525 L45.145,42.525 C46.169,42.525 47,41.694 47,40.671 L47,35.724 C47,34.699 46.169,33.869 45.145,33.869 Z"> </path> <path d="M45.145,22.737 L35.25,22.737 C34.227,22.737 33.395,23.568 33.395,24.591 L33.395,29.538 C33.395,30.563 34.227,31.393 35.25,31.393 L45.145,31.393 C46.169,31.393 47,30.563 47,29.538 L47,24.591 C47,23.567 46.169,22.737 45.145,22.737 Z"> </path> <path d="M45.145,11.605 L35.25,11.605 C34.227,11.605 33.395,12.435 33.395,13.46 L33.395,18.407 C33.395,19.432 34.227,20.262 35.25,20.262 L45.145,20.262 C46.169,20.262 47,19.431 47,18.407 L47,13.46 C47,12.436 46.169,11.605 45.145,11.605 Z"> </path> <path d="M45.145,0.474 L35.25,0.474 C34.227,0.474 33.395,1.305 33.395,2.329 L33.395,7.276 C33.395,8.301 34.227,9.131 35.25,9.131 L45.145,9.131 C46.169,9.131 47,8.301 47,7.276 L47,2.329 C47,1.304 46.169,0.474 45.145,0.474 Z"> </path> </g> </g> </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('Personal Projects') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allPrivateProjects) ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-kanban kanban-public-icon" viewBox="0 0 16 16">
                        <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
                        <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
                    </svg>
                </div>
                <div class="box-title"><?= t('Public Projects') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allPublicProjects) ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon"><i class="fa fa-fw fa-folder-open" aria-hidden="true"></i></div>
                <div class="box-title"><?= t('Categories') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allCategories ?></span></div>
            </div>
            <div class="box-wrapper back-copper">
                <div class="box-icon">
                    <svg version="1.1" class="aa-icon-faded" width="20px" height="20px" fill="currentColor" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke-width="0"></g>
                        <g stroke-linecap="round" stroke-linejoin="round"></g>
                        <g><style type="text/css"> .blueprint_een {fill: #000000;} .st0 {fill: #000000;} </style>
                            <path class="blueprint_een" d="M31.981,15.403C31.676,10.691,27.61,7,22.726,7H16V6.414c0-1.104-0.9-2.002-2.007-2.002h0 c-0.528,0-1.028,0.209-1.407,0.588l-2,2H9C6.522,7,4.128,8.037,2.433,9.846c-1.719,1.834-2.576,4.232-2.413,6.751 C0.324,21.309,4.39,25,9.274,25H16v0.586c0,1.104,0.9,2.002,2.007,2.002c0.528,0,1.028-0.209,1.407-0.588l2-2H23 c2.478,0,4.872-1.037,6.568-2.846C31.287,20.32,32.144,17.922,31.981,15.403z M18,25.586V23H9.274c-3.833,0-7.022-2.869-7.259-6.532 C1.751,12.393,4.965,9,9,9h1l-1.293,1.293c-0.391,0.391-0.391,1.024,0,1.414L10,13H9c-1.838,0-3.261,1.643-2.96,3.496 C6.272,17.924,7.591,19,9.107,19H18v-2.586L22.586,21L18,25.586z M11,14l2.293,2.293c0.204,0.204,0.454,0.295,0.7,0.295 c0.514,0,1.007-0.399,1.007-1.002V14h7.893c0.996,0,1.92,0.681,2.08,1.664C25.176,16.917,24.215,18,23,18h-2l-2.293-2.293 c-0.204-0.204-0.454-0.295-0.7-0.295c-0.514,0-1.007,0.399-1.007,1.002V18H9.107c-0.996,0-1.92-0.681-2.08-1.664 C6.824,15.083,7.785,14,9,14H11z"></path>
                            <path d="M23,23h-1l1.293-1.293c0.391-0.391,0.391-1.024,0-1.414L22,19h1c1.838,0,3.261-1.643,2.96-3.496 C25.728,14.076,24.409,13,22.893,13H14l0,2.586L9.414,11L14,6.415V9h8.726c3.833,0,7.022,2.869,7.259,6.532 C30.249,19.607,27.035,23,23,23z"></path>
                        </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('Automatic Actions') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allActions ?></span></div>
            </div>
            <div class="box-wrapper back-green">
                <div class="box-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plugin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z"/>
                    </svg>
                </div>
                <div class="box-title"><?= t('Plugins') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $installedPluginsCount ?></span></div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon"><i class="fa fa-fw fa-sticky-note" aria-hidden="true"></i></div>
                <div class="box-title"><?= t('Tasks') ?></div>
                <div class="box-data">
                    <span class="data-value data-open" title="<?= t('Open Tasks') ?>"><?= count($allTasksOpen) ?></span>
                    <span class="data-value data-closed" title="<?= t('Closed Tasks') ?>"><?= count($allTasksClosed) ?></span>
                    <span class="data-value data-totals cursor" title="<?= t('Total Tasks') ?>"><?= $allTasks ?></span>
                </div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon"><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i></div>
                <div class="box-title"><?= t('Comments') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allComments ?></span></div>
            </div>
            <div class="box-wrapper back-orange">
                <div class="box-icon"><i class="fa fa-fw fa-file" aria-hidden="true"></i></div>
                <div class="box-title"><?= t('Attachments') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $allFiles ?></span></div>
            </div>
            <div class="box-wrapper back-purple">
                <div class="box-icon">
                    <svg width="22px" height="22px" class="project_tags" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                        <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                            <g fill="CurrentColor">
                                <path d="M6.2653953,5 L4.99961498,5 C3.89525812,5 3,5.88743329 3,6.99961498 L3,15 L16.3809027,28.3809027 C17.1646418,29.1646418 18.433119,29.1668566 19.2115341,28.3884415 L19.8626502,27.7373254 C20.6198849,28.1384197 21.5780112,28.0219644 22.2115341,27.3884415 L29.3884415,20.2115341 C30.168017,19.4319586 30.1640508,18.1640508 29.3809027,17.3809027 L16,4 L7.99961498,4 C7.25796139,4 6.61061281,4.40023868 6.2653953,5 L6.2653953,5 L6.2653953,5 Z M6,6 L5.00844055,6 C4.45149422,6 4,6.45699692 4,7.00844055 L4,14.5 L17.0998579,27.671163 C17.488383,28.0618028 18.1183535,28.0613199 18.5042948,27.672744 L19.0865321,27.0865321 L6,14 L6,6 L6,6 Z M15.5,5 L8.00844055,5 C7.45149422,5 7,5.45699692 7,6.00844055 L7,13.5 L20.0998579,26.671163 C20.488383,27.0618028 21.1183535,27.0613199 21.5042948,26.672744 L28.6678854,19.4602516 C29.0550094,19.0704849 29.0531075,18.4413912 28.6620109,18.0535183 L15.5,5 L15.5,5 Z M11.5,12 C12.8807119,12 14,10.8807119 14,9.5 C14,8.11928806 12.8807119,7 11.5,7 C10.1192881,7 9,8.11928806 9,9.5 C9,10.8807119 10.1192881,12 11.5,12 L11.5,12 Z M11.5,11 C12.3284272,11 13,10.3284272 13,9.5 C13,8.67157283 12.3284272,8 11.5,8 C10.6715728,8 10,8.67157283 10,9.5 C10,10.3284272 10.6715728,11 11.5,11 L11.5,11 Z" id=""/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('Tags') ?></div>
                <div class="box-data">
                    <span class="data-value data-project" title="<?= t('Project Tags') ?>"><?= $allTagsCount - $globalTagsCount ?></span>
                    <span class="data-value data-global" title="<?= t('Global Tags') ?>"><?= $globalTagsCount ?></span>
                    <span class="data-value data-totals" title="<?= t('Total Tags') ?>"><?= $allTagsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-grey">
                <div class="box-icon"><i class="fa fa-fw fa-link" aria-hidden="true"></i></div>
                <div class="box-title"><?= t('Link Labels') ?></div>
                <div class="box-data">
                    <span class="data-value bold" title="<?= t('Link Label Pairs') ?>"><?= $linkLabelsCount/2 ?></span>
                    <span class="data-value data-totals" title="<?= t('Total Links') ?>"><?= $linkLabelsCount ?></span>
                </div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg version="1.1" class="users_icon" fill="currentColor" width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 465.888 465.888" xml:space="preserve">
                        <g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g> <g> <path d="M464.283,357.994l-37.104-83.588c-1.698-3.826-4.679-6.997-8.392-8.93L361.201,235.5c-1.27-0.662-2.808-0.533-3.951,0.33 c-6.347,4.801-13.132,8.709-20.226,11.703l34.318,17.864c7.806,4.063,14.068,10.729,17.637,18.771l41.229,92.879 c1.017,2.289,1.8,4.643,2.354,7.026h14.762c6.305,0,12.119-3.154,15.555-8.439C466.316,370.349,466.842,363.755,464.283,357.994z"></path> <path d="M94.545,265.398l34.319-17.864c-7.094-2.996-13.88-6.901-20.228-11.703c-1.144-0.864-2.682-0.991-3.951-0.331 l-57.585,29.978c-3.713,1.933-6.692,5.103-8.39,8.929L1.604,357.994c-2.558,5.762-2.033,12.356,1.402,17.641 c3.436,5.285,9.251,8.439,15.555,8.439h14.763c0.556-2.386,1.339-4.737,2.355-7.028l41.23-92.878 C80.479,276.126,86.742,269.46,94.545,265.398z"></path> <path d="M160.519,231.186c1.367,0,2.305-0.369,2.953-0.964c-0.772-0.849-1.538-1.707-2.29-2.587 c-18.277-21.393-28.343-49.654-28.343-79.578c0-39.178,9.87-68.89,29.334-88.312c0.215-0.214,0.443-0.411,0.659-0.622 c-40.074,0.393-72.364,20.79-72.364,86.077C90.467,191.37,121.522,229.048,160.519,231.186z"></path> <path d="M333.05,148.057c0,29.924-10.066,58.186-28.344,79.578c-0.752,0.88-1.519,1.739-2.291,2.588 c0.601,0.734,1.787,0.963,2.952,0.963c38.995-2.136,70.052-39.815,70.052-85.985c0-65.288-32.291-85.685-72.363-86.077 c0.217,0.211,0.443,0.408,0.658,0.622C323.18,79.168,333.05,108.88,333.05,148.057z"></path> <path d="M232.945,243.712c45.134,0,81.724-42.827,81.724-95.654c0-73.26-36.589-95.654-81.724-95.654 c-45.137,0-81.726,22.395-81.726,95.654C151.219,200.885,187.81,243.712,232.945,243.712z"></path> <path d="M372.179,291.625c-1.887-4.252-5.198-7.774-9.323-9.923l-63.986-33.308c-1.411-0.735-3.12-0.592-4.391,0.367 c-18.097,13.689-39.375,20.926-61.533,20.926c-22.16,0-43.438-7.235-61.537-20.926c-1.271-0.961-2.979-1.104-4.391-0.367 l-63.985,33.308c-4.126,2.147-7.436,5.671-9.322,9.923l-41.23,92.88c-2.843,6.401-2.26,13.729,1.558,19.602 c3.818,5.872,10.279,9.378,17.284,9.378h323.247c7.004,0,13.466-3.506,17.282-9.378s4.399-13.2,1.56-19.602L372.179,291.625z"></path> </g> </g> </g>
                    </svg>
                </div>
                <div class="box-title"><?= t('User Groups') ?></div>
                <div class="box-data"><span class="data-value bold"><?= count($allGroups) ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                    </svg>
                </div>
                <div class="box-title"><?= t('User Timezones') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentTimezonesCount-1 ?></span></div>
            </div>
            <div class="box-wrapper back-red">
                <div class="box-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                        <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                        <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                    </svg>
                </div>
                <div class="box-title"><?= t('User Languages') ?></div>
                <div class="box-data"><span class="data-value bold"><?= $userDifferentLanguagesCount-1 ?></span></div>
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
                <span class="config-details-value"><?= @php_uname('s').' '.@php_uname('r') ?></span>
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
                    </svg>'. t('Detailed Configuration'), 'TechnicalSupportController', 'show', ['plugin' => 'KanboardSupport'], false, 'btn kb-support-btn', t('View Technical Information')) ?>
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
                <a href="https://docs.kanboard.org" class="channels-link" title="<?= t('Opens in a new window') ?>" rel="noopener noreferrer" target="_blank">
                    <div class="icon-wrapper wrapper-docs">
                        <svg version="1.0" width="20px" height="20px" class="kanboard-icon" fill="currentColor" viewBox="0 0 144 144" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0.000000,144.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path fill="#000000" d="M820 704 l0 -525 208 3 c204 3 208 3 260 31 91 48 135 132 135 257 -1 123 -46 212 -127 252 l-44 21 41 21 c56 28 86 84 94 174 8 99 -14 167 -71 220 -66 61 -116 72 -323 72 l-173 0 0 -526z m375 392 c50 -21 75 -68 75 -141 0 -72 -14 -102 -59 -132 -31 -21 -45 -23 -157 -23 l-124 0 0 155 0 155 115 0 c78 0 127 -5 150 -14z m33 -441 c52 -32 75 -90 71 -185 -4 -88 -21 -120 -78 -154 -27 -16 -54 -19 -159 -20 l-127 -1 -3 193 -2 194 132 -4 c111 -2 139 -6 166 -23z"/>
                                <path fill="#d40000" d="M90 705 l0 -515 90 0 90 0 2 201 3 201 139 -197 c77 -108 145 -199 151 -201 6 -3 59 -3 117 -2 l105 3 -188 265 c-104 146 -186 271 -184 278 3 7 76 113 163 235 87 122 162 228 166 235 6 9 -17 12 -98 12 l-105 0 -133 -186 -133 -186 -3 186 -2 186 -90 0 -90 0 0 -515z"/>
                            </g>
                        </svg>
                    </div><?= t('Documentation') ?>
                </a>
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
            <?= nl2br(file_get_contents(ROOT_DIR.DIRECTORY_SEPARATOR.'LICENSE')) ?>
        </details>
    </div>
</div>
