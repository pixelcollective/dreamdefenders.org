<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Squadd
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class Squadd extends Block
{
    /** block name */
    public $name = 'tinypixel/squadd';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'squadd/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-squadd';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/squadd/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/squadd/block.js'))
            ->setManifest(WP_PLUGIN_DIR . '/dream-defenders-blocks/dist/scripts/blocks/squadd/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
