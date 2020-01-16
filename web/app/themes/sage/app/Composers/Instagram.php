<?php

namespace App\Composers;

use Roots\Acorn\Application;
use Illuminate\Support\Facades\Cache;
use TinyPixel\Acorn\Instagram\Composers\InstagramComposer;

/**
 * Instagram Composer
 *
 * @package    Dream Defenders
 * @subpackage Composers
 * @author     Kelly Mears <kelly@tinypixel.dev>
 * @license    MIT
 */
class Instagram extends InstagramComposer
{
    /**
     * Number of pictures to return
     *
     * @var int
     */
    public $count = 12;

    /**
     * Instagram account name.
     *
     * @var string
     **/
    public $account = 'thedreamdefenders';

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['components.instagram'];

    /**
     * Constructor.
     *
     * @param App
     */
    public function __construct(\Illuminate\Support\Facades\Cache $cache, \Roots\Acorn\Application $app)
    {
        $this->cache = $cache;
        $this->app = $app;
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @param  array $data
     * @param  Illuminate\View $view
     * @return array
     */
    public function with()
    {
        return [
            'grams' => $this->cachedRequest()->chunk(3)->toArray(),
        ];
    }

    /**
     * Cache requests to Instagram/Facebook to dissuade them from
     * blacklisting our IP.
     *
     * @return \Illuminate\Support\Collection
     */
    public function cachedRequest()
    {
        return $this->cache::remember('instagram', 43200, function () {
            $this->app->make('instagram.authenticated');

            return $this->media()->map(function ($gram) {
                return (object) [
                    'id'      => $gram['shortcode'],
                    'type'    => $gram['type'],
                    'caption' => $gram['caption'],
                    'url'     => "https://www.instagram.com/p/{$gram['shortcode']}",
                    'image'   => $gram['imageUrl'],
                ];
            });;
        });
    }
}
