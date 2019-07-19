<?php

use \TinyPixel\Support\Directives\DirectivesRepository;

return [

    /*
    |---------------------------------------------------------------------
    | SVG
    |---------------------------------------------------------------------
    */

    'svg' => function ($expression) {
        $basePath = DirectivesRepository::root();
        $expression = DirectivesRepository::stripQuotes($expression);
        $svg = "{$basePath}/resources/assets/svg/{$expression}.svg";

        return file_get_contents($svg);
    },

    /*
    |---------------------------------------------------------------------
    | Font Awesome Solid
    |---------------------------------------------------------------------
    */

    'solid' => function ($expression) {
        $basePath = DirectivesRepository::root();
        $expression = DirectivesRepository::stripQuotes($expression);
        $fas = "{$basePath}/resources/assets/svg/fa/solid/{$expression}.svg";

        return file_get_contents($fas);
    },

    /*
    |---------------------------------------------------------------------
    | Font Awesome
    |---------------------------------------------------------------------
    */

    'awesome' => function ($expression) {
        $basePath = DirectivesRepository::root();
        $expression = DirectivesRepository::stripQuotes($expression);
        $svg = "{$basePath}/resources/assets/svg/fa/regular/{$expression}.svg";

        return file_get_contents($svg);
    },

    /*
    |---------------------------------------------------------------------
    | Font Awesome Brands
    |---------------------------------------------------------------------
    */

    'brand' => function ($expression) {
        $basePath = \TinyPixel\Support\Directives\DirectivesRepository::root();
        $expression = \TinyPixel\Support\Directives\DirectivesRepository::stripQuotes($expression);
        $svg = "{$basePath}/resources/assets/svg/fa/brands/{$expression}.svg";

        return file_get_contents($svg);
    },
];
