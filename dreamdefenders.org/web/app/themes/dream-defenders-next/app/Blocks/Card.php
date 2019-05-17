<?php

namespace App\Blocks;

use \TinyPixel\BlockCompose\Composer;
use \TinyPixel\BlockCompose\Attribute;
use \TinyPixel\BlockCompose\Traits\Compose;

class Card extends Composer
{
    // block details
    public $name = 'card';
    public $editor_script = 'tinypixel/blocks';

    public $view = 'blocks.card';

    /**
     * Block attributes
     */
    public function attributes()
    {
        return [
            new Attribute('heading', 'string'),
            new Attribute('copy', 'string'),
            new Attribute('mediaURL', 'string'),
            new Attribute('mediaID', 'number'),
        ];
    }

    use Compose;
}
