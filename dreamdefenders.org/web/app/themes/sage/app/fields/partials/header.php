<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

$header
    ->addTab('Header', ['placement' => 'left'])
        ->addFields(get_field_partial('components.header'));

return $header;
