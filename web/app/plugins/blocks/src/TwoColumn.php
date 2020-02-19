<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * TwoColumn
 *
 * @package    TinyBlocks
 * @subpackage Demo
 */
class TwoColumn extends Block
{
    /** block name */
    public $name = 'tinypixel/two-column';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'two-column/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-two-column';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorStyle = $this->makeAsset()
            ->setName('tinypixel/twocolumn/css')
            ->setUrl(get_template_directory_uri() . '/dist/styles/editor.css');

        $editorScript = $this->makeAsset()
            ->setName('tinypixel/twocolumn/js')
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/two-column/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/two-column/block.asset.php');

        $this->addEditorStyle($editorStyle);
        $this->addEditorScript($editorScript);
    }
}
