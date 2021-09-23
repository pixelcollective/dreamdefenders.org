<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class PostContainer extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/post-container/block.js')
                ->setManifest('scripts/blocks/post-container/block.asset.php')
        );
    }
}
