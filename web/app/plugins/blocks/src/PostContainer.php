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
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/post-container/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/post-container/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
