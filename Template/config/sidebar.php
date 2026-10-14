<li <?= $this->app->checkMenuSelection('ApplicationBrandingController', 'show', 'ApplicationBranding') ?>>
    <?= $this->url->link(t('application_branding.site_metadata'), 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding']) ?>
</li>
