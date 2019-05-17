<?php

namespace App\Blocks;

use \TinyPixel\BlockCompose\Composer;
use \TinyPixel\BlockCompose\Attribute;
use \TinyPixel\BlockCompose\Traits\Compose;

class Section extends Composer
{
    public $name = 'section'; // block name
    public $editor_script = 'tinypixel/blocks'; // registered editor script

    // (optional) override view
    public $view = 'blocks.section';

    public function attributes()
    {
        return [
            new Attribute('mediaID', 'number'),
            new Attribute('mediaURL', 'string'),
        ];
    }

    use Compose;
}
