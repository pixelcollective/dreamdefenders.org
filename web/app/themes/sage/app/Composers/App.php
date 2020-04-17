<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use Log1x\Navi\Navi;
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
        $this->mods = (object) Collection::make(get_theme_mods())->toArray();

        return [
            'app' => (object) [
                'site' => (object) $this->site(),
                'manifest' => (object) [
                    'json' => get_bloginfo('url') . '/app/themes/sage/app-manifest.json',
                    'apple_touch_icon' => get_bloginfo('url') . '/app/themes/sage/dist/images/icons-192.png',
                ],
                'accounts' => (object) [
                    'facebook'  => $this->mods->facebook ? "https://facebook.com/{$this->mods->facebook}" : null,
                    'twitter'   => $this->mods->twitter ? "https://twitter.com/{$this->mods->twitter}" : null,
                    'instagram' => $this->mods->instagram ? "https://instagram.com/{$this->mods->instagram}" : null,
                    'email'     => $this->mods->email ? "mailto:{$this->mods->email}" : null,
                ],
                'actions' => [
                    (object) [
                        'text' => $this->mods->button_a_text ? $this->mods->button_a_text : null,
                        'url'  => $this->mods->button_a_url  ? $this->mods->button_a_url  : null,
                    ],
                    (object) [
                        'text' => $this->mods->button_b_text ? $this->mods->button_b_text : null,
                        'url'  => $this->mods->button_b_url  ? $this->mods->button_b_url  : null,
                    ],
                ],
            ],
            'navigation' => (object) [
                'about'        => $this->navigation('about_us'),
                'vision'       => $this->navigation('our_vision'),
                'work'         => $this->navigation('our_work'),
                'footer_left'  => $this->navigation('footer_left'),
                'footer_right' => $this->navigation('footer_right'),
            ],
        ];
    }

    /**
     * Info
     *
     * @return array
     */
    public function site(): array
    {
        return Collection::make(self::$info)->flatMap(function ($field) {
            return [$field => get_bloginfo($field)];
        })->toArray();
    }

    /**
     * Returns the primary navigation.
     *
     * @return array
     */
    public function navigation($nav)
    {
        $navigation = (new Navi())->build($nav);

        if ($navigation->isEmpty()) {
            return;
        }

        return $navigation->toArray();
    }
}
