<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Freedom Paper
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class FreedomPaper extends Block
{
    /** block name */
    public $name = 'tinypixel/freedom-paper';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'freedom-paper/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-freedom-paper';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/freedom-paper/js')
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/freedom-paper/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/freedom-paper/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
