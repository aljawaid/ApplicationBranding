<div id="ManualEditsPage" class="metadata-page-header">
    <h2 class="">
        <span class="manual-edits-icon"></span> <?= t('Manual Edits') ?>
    </h2>
    <p class="edits-page-desc"><?= t('To gain complete control over rebranding this application, some manual changes are required which are out of scope for Kanboard plugins. Following the simple changes below ensures your Kanboard installation is consistently named to your preferences.') ?></p>
    <section class="m-edit-section">
        <h3 class="m-edit-title"><?= t('Changing the Application Name in Automated Emails') ?> <span class="lead">- <?= t('Optional') ?></span></h3>
        <p class="m-edit-desc"><?= t('Automated emails received via cronjob can be adjusted to your preferred application name by completing the following:') ?></p>
        <h4 class=""><?= t('Change the application name') ?> <span class="lead">- <?= t('Optional') ?></span></h4>
        <div class="m-edit-codeblock">
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i><br>
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Core/Mail/Client.php#L71" class="" title="Opens in a new window" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="#000000" class="bi bi-chevron-right chev-link" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg><?= t('Line') ?> 71
            </a> <?= t('in') ?> <kbd>/app/Core/Mail/Client.php</kbd><br>
            <code class="edit-code">$author = 'Kanboard';</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">$author = 'My Workspace';</code>
        </div>
        <h4 class=""><?= t('Change the application name in the translation string when a username is used') ?> <span class="lead">- <?= t('Optional') ?></span></h4>
        <div class="m-edit-codeblock">
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i><br>
            <code class="edit-code">'%s via Kanboard'</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">'%s via My Workspace'</code>
        </div>
    </section>
    <section class="m-edit-section">
        <h3 class="m-edit-title"><?= t('Changing the Application Name in the 2FA Security Page') ?> <span class="lead">- Optional</span></h3>
        <p class="m-edit-desc"><?= t('If your application uses, or any of your users have two-factor security enabled, complete the changes below. Your new application name will show in mobile authenticator apps which users use to login.') ?></p>
        <h4 class=""><?= t('Change the application name') ?> <span class="lead">- <?= t('Optional') ?></span></h4>
        <div class="m-edit-codeblock">
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i><br>
            <a href="https://github.com/kanboard/kanboard/blob/main/config.default.php#L264-L271" class="" title="Opens in a new window" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="#000000" class="bi bi-chevron-right chev-link" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg><?= t('Line') ?> 264-271
            </a> <?= t('in') ?> <kbd>/config.php</kbd><br>
            <code class="edit-code">define('TOTP_ISSUER', 'Kanboard');</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">define('TOTP_ISSUER', 'My Workspace');</code>
        </div>
    </section>
</div>
