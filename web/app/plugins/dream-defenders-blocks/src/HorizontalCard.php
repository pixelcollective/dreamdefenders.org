<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Horizontal Card
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class HorizontalCard extends Block
{
    /** block name */
    public $name = 'tinypixel/horizontal-card';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'horizontal-card/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-horizontal-card';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/horizontal-card/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/horizontal-card/block.js'))
            ->setManifest(WP_PLUGIN_DIR . '/dream-defenders-blocks/dist/scripts/blocks/horizontal-card/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
