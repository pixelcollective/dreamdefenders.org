<?php

namespace TinyPixel\Blocks;

use TinyBlocks\Base\Block;

/**
 * Generic Container.
 */
class Container extends Block
{
    /** block name */
    public $name = 'tinypixel/container';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'container/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-container';

    /**
     * Setup assets.
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/container/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/container/block.js'))
            ->setManifest(WP_PLUGIN_DIR.'/dream-defenders-blocks/dist/scripts/blocks/container/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
