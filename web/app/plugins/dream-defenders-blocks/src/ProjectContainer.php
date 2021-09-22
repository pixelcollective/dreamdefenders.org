<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class ProjectContainer extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/project-container/block.js')
                ->setManifest('scripts/blocks/project-container/block.asset.php')
        );
    }
}
