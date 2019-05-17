<?php

namespace App\Blocks;

use \TinyPixel\BlockCompose\Composer;
use \TinyPixel\BlockCompose\Attribute;
use \TinyPixel\BlockCompose\Traits\Compose;

class Banner extends Composer
{
    public $name = 'banner';
    public $view = 'blocks.banner';
    public $editor_script = 'tinypixel/blocks';

    /**
     * Set block attributes
     *
     * @return array associative array of attributes
     * @todo #todo link to wordpress docs
     **/
    public function attributes()
    {
        return [
            new Attribute('heading', 'string'),
            new Attribute('subheading', 'string'),
            new Attribute('mediaID', 'number'),
            new Attribute('mediaURL', 'string'),
        ];
    }

    use Compose;
}
