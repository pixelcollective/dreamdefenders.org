<?php

namespace App\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Roots\Acorn\Application;
use Roots\Acorn\View\Composer;

/**
 * Instagram Composer
 *
 * @package    DreamDefenders/App
 * @subpackage Composers
 * @author     Kelly Mears <kelly@tinypixel.dev>
 */
class Instagram extends Composer
{
    /**
     * Image count
     *
     * @var int
     */
    public $count = 6;

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
    protected static $views = [
        'partials.instagram'
    ];

    /**
     * Resolves Instagram service from the application container.
     *
     * @param \Roots\Acorn\Application $app
     */
    public function __construct(Application $app, Cache $cache)
    {
        $this->app       = $app;
        $this->cache     = $cache;
        $this->instagram = $app->make('instagram');
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
            'grams' => Collection::make($this->media())->map(function ($gram) {
                return (object) [
                    'id'      => $gram['shortcode'] ?? null,
                    'type'    => $gram['type'] ? $gram['type'] : null,
                    'caption' => $gram['caption'] ? $gram['caption'] : null,
                    'url'     => "https://www.instagram.com/p/{$gram['shortCode']}",
                    'image'   => $gram['imageHighResolutionUrl'] ?? $gram['imageHighResolutionUrl']
                ];
            })->chunk(2)->toArray(),
        ];
    }

    /**
     * Instagram account
     *
     * @return InstagramScraper\Model\Account
     */
    public function account()
    {
        return $this->cache::remember("instagram-account", 48000, function () {
            return $this->instagram->getAccount($this->account);
        });
    }

    /**
     * Instagram media
     *
     * @return \Illuminate\Support\Collection
     */
    public function media()
    {
        return $this->cache::remember("instagram-media", 48000, function () {
            return $this->instagram->getMedias($this->account, $this->count);
        });
    }
}
