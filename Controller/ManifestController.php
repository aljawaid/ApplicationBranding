<?php

/**
 * Serve the site-wide home-screen manifest without exposing private settings.
 * Related test: tests/web_manifest_contract.php.
 */

namespace Kanboard\Plugin\ApplicationBranding\Controller;

use Kanboard\Controller\BaseController;

class ManifestController extends BaseController
{
    public function show()
    {
        $manifest = $this->helper->applicationBrandingHelper->getWebManifest();
        if ($manifest === array()) {
            $this->response->status(404);
            return;
        }

        $this->response
            ->withContentType('application/manifest+json; charset=utf-8')
            ->withoutCache()
            ->withHeader('Cache-Control', 'no-store')
            ->withSecurityHeaders()
            ->withBody(json_encode($manifest, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR))
            ->send();
    }
}
