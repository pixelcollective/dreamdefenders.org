<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class EveryAction extends Block
{
    /**
     * Modify the block.
     */
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/every-action/block.js')
                ->setManifest('scripts/blocks/every-action/block.asset.php')
            );
    }
}
