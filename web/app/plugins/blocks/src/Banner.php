<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Banner
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class Banner extends Block
{
    /** block name */
    public $name = 'tinypixel/banner';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'banner/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-banner';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/banner/js')
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/banner/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/banner/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
