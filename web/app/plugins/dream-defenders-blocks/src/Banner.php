<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class Banner extends Block
{
    /**
     * Modify the block.
     */
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/banner/block.js')
                ->setManifest('scripts/blocks/banner/block.asset.php')
        );
    }
}
