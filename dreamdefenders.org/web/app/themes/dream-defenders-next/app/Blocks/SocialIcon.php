<?php

namespace App\Blocks;

use \TinyPixel\BlockCompose\Composer;
use \TinyPixel\BlockCompose\Attribute;
use \TinyPixel\BlockCompose\Traits\Compose;

class SocialIcon extends Composer
{
    public $name = 'social-icon'; // block name
    public $view = 'blocks.social-icon'; // specify view
    public $editor_script = 'tinypixel/blocks'; // registered editor script

    /**
     * Set block attributes
     *
     * @return array associative array of attributes
     * @todo #todo link to wordpress docs
     */
    public function attributes()
    {
        return [
            new Attribute('network', 'string'),
            new Attribute('url', 'url'),
        ];
    }

    use Compose;
}
