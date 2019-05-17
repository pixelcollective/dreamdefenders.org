<?php

namespace App\Directives;

use function Roots\app;

/**
 * Directives
 */
class Directives
{
    public function __construct()
    {
        $this->get()->map(function ($value) {
            $value = (object) $value[0];
            return app('blade.compiler')->directive($value->directive, $value->expression);
        });
    }

    /**
     * Returns the specified directives as an array.
     *
     * @param  string $name
     * @return array
     */
    protected function get()
    {
        return collect(glob(__DIR__.'/Directives/*.php'))->map(function ($file) {
            return collect(require($file));
        });
    }
}
