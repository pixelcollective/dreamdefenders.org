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
    public $name = 'tinypixel/twocolumn';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'twocolumn/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-twocolumn';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorStyle = $this->makeAsset()
            ->setName('tinypixel/twocolumn/css')
            ->setUrl(plugins_url() . '/blocks/dist/styles/editor.css');

        $editorScript = $this->makeAsset()
            ->setName('tinypixel/twocolumn/js')
            ->setUrl(plugins_url() . '/blocks/dist/scripts/editor.js')
            ->setManifest(WP_PLUGIN_DIR . '/blocks/dist/scripts/editor.asset.php');

        $publicStyle = $this->makeAsset()
            ->setName('tinypixel/twocolumn/public/css')
            ->setUrl(plugins_url() . '/blocks/dist/styles/public.css');

        $this->addEditorStyle($editorStyle);
        $this->addEditorScript($editorScript);
        $this->addPublicStyle($publicStyle);
    }
}
