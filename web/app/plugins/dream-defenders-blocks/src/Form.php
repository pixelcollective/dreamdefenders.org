<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class Form extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/form/block.js')
                ->setManifest('scripts/blocks/form/block.asset.php')
        );
    }
}
