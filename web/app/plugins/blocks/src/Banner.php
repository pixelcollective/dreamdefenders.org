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
            ->setUrl(plugins_url() . '/blocks/dist/scripts/banner/block.js')
            ->setManifest(WP_PLUGIN_DIR . '/blocks/dist/scripts/banner/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
