<?php

namespace App\Composers;

use TinyPixel\AcornInstagram\Composers\InstagramComposer;

/**
 * Instagram Composer
 *
 * @package TinyPixel\Acorn\Instagram\Composers
 * @author  Kelly Mears <kelly@tinypixel.dev>
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
    protected static $views = [
        'components.instagram',
    ];

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
            'media' => (object) $this->media()->toArray(),
        ];
    }
}
