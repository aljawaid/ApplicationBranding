<div id="ManualEditsPage" class="metadata-page-header">
    <h2 class="">
        <span class="manual-edits-icon"></span> <?= t('Manual Edits') ?>
    </h2>
    <p class="edits-page-desc">
        <?= t('To gain complete control over rebranding this application, some manual changes are required which are out of scope for Kanboard plugins. Following the simple changes below ensures your Kanboard installation is consistently named to your preferences.') ?>
    </p>
    <section class="m-edit-section">
        <h3 class="m-edit-title">
            <?= t('Changing the Application Name in Automated Emails') ?> <span class="lead">- <?= t('Optional') ?></span>
        </h3>
        <p class="m-edit-desc">
            <?= t('Automated emails received via cronjob can be adjusted to your preferred application name by completing the following:') ?>
        </p>
        <h4 class="">
            <?= t('Change the application name') ?> <span class="lead">- <?= t('Optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Core/Mail/Client.php#L71" class="" title="<?= t('Opens in a new window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('Go to line N° %s in %s', '71', '<kbd>/app/Core/Mail/Client.php</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i>
            <br>
            <code class="edit-code">$author = 'Kanboard';</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i>
            <br>
            <code class="edit-code">$author = 'My Workspace';</code>
        </div>
        <h4 class="">
            <?= t('Change the application name in the translation string when a username is used') ?> <span class="lead">- <?= t('Optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/app/Locale" class="" title="<?= t('Opens in a new window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('Go to the translation file in the relevant language folder inside %s', '<kbd>/app/Locale/</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i>
            <br>
            <code class="edit-code">'%s via Kanboard'</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i>
            <br>
            <code class="edit-code">'%s via My Workspace'</code>
        </div>
    </section>
    <section class="m-edit-section">
        <h3 class="m-edit-title">
            <?= t('Changing the Application Name in the 2FA Security Page') ?> <span class="lead">- Optional</span>
        </h3>
        <p class="m-edit-desc">
            <?= t('If your application uses, or any of your users have two-factor security enabled, complete the changes below. Your new application name will show in mobile authenticator apps which users use to login.') ?>
        </p>
        <h4 class="">
            <?= t('Change the application name') ?> <span class="lead">- <?= t('Optional') ?></span>
        </h4>
        <div class="m-edit-codeblock">
            <a href="https://github.com/kanboard/kanboard/blob/main/config.default.php#L274" class="" title="<?= t('Opens in a new window') ?>" target="_blank" rel="noopener noreferrer">
                <span class="chev-link-icon"></span><?= e('Go to line N° %s in %s', '274', '<kbd>/config.php</kbd>') ?>
            </a>
            <span class="code-icon-red"></span> <i class=""><?= t('Change from') ?></i>
            <br>
            <code class="edit-code">define('TOTP_ISSUER', 'Kanboard');</code>
            <span class="code-icon-green"></span> <i class=""><?= t('Change to') ?></i>
            <br>
            <code class="edit-code">define('TOTP_ISSUER', 'My Workspace');</code>
        </div>
    </section>
</div>
