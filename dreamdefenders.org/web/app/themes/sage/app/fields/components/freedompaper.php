<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$wrapper = (object) [
    'ui'   => 1,
    'full' => ['width' => 100],
    'half' => ['width' => 50],
];

$freedompaper = new FieldsBuilder('paper', ['label' => 'Freedom Paper']);

$freedompaper
    ->addImage('freedompaper__image', [
            'label' => 'Image or Illustration',
            'return_value' => 'url',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->full])
        ->setInstructions('Set image representation of Freedom Paper entry.')
        ->setRequired()

    ->addText('freedompaper__heading', [
        'label' => 'Heading',
        'wrapper' => $wrapper->half])
        ->setInstructions('Enter the title of this Freedom Paper entry')

    ->addText('freedompaper__subheading', [
        'label' => 'Subheading',
        'wrapper' => $wrapper->half])
        ->setInstructions('Enter the subtitle of this Freedom Paper entry (optional)')

    ->addTextArea('freedompaper__excerpt', [
        'label' => 'Excerpt',
        'wrapper' => $wrapper->full])
        ->setInstructions('Enter excerpt of Freedom Paper')
        ->setRequired()

    ->addFile('freedompaper__download', [
        'label' => 'File (for download)',
        'required' => 0,
        'wrapper' => $wrapper->half,
        'return_format' => 'array',
        'library' => 'all'])
        ->setInstructions('Attach a zip or pdf file for users to download (defaults to all Freedom Papers)');

return $freedompaper;
