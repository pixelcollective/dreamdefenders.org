<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$wrapper = (object) [
    'ui'   => 1,
    'full' => ['width' => 100],
    'half' => ['width' => 50],
];

$config = (object) [
    'alignment_button_group' => [
        'label'   => 'Alignment',
        'choices' => [ 'left', 'center', 'right'],
    ],
    'position_toggle' => [
        'label'       => 'Fixed Position',
        'ui'          => $wrapper->ui,
        'ui_on_text' => 'Fixed  ',
        'ui_off_text'  => '&nbsp;&nbsp;&nbsp;&nbsp;Standard',
        'wrapper'     => $wrapper->half,
    ],
    'overlay_range' => [
        'label'     => 'Overlay opacity',
        'min_value' => '0',
        'max_value' => '10',
        'step'      => '10',
        'append'    => '%',
        'ui'        => $wrapper->ui,
        'wrapper'   => $wrapper->half,
    ],
];

$header = new FieldsBuilder('header');

$header

    ->addGroup('header__image')

        ->addTrueFalse('header__customize_toggle', [
            'label' => 'Customize Header',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->full])
            ->setDefaultValue(0)
            ->setInstructions("By default the header is populated from the post content")

        ->addColorPicker('header__overlay_color', [
            'label' => 'Overlay color',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->half])
            ->setDefaultValue('#000')
            ->setInstructions('Set a color for the top banner overlay')
            ->conditional('header__customize_toggle', '==', 1)

        ->addRange('header__overlay_opacity', $config->overlay_range)
            ->setDefaultValue(80)
            ->setInstructions('Specify transparency for the chosen overlay color')
            ->conditional('header__customize_toggle', '==', 1)

        ->addTrueFalse('header__bg_customize', [
            'label' => 'Customize header background',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->half])
            ->setDefaultValue(0)
            ->setInstructions("By default this content will use the featured image as its background")
            ->conditional('header__customize_toggle', '==', 1)

        ->addTrueFalse('header__bg_fixed', $config->position_toggle)
            ->setInstructions("Adds a parallax effect where the background image doesn't move when scrolling")
            ->setDefaultValue(1)
            ->conditional('header__customize_toggle', '==', 1)
                ->and('header__bg_customize', '==', 1)

        ->addImage('header__bg', [
                'label' => 'Header Image',
                'return_value' => 'url',
                'ui' => $wrapper->ui,
                'wrapper' => $wrapper->half])
            ->setInstructions('Set header background image.')
            ->conditional('header__customize_toggle', '==', 1)
                ->and('header__bg_customize', '==', 1)

    ->endGroup()

    ->addGroup('header__content')
        ->addTrueFalse('header__content_customize', [
            'label' => 'Customize header text',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->full])
            ->setDefaultValue(0)
            ->setInstructions("Modify default cover banner headline and introduction")

        ->addButtonGroup('header__heading_alignment', $config->alignment_button_group)
            ->setInstructions('Alignment for heading')
            ->conditional('header__content_customize', '==', 1)

        ->addText('header__heading', ['label' => 'Heading', 'wrapper' => $wrapper->half])
            ->setInstructions('Enter the title of this content')
            ->conditional('header__content_customize', '==', 1)

        ->addText('header__subheading', [
            'label' => 'Subheading',
            'wrapper' => $wrapper->half])
            ->setInstructions('Enter subheading')
            ->conditional('header__content_customize', '==', 1)

        ->addTrueFalse('header__cta_enable', [
                'label' => 'Add Button',
                'ui' => $wrapper->ui,
                'wrapper' => $wrapper->full])
                ->setDefaultValue(0)
                ->setInstructions("Add a button beneath the subheading")

        ->addText('header__cta_text', [
            'label' => 'Call-to-action button text',
            'wrapper' => $wrapper->half])
            ->setInstructions('Enter button text')
            ->conditional('header__content_customize', '==', 1)
                ->and('header__cta_enable', '==', 1)

        ->addUrl('header__cta_url', [
            'label' => 'Call-to-action button Link',
            'wrapper' => $wrapper->half])
            ->setInstructions('Enter URL for button to link to')
            ->conditional('header__content_customize', '==', 1)
                ->and('header__cta_enable', '==', 1)
    ->endGroup();

return $header;
