<?php

namespace App\Composers;

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
        return $this->media()->map(function ($gram) {
            return (object) [
                'id'      => $gram['shortcode'],
                'type'    => $gram['type'],
                'caption' => $gram['caption'],
                'url'     => "https://www.instagram.com/p/{$gram['shortcode']}",
                'image'   => $gram['imageUrl'],
            ];
        });
    }
}
