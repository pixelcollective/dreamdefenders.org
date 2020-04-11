<?php

namespace TinyPixel\Blocks;

use TinyBlocks\Base\Block;

/**
 * Generic Container.
 */
class EveryAction extends Block
{
    /** block name */
    public $name = 'tinypixel/every-action';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'every-action/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-every-action';

    /**
     * Setup assets.
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/every-action/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/every-action/block.js'))
            ->setManifest(WP_PLUGIN_DIR.'/dream-defenders-blocks/dist/scripts/blocks/every-action/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
