<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class FreedomPaper extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
            ->setUrl('scripts/blocks/freedom-paper/block.js')
            ->setManifest('scripts/blocks/freedom-paper/block.asset.php')
        );
    }
}
