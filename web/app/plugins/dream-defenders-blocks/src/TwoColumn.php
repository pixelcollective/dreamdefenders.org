<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class TwoColumn extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/two-column/block.js')
                ->setManifest('scripts/blocks/two-column/block.asset.php')
        );
    }
}
