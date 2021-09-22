<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class GalleryCTA extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/gallery-cta/block.js')
                ->setManifest('scripts/blocks/gallery-cta/block.asset.php')
        );
    }
}
