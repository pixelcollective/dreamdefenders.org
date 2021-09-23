<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class Container extends Block
{
    /**
     * Modify the block.
     */
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/container/block.js')
        );
    }
}
