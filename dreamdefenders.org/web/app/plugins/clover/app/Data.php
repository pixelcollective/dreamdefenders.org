<?php

namespace TinyPixel\App;

use \TinyPixel\Plugin as Plugin;
use function create_activist_store;

class Data extends Plugin
{
    public function __construct()
    {
        \TinyPixel\App\create_activist_store();
    }
}
