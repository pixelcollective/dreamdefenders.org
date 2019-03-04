<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WeDevs\ORM\WP\Post as Post;

class PageFreedomPapers extends Controller
{
    public function papers()
    {
        $papers = Post::type('freedom-paper')
                    ->status('publish')
                    ->get()
                    ->toArray();

        foreach ($papers as $paper) {
            $results[] = (object) [
                'id'         => $paper['ID'],
                'image'      => get_field('freedompaper__image', $paper['ID'])['url'],
                'heading'    => get_field('freedompaper__heading', $paper['ID']),
                'subheading' => get_field('freedompaper__subheading', $paper['ID']),
                'excerpt'    => get_field('freedompaper__excerpt', $paper['ID']),
                'download'   => get_field('freedompaper__download', $paper['ID']),
            ];
        }

        return $results;
    }
}
