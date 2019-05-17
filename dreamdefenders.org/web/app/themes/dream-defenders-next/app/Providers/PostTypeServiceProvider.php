<?php

namespace App\Providers;

use \App\Providers\BaseServiceProvider;

use function Roots\app;

class PostTypeServiceProvider extends BaseServiceProvider
{
    /**
     * Service register
     */
    public function register()
    {
        $this->bindFromDir('PostTypes');
    }

    /**
     * Service bootstrap
     */
    public function boot()
    {
    }

    /**
     * Initialize bound PostTypes from the IOC
     */
    public function withBound($postType)
    {
        // Calling the bound posttype
        // to instantiate
        app($postType);
    }
}
