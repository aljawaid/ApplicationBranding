<li <?= $this->app->checkMenuSelection('ApplicationMetadataController', 'show', 'ApplicationMetadata') ?>>
    <?= $this->url->link('Site Metadata', 'ApplicationMetadataController', 'show', ['plugin' => 'ApplicationMetadata']) ?>
</li>
