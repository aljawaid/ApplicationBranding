<h1 class="header-title">
    <span class="logo">
        <?= $this->url->link('<img src="' . $this->url->dir() . 'plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png" width="40px" style="vertical-align: middle;"  alt="' . t('Workspace logo') . '">', 'DashboardController', 'show', array(), false, '', t('Dashboard')) ?>
    </span>
    <span class="title">
        <?php if (!empty($project) && !empty($task)): ?>
            <?= $this->url->link($this->text->e($project['name']), 'BoardViewController', 'show', array('project_id' => $project['id'])) ?>
        <?php else: ?>
            <?= $this->text->e($title) ?>
            <?php if (!empty($project) && $project['task_limit'] && array_key_exists('nb_active_tasks', $project)): ?>
              (<span><?= intval($project['nb_active_tasks']) ?></span> / <span title="<?= t('Task Limit') ?>"><span class="ui-helper-hidden-accessible"><?= t('Task Limit') ?> </span><?= $this->text->e($project['task_limit']) ?></span>)
            <?php endif ?>
        <?php endif ?>
    </span>
    <?php if (!empty($description)): ?>
        <?= $this->app->tooltipHTML($description) ?>
    <?php endif ?>
</h1>
