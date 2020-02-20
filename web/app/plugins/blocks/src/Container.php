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
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/container/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/manifest.asset.php');

        $this->addEditorScript($editorScript);
    }
}
