<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$general = new FieldsBuilder('general');

$general
    ->addTab('general', ['placement' => 'left'])
        ->addTrueFalse('enable_social_sharing', ['ui' => 1])
            ->setDefaultValue('1')
            ->setInstructions('Shows social sharing buttons for various platforms below the title.')

        ->addTrueFalse('enable_featured_image', ['ui' => 1])
            ->setDefaultValue('1')
            ->setInstructions('Enables automatically displaying the featured image before the content.');

return $general;
