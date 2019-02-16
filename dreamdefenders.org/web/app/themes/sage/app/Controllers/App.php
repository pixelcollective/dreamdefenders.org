<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function data()
    {
        return $data = (object) array(

            'hero' => (object) array(
                'heading'           => get_field('hero_headline'),
                'subheading'        => get_field('hero_subheading'),
                'link_text'         => get_field('hero_cta_text'),
                'link_url'          => get_field('hero_cta_link'),
                'bg_img'            => get_field('hero_background_image'),
                'bg_color'          => get_field('hero_background_color'),
                'desktop_alignment' => get_field('hero_desktop_alignment'),
                'mobile_alignment'  => get_field('hero_mobile_alignment'),
            ),

            'newsletter' => (object) array(
                'heading'               => get_field('newsletter_heading'),
                'subheading'            => get_field('newsletter_subheading'),
                'image'                 => get_field('newsletter_image'),
                'heading_text_color'    => get_field('newsletter_heading_text_color'),
                'subheading_text_color' => get_field('newsletter_subheading_text_color'),
                'bg_img'                => get_field('newsletter_background_color'),
                'bg_color'              => get_field('newsletter_background_color'),
            ),

            'donation_cta' => (object) array(
                'bg_img'            => get_field('donate_cta_background_image'),
                'bg_color'          => get_field('donate_cta_background_color'),
                'alignment'         => get_field('donate_cta_content_alignment'),
                'desktop_alignment' => get_field('donate_cta_desktop_alignment'),
                'mobile_alignment'  => get_field('donate_cta_mobile_alignment'),
                'subheading'        => get_field('donate_cta_subheading'),
                'heading'           => get_field('donate_cta_headline'),
                'button_url'        => get_field('donate_cta_button_link'),
                'button_text'       => get_field('donate_cta_button_text'),
            ),
        );
    }
}
