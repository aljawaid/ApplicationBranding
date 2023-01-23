<li <?= $this->app->checkMenuSelection('ApplicationBrandingController', 'show', 'ApplicationBranding') ?>>
    <?= $this->url->link('Site Metadata', 'ApplicationBrandingController', 'show', ['plugin' => 'ApplicationBranding']) ?>
</li>
