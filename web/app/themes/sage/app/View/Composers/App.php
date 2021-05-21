<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;
use Illuminate\Support\Collection;

/**
 * Application-wide data.
 */
class App extends Composer
{
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
        return [
            'app' => (object) [
                'site' => (object) [
                    get_bloginfo('name'),
                    get_bloginfo('description'),
                    get_bloginfo('url'),
                ],
                'manifest' => (object) [
                    'json' => get_bloginfo('url') . '/app/themes/sage/app-manifest.json',
                    'apple_touch_icon' => get_bloginfo('url') . '/app/themes/sage/dist/images/icons-192.png',
                ],
                'accounts' => (object) [
                    'facebook'  => $this->modExists('facebook') ? "https://facebook.com/{$this->mods()->facebook}" : null,
                    'twitter'   => $this->modExists('twitter') ? "https://twitter.com/{$this->mods()->twitter}" : null,
                    'instagram' => $this->modExists('instagram') ? "https://instagram.com/{$this->mods()->instagram}" : null,
                    'email'     => $this->modExists('email') ? "mailto:{$this->mods()->email}" : null,
                ],
                'actions' => [
                    (object) [
                        'text' => $this->modExists('button_a_text') ? $this->mods()->button_a_text : null,
                        'url'  => $this->modExists('button_a_url')  ? $this->mods()->button_a_url  : null,
                    ],
                    (object) [
                        'text' => $this->modExists('button_b_text') ? $this->mods()->button_b_text : null,
                        'url'  => $this->modExists('button_b_url')  ? $this->mods()->button_b_url  : null,
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

    private function modExists(string $mod): Bool {
        return property_exists($this->mods(), $mod); 
    }

    public function mods() {
        return (object) Collection::make(get_theme_mods())->toArray();
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
