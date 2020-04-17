<?php

namespace TinyPixel\Blocks;

use TinyBlocks\Base\Block;

/**
 * Organize CTA.
 */
class OrganizeCTA extends Block
{
    /** block name */
    public $name = 'tinypixel/organize-cta';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'organize-cta/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-organize-cta';

    /**
     * Setup assets.
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/organize-cta/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/organize-cta/block.js'))
            ->setManifest(WP_PLUGIN_DIR.'/dream-defenders-blocks/dist/scripts/blocks/organize-cta/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
