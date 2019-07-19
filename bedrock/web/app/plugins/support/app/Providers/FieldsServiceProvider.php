<?php

namespace App\Providers;

use \StoutLogic\AcfBuilder\FieldsBuilder;
use \App\Fields\Fieldset;
use \Roots\Acorn\ServiceProvider;

class BuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('builder', FieldsBuilder::class);
    }

    public function boot()
    {
        $fieldset = new Fieldset($this->app);
        $fieldset->init();
    }
}
