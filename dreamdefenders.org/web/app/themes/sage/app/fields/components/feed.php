<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$full = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 100],
];

$half = (object) [
  'ui' => 1,
  'wrapper' => ['width' => 50],
];

$category_options = [
    'label' => 'Select Categories',
    'instructions' => 'Choose which categories to display posts from',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => $half->wrapper,
    'taxonomy' => 'category',
    'field_type' => 'checkbox',
    'allow_null' => 1,
    'add_term' => 0,
    'save_terms' => 0,
    'load_terms' => 0,
    'return_format' => 'id',
    'multiple' => 1
];

$sidebar_selections = [
    'home' => 'Home',
    'default' => 'Standard',
    'social' => 'Social',
    'action' => 'Action',
    'sidebar-e' => 'Sidebar E',
    'sidebar-f' => 'Sidebar F',
    'sidebar-g' => 'Sidebar H',
    'sidebar-h' => 'Sidebar H',
    'sidebar-i' => 'Sidebar I',
  ];

$feed = new FieldsBuilder('feed');

$feed
    ->addGroup('category_feed', ['label' => 'Feed Selection', 'wrapper' => $full->wrapper])
        ->addTrueFalse('feed_enable', [
            'label' => 'Display post feed',
            'ui' => 1,
            'wrapper' => $half->wrapper])
            ->setDefaultValue(0)
            ->setInstructions("Accompany primary content with additional posts")

        ->addText('feed_label', ['label' => 'Label', 'wrapper' => $full->wrapper, 'ui' => $full->ui])
            ->setInstructions('Label displayed above top featured post of the feed')
            ->setDefaultValue('Updates')
            ->conditional('feed_enable', '==', 1)

        ->addTaxonomy('category_id', $category_options)
            ->setDefaultValue(71)
            ->conditional('feed_enable', '==', 1)

        ->addSelect('feed_sidebar', ['label' => 'Select Sidebar', 'wrapper' => $half->wrapper])
            ->setInstructions('Select a sidebar for inclusion adjacent to the posts feed')
            ->setRequired(0)
            ->addChoices($sidebar_selections)
            ->setDefaultValue('default')
            ->conditional('feed_enable', '==', 1)
    ->endGroup();

return $feed;
