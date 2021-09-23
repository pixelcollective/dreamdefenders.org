<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class Squadd extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/squadd/block.js')
                ->setManifest('scripts/blocks/squadd/block.asset.php')
        );
    }
}
