<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Plugin Name
    |--------------------------------------------------------------------------
    |
    | The display name of the plugin.
    |
    */

    'name' => 'Support',

    /*
    |--------------------------------------------------------------------------
    | Runtime Environment
    |--------------------------------------------------------------------------
    |
    | Check if development, staging, production, etc.
    |
    */

    'env' => getenv('WP_ENV') ?? 'production',

    /*
    |--------------------------------------------------------------------------
    | Plugin Icon
    |--------------------------------------------------------------------------
    |
    | The icon representing plugin interactions
    |
    */

    'icon' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Plugin path
    |--------------------------------------------------------------------------
    |
    | Absolute path to plugin
    |
    */

    'basePath' => plugin_dir_path(__DIR__),

    /*
    |--------------------------------------------------------------------------
    | Plugin URL
    |--------------------------------------------------------------------------
    |
    | Absolute path to plugin
    |
    */

    'baseUrl' => plugins_url('support'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        TinyPixel\Support\Providers\ViewServiceProvider::class,
        TinyPixel\Support\Providers\AssetsServiceProvider::class,
        TinyPixel\Support\Providers\WordPressServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases (formerly "Facades")
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
        'App'          => Illuminate\Support\Facades\App::class,
        'Artisan'      => Illuminate\Support\Facades\Artisan::class,
        'Auth'         => Illuminate\Support\Facades\Auth::class,
        'Blade'        => Illuminate\Support\Facades\Blade::class,
        'Broadcast'    => Illuminate\Support\Facades\Broadcast::class,
        'Bus'          => Illuminate\Support\Facades\Bus::class,
        'Cache'        => Illuminate\Support\Facades\Cache::class,
        'Config'       => Illuminate\Support\Facades\Config::class,
        'Cookie'       => Illuminate\Support\Facades\Cookie::class,
        'Crypt'        => Illuminate\Support\Facades\Crypt::class,
        'DB'           => Illuminate\Support\Facades\DB::class,
        'Event'        => Illuminate\Support\Facades\Event::class,
        'File'         => Illuminate\Support\Facades\File::class,
        'Gate'         => Illuminate\Support\Facades\Gate::class,
        'Hash'         => Illuminate\Support\Facades\Hash::class,
        'Lang'         => Illuminate\Support\Facades\Lang::class,
        'Log'          => Illuminate\Support\Facades\Log::class,
        'Mail'         => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password'     => Illuminate\Support\Facades\Password::class,
        'Queue'        => Illuminate\Support\Facades\Queue::class,
        'Redirect'     => Illuminate\Support\Facades\Redirect::class,
        'Redis'        => Illuminate\Support\Facades\Redis::class,
        'Request'      => Illuminate\Support\Facades\Request::class,
        'Response'     => Illuminate\Support\Facades\Response::class,
        'Route'        => Illuminate\Support\Facades\Route::class,
        'Schema'       => Illuminate\Support\Facades\Schema::class,
        'Session'      => Illuminate\Support\Facades\Session::class,
        'Storage'      => Illuminate\Support\Facades\Storage::class,
        'URL'          => Illuminate\Support\Facades\URL::class,
        'Validator'    => Illuminate\Support\Facades\Validator::class,
        'View'         => Illuminate\Support\Facades\View::class,
    ],
];
