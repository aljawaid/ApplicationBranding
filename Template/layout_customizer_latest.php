<?php
// Render the Customizer-compatible branded layout; see tests/web_manifest_contract.php.
?><!DOCTYPE html>
<html lang="<?= $this->app->jsLang() ?>"<?= $this->app->isRtlLanguage() ? ' dir="rtl"' : '' ?>>
    <head>
        <?php // See tests/template_compatibility_contract.php for the Kanboard 1.2.54 layout contract. ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="robots" content="noindex,nofollow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="referrer" content="no-referrer">

        <?php if (isset($board_public_refresh_interval)): ?>
            <meta http-equiv="refresh" content="<?= $board_public_refresh_interval ?>">
        <?php endif ?>

        <?= $this->asset->colorCss() ?>
        <?= $this->asset->css('assets/css/vendor.min.css') ?>
        <?php if (!isset($not_editable)): ?>
            <?= $this->asset->css('assets/css/' . $this->user->getTheme() . '.min.css') ?>
        <?php else: ?>
            <?= $this->asset->css('assets/css/light.min.css') ?>
        <?php endif ?>
        <?= $this->asset->css('assets/css/print.min.css', true, 'print') ?>
        <?= $this->asset->customCss() ?>

        <?php if (!isset($not_editable)): ?>
            <?= $this->asset->js('assets/js/vendor.min.js') ?>
            <?= $this->asset->js('assets/js/app.min.js') ?>
        <?php endif ?>

        <?= $this->hook->asset('css', 'template:layout:css') ?>
        <?= $this->hook->asset('js', 'template:layout:js') ?>

        <?php if (null !== $this->task->customizerFileModel->getByType(2)): ?>
            <link rel="icon" type="image/png" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="60x60" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="128x128" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="192x192" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <link rel="icon" type="image/png" sizes="196x196" href="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="msapplication-TileColor" content="#2D89EF">
            <meta name="msapplication-TileImage" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="msapplication-square70x70logo" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="msapplication-square150x150logo" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="msapplication-wide310x150logo" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="msapplication-square310x310logo" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
            <meta name="theme-color" content="#FFFFFF">
        <?php else: ?>
            <link rel="icon" type="image/x-icon" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon.ico">
            <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-72x72-ipad.png">
            <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-114x114-retina.png">
            <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-144x144-ipad-retina.png">
            <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/apple-icon-180x180.png">
            <link rel="icon" type="image/png" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png">
            <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon-16x16.png">
            <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="128x128" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon-128x128.png">
            <link rel="icon" type="image/png" sizes="192x192" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="196x196" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/favicon-196x196.png">
            <meta name="msapplication-TileColor" content="#2D89EF">
            <meta name="msapplication-TileImage" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/mstile-144x144.png">
            <meta name="msapplication-square70x70logo" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/mstile-70x70.png">
            <meta name="msapplication-square150x150logo" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/mstile-150x150.png">
            <meta name="msapplication-wide310x150logo" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/mstile-310x150.png">
            <meta name="msapplication-square310x310logo" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/mstile-310x310.png">
            <meta name="msapplication-config" content="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/browserconfig.xml">
            <meta name="theme-color" content="#FFFFFF">
            <link rel="mask-icon" href="<?= $this->url->dir() ?>plugins/ApplicationBranding/Assets/img/favicon/safari-pinned-tab.svg" color="#5BBAD5">
        <?php endif ?>
        <?php if ($this->helper->applicationBrandingHelper->getWebManifest() !== array()): ?>
            <link rel="manifest" href="<?= $this->url->href('ManifestController', 'show', array('plugin' => 'ApplicationBranding')) ?>">
        <?php endif ?>

        <?php // See tests/output_safety_contract.php for canonical URL and metadata escaping. ?>
        <?php
            $incomingController = $this->app->getRouterController();
            $outgoingAction = $this->app->getRouterAction();
            $applicationName = $this->helper->applicationBrandingHelper->getApplicationName();
            $canonicalUrl = $this->helper->applicationBrandingHelper->getCanonicalUrl();
        ?>

        <?php if ($canonicalUrl !== ''): ?>
            <meta property="og:url" content="<?= $this->text->e($canonicalUrl) ?>">
        <?php endif ?>
        <?php if (null !== $this->task->customizerFileModel->getByType(2)): ?>
            <!-- og:image must be min 300x300px with 'https' and absolute url to png file -->
            <meta property="og:image" content="<?= $this->url->href('CustomizerFileController', 'image', array('plugin' => 'customizer', 'file_id' => $this->task->customizerFileModel->getIdByType(2))) ?>">
        <?php else: ?>
            <?php // og:image must be min 300x300px with 'https' and absolute url to png file ?>
            <meta property="og:image" content="<?= $this->text->e(rtrim($this->url->base(), '/')) ?>/plugins/ApplicationBranding/Assets/img/workspace-icon-500x500.png">
        <?php endif ?>
        <meta property="og:type" content="website">
        <meta property="og:locale" content="<?= $this->text->e($this->app->jsLang()) ?>">
        <meta property="og:locale:alternate" content="en_GB">
        <meta property="og:locale:alternate" content="en_US">

        <?php if (($incomingController == 'PasswordResetController') && ($outgoingAction == 'create')): ?>
            <meta name="description" content="<?= t('application_branding.reset_description') ?>">
            <meta property="og:description" content="<?= t('application_branding.reset_description') ?>">
        <?php else: ?>
            <meta name="description" content="<?= t('application_branding.site_description') ?>">
            <meta property="og:description" content="<?= t('application_branding.site_description') ?>">
        <?php endif ?>

        <?php if (isset($page_title)): ?>
            <meta property="og:title" content="<?= $this->text->e($page_title) ?> | <?= $this->text->e($applicationName) ?>">
        <?php elseif (isset($title)): ?>
            <meta property="og:title" content="<?= $this->text->e($title) ?> | <?= $this->text->e($applicationName) ?>">
        <?php elseif (($incomingController == 'PasswordResetController') && ($outgoingAction == 'create')): ?>
            <meta property="og:title" content="<?= t('application_branding.reset_password') ?> | <?= $this->text->e($applicationName) ?>">
        <?php else: ?>
            <meta property="og:title" content="<?= $this->text->e($applicationName) ?>">
        <?php endif ?>

        <title>
            <?php if (isset($page_title)): ?>
                <?= $this->text->e($page_title) ?>
                | <?= $this->text->e($applicationName) ?>

            <?php elseif (isset($title)): ?>
                <?= $this->text->e($title) ?>
                | <?= $this->text->e($applicationName) ?>

            <?php elseif (($incomingController == 'PasswordResetController') && ($outgoingAction == 'create')): ?>
                <?= t('application_branding.reset_password') ?> | <?= $this->text->e($applicationName) ?>

            <?php else: ?>
                <?= $this->text->e($applicationName) ?>

            <?php endif ?>
        </title>

        <?= $this->hook->render('template:layout:head') ?>

    </head>
    <body class="<?= $this->text->e($this->helper->applicationBrandingHelper->getAuthenticationBackgroundClass($incomingController)) ?>"
          data-status-url="<?= $this->url->href('UserAjaxController', 'status') ?>"
          data-login-url="<?= $this->url->href('AuthController', 'login') ?>"
          data-keyboard-shortcut-url="<?= $this->url->href('DocumentationController', 'shortcuts') ?>"
          data-timezone="<?= $this->app->getTimezone() ?>"
          data-js-date-format="<?= $this->app->getJsDateFormat() ?>"
          data-js-time-format="<?= $this->app->getJsTimeFormat() ?>"
    >
        <?php if (isset($no_layout) && $no_layout): ?>
            <?= $this->app->flashMessage() ?>
            <?= $content_for_layout ?>
        <?php else: ?>
            <?= $this->hook->render('template:layout:top') ?>
            <?= $this->render('header', array(
                'title' => $title,
                'description' => isset($description) ? $description : '',
                'board_selector' => isset($board_selector) ? $board_selector : array(),
                'project' => isset($project) ? $project : array(),
            )) ?>
            <section class="page">
                <?= $this->app->flashMessage() ?>
                <?= $content_for_layout ?>
            </section>
            <?= $this->hook->render('template:layout:bottom') ?>
        <?php endif ?>
    </body>
</html>
