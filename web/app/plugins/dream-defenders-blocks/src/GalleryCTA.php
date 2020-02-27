<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Gallery CTA
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class GalleryCTA extends Block
{
    /** block name */
    public $name = 'tinypixel/gallery-cta';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'gallery-cta/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-gallery-cta';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/gallery-cta/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/gallery-cta/block.js'))
            ->setManifest(WP_PLUGIN_DIR . '/dream-defenders-blocks/dist/scripts/blocks/gallery-cta/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
