<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$instagram = new FieldsBuilder('instagram');

$instagram

    ->addGroup('instagram', ['label' => 'Instagram feed will be placed here'])
    ->endGroup();

return $instagram;
