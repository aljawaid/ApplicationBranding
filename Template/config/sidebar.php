<li <?= $this->app->checkMenuSelection('ApplicationMetadataController', 'show', 'ApplicationMeta') ?>>
    <?= $this->url->link('Application Metadata', 'ApplicationMetadataController', 'show', ['plugin' => 'ApplicationMetadata']) ?>
</li>
