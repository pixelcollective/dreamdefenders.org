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
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/horizontal-card/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/manifest.asset.php');

        $this->addEditorScript($editorScript);
    }
}
