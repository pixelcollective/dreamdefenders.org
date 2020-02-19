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
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/squadd/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/squadd/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
