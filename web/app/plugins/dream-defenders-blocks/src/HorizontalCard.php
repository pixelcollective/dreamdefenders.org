<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class HorizontalCard extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/horizontal-card/block.js')
                ->setManifest('scripts/blocks/horizontal-card/block.asset.php')
        );
    }
}
