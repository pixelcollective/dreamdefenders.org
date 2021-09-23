<?php

namespace DreamDefenders\Blocks;

use TinyPixel\Blocks\Block;

class OrganizeCTA extends Block
{
    public function build(): void
    {
        $this->addEditorScript(
            $this->makeAsset('editor/js')
                ->setUrl('scripts/blocks/organize-cta/block.js')
                ->setManifest('scripts/blocks/organize-cta/block.asset.php')
        );
    }
}
