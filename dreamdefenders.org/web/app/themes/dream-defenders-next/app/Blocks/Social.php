<?php

namespace App\Blocks;

use \TinyPixel\BlockCompose\Composer;
use \TinyPixel\BlockCompose\Attribute;
use \TinyPixel\BlockCompose\Traits\Compose;

class Social extends Composer
{
    public $name = 'social'; // block name
    public $view = 'blocks.social'; // specify view
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
        ];
    }

    /**
     * Serve data to view
     *
     * @return array associative
     */
    public function with($data)
    {
        return $data;
    }

    /**
     * Manipulate source block markup
     */
    public function withContent($content)
    {
        return $content;
    }

    /**
     * Manipulate source block data
     */
    public function withData($block, $source)
    {
        return $block;
    }

    use Compose;
}
