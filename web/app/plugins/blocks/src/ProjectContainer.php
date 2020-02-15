<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Post Container
 *
 * @package    DreamDefenders
 * @subpackage Blocks
 */
class ProjectContainer extends Block
{
    /** block name */
    public $name = 'tinypixel/project-container';

    /** view instance */
    public $view = 'blocks';

    /** template file */
    public $template = 'project-container/block.blade.php';

    /** classnames */
    public $className = 'wp-block-tinypixel-project-container';

    /**
     * Setup assets
     */
    public function setupAssets(): void
    {
        $editorScript = $this->makeAsset()
            ->setName('tinypixel/project-container/js')
            ->setUrl(plugins_url() . '/blocks/dist/scripts/project-container/block.js')
            ->setManifest(WP_PLUGIN_DIR . '/blocks/dist/scripts/project-container/block.asset.php');

        $this->addEditorScript($editorScript);
    }
}
