<?php

namespace TinyPixel\Blocks;

use \TinyBlocks\Base\Block;

/**
 * Horizontal Card
 *
 * @package    DreamDefenders
 */
class HorizontalCard extends Block
{
    /** @var string */
    public $name = "tinypixel/horizontal-card";

    /** @var string */
    public $view = "blocks";

    /** @var string */
    public $template = "horizontal-card/block.blade.php";

    /** @var string */
    public $className = "wp-block-tinypixel-horizontal-card";

    /**
     * Setup assets.
     */
    public function setupAssets(): void
    {
        $script = $this->makeAsset()
            ->setName("tinypixel/horizontal-card/js")
            ->setUrl(plugins_url("dream-defenders-blocks/dist/scripts/blocks/horizontal-card/block.js"))
            ->setManifest(WP_PLUGIN_DIR . "/dream-defenders-blocks/dist/scripts/blocks/horizontal-card/block.asset.php");

        $this->addEditorScript($script);
    }
}
