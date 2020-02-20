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
            ->setUrl(get_template_directory_uri() . '/dist/scripts/blocks/project-container/block.js')
            ->setManifest(get_template_directory() . '/dist/scripts/blocks/manifest.asset.php');

        $this->addEditorScript($editorScript);
    }
}
