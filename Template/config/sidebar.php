<li <?= $this->app->checkMenuSelection('ApplicationMetadataController', 'show', 'ApplicationMeta') ?>>
    <?= $this->url->link('Site Metadata', 'ApplicationMetadataController', 'show', ['plugin' => 'ApplicationMetadata']) ?>
</li>
