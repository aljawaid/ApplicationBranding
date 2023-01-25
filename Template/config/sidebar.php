<li <?= $this->app->checkMenuSelection('ApplicationBrandingController', 'show', 'ApplicationBranding') ?>>
    <?= $this->url->link(t('Site Metadata'), 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding']) ?>
</li>
