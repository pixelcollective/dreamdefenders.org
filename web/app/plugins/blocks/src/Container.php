<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Generic Container
 *
 * @package    DreamDefenders
 * @subpackage Blocks
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
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/container/js')
            ->setUrl(plugins_url() . '/blocks/dist/scripts/container/block.js')
            ->setManifest(WP_PLUGIN_DIR . '/blocks/dist/scripts/container/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
