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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/><path d="M8.646 6.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 9 8.646 7.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 9l1.647-1.646a.5.5 0 0 0 0-.708z"/>
            </svg> <i class=""><?= t('Change from') ?></i><br>
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Core/Mail/Client.php#L71" class="" title="Opens in a new window" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="#000000" class="bi bi-chevron-right chev-link" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg><?= t('Line') ?> 71
            </a> <?= t('in') ?> <kbd>/app/Core/Mail/Client.php</kbd><br>
            <code class="edit-code">$author = 'Kanboard';</code>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708z"/>
            </svg> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">$author = 'My Workspace';</code>
        </div>
        <h4 class=""><?= t('Change the application name in the translation string when a username is used') ?> <span class="lead">- <?= t('Optional') ?></span></h4>
        <div class="m-edit-codeblock">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/><path d="M8.646 6.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 9 8.646 7.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 9l1.647-1.646a.5.5 0 0 0 0-.708z"/>
            </svg> <i class=""><?= t('Change from') ?></i><br>
            <code class="edit-code">'%s via Kanboard'</code>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708z"/>
            </svg> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">'%s via My Workspace'</code>
        </div>
    </section>
    <section class="m-edit-section">
        <h3 class="m-edit-title"><?= t('Changing the Application Name in the 2FA Security Page') ?> <span class="lead">- Optional</span></h3>
        <p class="m-edit-desc"><?= t('If your application uses, or any of your users have two-factor security enabled, complete the changes below. Your new application name will show in mobile authenticator apps which users use to login.') ?></p>
        <h4 class=""><?= t('Change the application name') ?> <span class="lead">- <?= t('Optional') ?></span></h4>
        <div class="m-edit-codeblock">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/><path d="M8.646 6.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 9 8.646 7.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 9l1.647-1.646a.5.5 0 0 0 0-.708z"/>
            </svg> <i class=""><?= t('Change from') ?></i><br>
            <a href="https://github.com/kanboard/kanboard/blob/main/config.default.php#L264-L271" class="" title="Opens in a new window" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="#000000" class="bi bi-chevron-right chev-link" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg><?= t('Line') ?> 264-271
            </a> <?= t('in') ?> <kbd>/config.php</kbd><br>
            <code class="edit-code">define('TOTP_ISSUER', 'Kanboard');</code>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708z"/>
            </svg> <i class=""><?= t('Change to') ?></i><br>
            <code class="edit-code">define('TOTP_ISSUER', 'My Workspace');</code>
        </div>
    </section>
</div>
