<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Post Container
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class PostContainer extends Block
{
    /** block name */
    public $name = 'tinypixel/post-container';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'post-container/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-post-container';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/post-container/js')
            ->setUrl(plugins_url() . '/blocks/dist/scripts/post-container.js')
            ->setManifest(WP_PLUGIN_DIR . '/blocks/dist/scripts/post-container.asset.php');

        $this->addEditorScript($editorScript);
    }
}
