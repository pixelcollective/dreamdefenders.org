<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$content = new FieldsBuilder('content');

$content
    ->addGroup('content', ['label' => 'Content from the main editor will be displayed here'])
    ->endGroup();

return $content;
