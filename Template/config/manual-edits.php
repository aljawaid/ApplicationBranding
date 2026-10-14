<div id="ManualEditsPage" class="metadata-page-header">
    <h2 class="">
        <span class="manual-edits-icon"></span> <?= t('application_branding.manual_edits') ?>
    </h2>
    <p class="edits-page-desc">
        <?= t('application_branding.manual_edits_intro') ?>
    </p>
    <section class="m-edit-section">
        <h3 class="m-edit-title">
            <?= t('application_branding.automated_email_heading') ?> <span class="lead">- <?= t('application_branding.optional') ?></span>
        </h3>
        <p class="m-edit-desc">
            <?= t('application_branding.automated_email_help') ?>
        </p>
        <h4 class="">
            <?= t('application_branding.change_application_name') ?> <span class="lead">- <?= t('application_branding.optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Core/Mail/Client.php#L71" class="" title="<?= t('application_branding.opens_new_window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('application_branding.go_to_line', '71', '<kbd>/app/Core/Mail/Client.php</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('application_branding.change_from') ?></i>
            <br>
            <code class="edit-code">$author = 'Kanboard';</code>
            <span class="code-icon-green"></span> <i class=""><?= t('application_branding.change_to') ?></i>
            <br>
            <code class="edit-code">$author = 'My Workspace';</code>
        </div>
        <h4 class="">
            <?= t('application_branding.change_translation_string') ?> <span class="lead">- <?= t('application_branding.optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Locale" class="" title="<?= t('application_branding.opens_new_window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('application_branding.go_to_translation_file', '<kbd>/app/Locale/</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('application_branding.change_from') ?></i>
            <br>
            <code class="edit-code">'%s via Kanboard'</code>
            <span class="code-icon-green"></span> <i class=""><?= t('application_branding.change_to') ?></i>
            <br>
            <code class="edit-code">'%s via My Workspace'</code>
        </div>
    </section>
    <section class="m-edit-section">
        <h3 class="m-edit-title">
            <?= t('application_branding.two_factor_heading') ?> <span class="lead">- <?= t('application_branding.optional') ?></span>
        </h3>
        <p class="m-edit-desc">
            <?= t('application_branding.two_factor_help') ?>
        </p>
        <h4 class="">
            <?= t('application_branding.change_application_name') ?> <span class="lead">- <?= t('application_branding.optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/config.default.php#L274" class="" title="<?= t('application_branding.opens_new_window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('application_branding.go_to_line', '274', '<kbd>/config.php</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('application_branding.change_from') ?></i>
            <br>
            <code class="edit-code">define('TOTP_ISSUER', 'Kanboard');</code>
            <span class="code-icon-green"></span> <i class=""><?= t('application_branding.change_to') ?></i>
            <br>
            <code class="edit-code">define('TOTP_ISSUER', 'My Workspace');</code>
        </div>
    </section>
</div>
