<?php

namespace TinyPixel\Blocks;

use TinyBlocks\Base\Block;

/**
 * Form.
 */
class Form extends Block
{
    /** block name */
    public $name = 'tinypixel/form';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'form/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-form';

    /**
     * Setup assets.
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/form/js')
            ->setUrl(plugins_url('dream-defenders-blocks/dist/scripts/blocks/form/block.js'))
            ->setManifest(WP_PLUGIN_DIR.'/dream-defenders-blocks/dist/scripts/blocks/form/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
