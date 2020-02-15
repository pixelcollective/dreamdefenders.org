<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * Bloginfo fields
     */
    protected static $info = [
        'name',
        'description',
        'url',
    ];

    /**
     * Accounts
     */
    protected static $accounts = [
        'facebook'  => 'https://facebook.com/dreamdefenders',
        'twitter'   => 'https://twitter.com/dreamdefenders',
        'instagram' => 'https://instagram.com/thedreamdefenders',
        'email'     => 'mailto:info@dreamdefenders.org',
    ];

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['*'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return ['app' => (object) [
            'site' => (object) $this->site(),
            'accounts' => (object) $this->accounts(),
        ]];
    }

    /**
     * Info
     *
     * @return array
     */
    public function site(): array
    {
        return Collection::make(self::$info)
            ->flatMap(function ($field) {
                return [$field => get_bloginfo($field)];
            })->toArray();
    }

    /**
     * Social media accounts
     *
     * @return array
     */
    public function accounts(): array
    {
        return self::$accounts;
    }
}
