<?php
/*
Plugin Name: TapTap, by Bonfire 
Plugin URI: http://bonfirethemes.com/
Description: Super customizable  menu for WordPress. Customize under Appearance → Customize → TapTap Plugin.
Version: 3.9
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
	function taptap_theme_customizer( $wp_customize ) {
	
        //
        // ADD "TapTap Plugin" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('taptap_panel', array('title' => __('TapTap Plugin', 'taptap'),'priority' => 10,));

        //
        // ADD "Menu Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_menu_button_section',array('title' => __( 'Menu Button', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide menu button */
        $wp_customize->add_setting('taptap_hide_menu_button',array('sanitize_callback' => 'sanitize_taptap_hide_menu_button',));
        function sanitize_taptap_hide_menu_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_menu_button',array('type' => 'checkbox','label' => 'Hide menu button','description' => 'Menu label will remain visible (if one is entered below). If hiding for the purpose of using a custom activation element, give the element the "taptap-custom-activator" class).', 'section' => 'taptap_menu_button_section',));
        
        /* menu button style */
        $wp_customize->add_setting('taptap_menu_button_style',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_button_style',array(
            'type' => 'select',
            'label' => 'Button style',
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'style1' => 'Style #1',
                'style2' => 'Style #2',
                'style3' => 'Style #3',
                'style4' => 'Style #4',
                'style5' => 'Style #5',
                'style6' => 'Style #6',
        ),
        ));
        
        /* menu button skinny */
        $wp_customize->add_setting('taptap_menu_button_skinny',array('sanitize_callback' => 'sanitize_taptap_menu_button_skinny',));
        function sanitize_taptap_menu_button_skinny( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_button_skinny',array('type' => 'checkbox','label' => 'Show thin menu button variations', 'section' => 'taptap_menu_button_section',));

        /* menu button animation */
        $wp_customize->add_setting('taptap_menu_button_animation',array(
            'default' => 'none',
        ));
        $wp_customize->add_control('taptap_menu_button_animation',array(
            'type' => 'select',
            'label' => 'Menu button animation',
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'none' => 'No animation',
                'xsign' => 'X sign',
                'minussign' => 'Minus sign',
        ),
        ));
        
        /* menu button animation speed */
        $wp_customize->add_setting('taptap_menu_button_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_animation_speed',));
        function sanitize_taptap_menu_button_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_animation_speed',array('type' => 'text','label' => 'Animation speed (in seconds)','description' => 'Also applies to logo and search elements (for unified hover speed appearance). Example: 0.5. If empty, defaults to 0.25','section' => 'taptap_menu_button_section',));
        
        /* menu button opacity */
        $wp_customize->add_setting('taptap_menu_button_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_opacity',));
        function sanitize_taptap_menu_button_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_opacity',array('type' => 'text','label' => 'Opacity','description' => 'Example: 0.5. If empty, defaults to 1','section' => 'taptap_menu_button_section',));

        /* menu button color */
        $wp_customize->add_setting( 'taptap_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_color',array(
            'label' => 'Menu Button', 'settings' => 'taptap_menu_button_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'taptap_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_hover_color',array(
            'label' => 'Menu Button Hover', 'settings' => 'taptap_menu_button_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button color (active) */
        $wp_customize->add_setting( 'taptap_menu_button_active_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_active_color',array(
            'label' => 'Menu Button (active)', 'settings' => 'taptap_menu_button_active_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button hover color (active) */
        $wp_customize->add_setting( 'taptap_menu_button_active_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_active_hover_color',array(
            'label' => 'Menu Button Hover (active)', 'settings' => 'taptap_menu_button_active_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button position */
        $wp_customize->add_setting('taptap_menu_button_position',array(
            'default' => 'left',
        ));
        $wp_customize->add_control('taptap_menu_button_position',array(
            'type' => 'select',
            'label' => 'Menu button position',
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
        ),
        ));
        
        /* menu button top distance */
        $wp_customize->add_setting('taptap_menu_button_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_top_distance',));
        function sanitize_taptap_menu_button_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_top_distance',array('type' => 'text','label' => 'Top distance (in pixels)','description' => 'Example: 25. If empty, defaults to 10','section' => 'taptap_menu_button_section',));
        
        /* menu button left/right distance */
        $wp_customize->add_setting('taptap_menu_button_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_side_distance',));
        function sanitize_taptap_menu_button_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_side_distance',array('type' => 'text','label' => 'Left/right distance (in pixels)','description' => 'Example: 35. If empty, defaults to 15','section' => 'taptap_menu_button_section',));
        
        /* menu button label */
        $wp_customize->add_setting('taptap_menu_button_label',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label',));
        function sanitize_taptap_menu_button_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label',array('type' => 'text','label' => 'Label','description' => 'If empty, no label will be shown','section' => 'taptap_menu_button_section',));
        
        /* menu button label hide when menu open */
        $wp_customize->add_setting('taptap_menu_button_hide',array('sanitize_callback' => 'sanitize_taptap_menu_button_hide',));
        function sanitize_taptap_menu_button_hide( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_button_hide',array('type' => 'checkbox','label' => 'Hide label when menu opened', 'section' => 'taptap_menu_button_section',));
        
        /* menu button label horizontal position */
        $wp_customize->add_setting('taptap_menu_button_label_horizontal_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_horizontal_position',));
        function sanitize_taptap_menu_button_label_horizontal_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_horizontal_position',array('type' => 'text','label' => 'Label horizontal position (in pixels)','description' => 'Label position is relative to the menu button. Negative values accepted. If empty, defaults to 40 (if empty when menu button is hidden, defaults to 0)','section' => 'taptap_menu_button_section',));
        
        /* menu button label vertical position */
        $wp_customize->add_setting('taptap_menu_button_label_vertical_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_vertical_position',));
        function sanitize_taptap_menu_button_label_vertical_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_vertical_position',array('type' => 'text','label' => 'Label vertical position (in pixels)','description' => 'Label position is relative to the menu button. Negative values accepted. If empty, defaults to 6 (if empty when menu button is hidden, defaults to 0)','section' => 'taptap_menu_button_section',));

        /* menu button label color */
        $wp_customize->add_setting( 'taptap_menu_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_label_color',array(
            'label' => 'Label', 'settings' => 'taptap_menu_button_label_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button label hover color */
        $wp_customize->add_setting( 'taptap_menu_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_label_hover_color',array(
            'label' => 'Label Hover', 'settings' => 'taptap_menu_button_label_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button label font size */
        $wp_customize->add_setting('taptap_menu_button_label_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_font_size',));
        function sanitize_taptap_menu_button_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_font_size',array('type' => 'text','label' => 'Label font size (in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_menu_button_section',));
        
        /* menu button label letter spacing */
        $wp_customize->add_setting('taptap_menu_button_label_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_letter_spacing',));
        function sanitize_taptap_menu_button_label_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_letter_spacing',array('type' => 'text','label' => 'Label letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_button_section',));
        
        /* menu button label font */
        $wp_customize->add_setting('taptap_menu_button_label_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_button_label_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* menu button label theme font */
        $wp_customize->add_setting('taptap_menu_button_label_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_theme_font',));
        function sanitize_taptap_menu_button_label_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_menu_button_section',));

        //
        // ADD "Logo" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_logo_section',array('title' => __( 'Logo', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide logo */
        $wp_customize->add_setting('taptap_hide_logo',array('sanitize_callback' => 'sanitize_taptap_hide_logo',));
        function sanitize_taptap_hide_logo( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_logo',array('type' => 'checkbox','label' => 'Hide logo','description' => 'If selected, logo will not be displayed.', 'section' => 'taptap_logo_section',));

        /* logo position */
        $wp_customize->add_setting('taptap_logo_position',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_logo_position',array(
            'type' => 'select',
            'label' => 'Logo position',
            'section' => 'taptap_logo_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* logo top distance */
        $wp_customize->add_setting('taptap_logo_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_top_distance',));
        function sanitize_taptap_logo_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_top_distance',array('type' => 'text','label' => 'Top distance (in pixels)','description' => 'Example: 35. If empty, defaults to 23','section' => 'taptap_logo_section',));
        
        /* logo left/right distance */
        $wp_customize->add_setting('taptap_logo_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_side_distance',));
        function sanitize_taptap_logo_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_side_distance',array('type' => 'text','label' => 'Left/right distance (in pixels)','description' => 'Example: 35. If empty, defaults to 15','section' => 'taptap_logo_section',));

        /* logo image */
        $wp_customize->add_setting('taptap_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_logo_image',
            array(
                'label' => 'Upload logo image',
                'description' => '<strong>How to add retina logo:</strong> Enable retina script in Misc section, then upload both the regular and retina logo files and make sure they are named correctly. If retina logo is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-logo.png and my-logo@2x.png (note that the retina logo must have "@2x" at the end. @3x images work as well.).<br><br>',
                'settings' => 'taptap_logo_image',
                'section' => 'taptap_logo_section',
        )
        ));
        
        /* logo max height */
        $wp_customize->add_setting('taptap_logo_max_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_max_height',));
        function sanitize_taptap_logo_max_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_max_height',array('type' => 'text','label' => 'Maximum logo image height (in pixels)','description' => 'Maximum height of logo image. If empty, defaults to 35','section' => 'taptap_logo_section',));
        
        /* logo color */
        $wp_customize->add_setting( 'taptap_logo_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_logo_color',array(
            'label' => 'Logo', 'settings' => 'taptap_logo_color', 'section' => 'taptap_logo_section' )
        ));
        
        /* logo hover color */
        $wp_customize->add_setting( 'taptap_logo_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_logo_hover_color',array(
            'label' => 'Logo Hover', 'settings' => 'taptap_logo_hover_color', 'section' => 'taptap_logo_section' )
        ));
        
        /* logo font size */
        $wp_customize->add_setting('taptap_logo_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_font_size',));
        function sanitize_taptap_logo_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_font_size',array('type' => 'text','label' => 'Font size (in pixels)','description' => 'If empty, defaults to 14','section' => 'taptap_logo_section',));
        
        /* logo letter spacing */
        $wp_customize->add_setting('taptap_logo_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_letter_spacing',));
        function sanitize_taptap_logo_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_letter_spacing',array('type' => 'text','label' => 'Letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_logo_section',));
        
        /* logo font */
        $wp_customize->add_setting('taptap_logo_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_logo_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_logo_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* logo theme font */
        $wp_customize->add_setting('taptap_logo_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_theme_font',));
        function sanitize_taptap_logo_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_logo_section',));
        
        //
        // ADD "Search Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_search_section',array('title' => __( 'Search Button', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide search */
        $wp_customize->add_setting('taptap_hide_search_button',array('sanitize_callback' => 'sanitize_taptap_hide_search_button',));
        function sanitize_taptap_hide_search_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_search_button',array('type' => 'checkbox','label' => 'Hide search','description' => 'Search label will remain visible (if one is entered below).', 'section' => 'taptap_search_section',));
        
        /* search button skinny */
        $wp_customize->add_setting('taptap_search_button_skinny',array('sanitize_callback' => 'sanitize_taptap_search_button_skinny',));
        function sanitize_taptap_search_button_skinny( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_button_skinny',array('type' => 'checkbox','label' => 'Show thin search button variation', 'section' => 'taptap_search_section',));
        
        /* search button flip */
        $wp_customize->add_setting('taptap_search_button_flip',array('sanitize_callback' => 'sanitize_taptap_search_button_flip',));
        function sanitize_taptap_search_button_flip( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_button_flip',array('type' => 'checkbox','label' => 'Flip search button', 'section' => 'taptap_search_section',));

        /* search button color */
        $wp_customize->add_setting( 'taptap_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_color',array(
            'label' => 'Search Button', 'settings' => 'taptap_search_button_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button hover color */
        $wp_customize->add_setting( 'taptap_search_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_hover_color',array(
            'label' => 'Search Button Hover', 'settings' => 'taptap_search_button_hover_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button position */
        $wp_customize->add_setting('taptap_search_button_position',array(
            'default' => 'right',
        ));
        $wp_customize->add_control('taptap_search_button_position',array(
            'type' => 'select',
            'label' => 'Search button position',
            'section' => 'taptap_search_section',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
        ),
        ));
        
        /* search button top distance */
        $wp_customize->add_setting('taptap_search_button_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_top_distance',));
        function sanitize_taptap_search_button_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_top_distance',array('type' => 'text','label' => 'Top distance (in pixels)','description' => 'Example: 25. If empty, defaults to 10','section' => 'taptap_search_section',));
        
        /* search button left/right distance */
        $wp_customize->add_setting('taptap_search_button_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_side_distance',));
        function sanitize_taptap_search_button_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_side_distance',array('type' => 'text','label' => 'Left/right distance (in pixels)','description' => 'Example: 35. If empty, defaults to 10','section' => 'taptap_search_section',));
        
        /* search button label */
        $wp_customize->add_setting('taptap_search_button_label',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label',));
        function sanitize_taptap_search_button_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label',array('type' => 'text','label' => 'Label','description' => 'If empty, no label will be shown','section' => 'taptap_search_section',));
        
        /* search button label horizontal position */
        $wp_customize->add_setting('taptap_search_button_label_horizontal_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_horizontal_position',));
        function sanitize_taptap_search_button_label_horizontal_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_horizontal_position',array('type' => 'text','label' => 'Label horizontal position (in pixels)','description' => 'Label position is relative to the search button. Negative values accepted. If empty, defaults to -55 (if empty when search button is hidden, defaults to 0)','section' => 'taptap_search_section',));
        
        /* search button label vertical position */
        $wp_customize->add_setting('taptap_search_button_label_vertical_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_vertical_position',));
        function sanitize_taptap_search_button_label_vertical_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_vertical_position',array('type' => 'text','label' => 'Label vertical position (in pixels)','description' => 'Label position is relative to the search button. Negative values accepted. If empty, defaults to 6 (if empty when search button is hidden, defaults to 0)','section' => 'taptap_search_section',));

        /* search button label color */
        $wp_customize->add_setting( 'taptap_search_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_label_color',array(
            'label' => 'Label', 'settings' => 'taptap_search_button_label_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button label hover color */
        $wp_customize->add_setting( 'taptap_search_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_label_hover_color',array(
            'label' => 'Label Hover', 'settings' => 'taptap_search_button_label_hover_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button label font size */
        $wp_customize->add_setting('taptap_search_button_label_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_font_size',));
        function sanitize_taptap_search_button_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_font_size',array('type' => 'text','label' => 'Label font size (in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_search_section',));
        
        /* search button label letter spacing */
        $wp_customize->add_setting('taptap_search_button_label_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_letter_spacing',));
        function sanitize_taptap_search_button_label_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_letter_spacing',array('type' => 'text','label' => 'Label letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_search_section',));
        
        /* search button label font */
        $wp_customize->add_setting('taptap_search_button_label_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_search_button_label_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_search_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* search button label theme font */
        $wp_customize->add_setting('taptap_search_button_label_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_theme_font',));
        function sanitize_taptap_search_button_label_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_search_section',));
        
        //
        // ADD "Search Field & Overlay" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_search_field_section',array('title' => __( 'Search Field & Overlay', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* search field height */
        $wp_customize->add_setting('taptap_search_field_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_height',));
        function sanitize_taptap_search_field_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_height',array('type' => 'text','label' => 'Search field height (in pixels)','description' => 'If empty, defaults to 65','section' => 'taptap_search_field_section',));
        
        /* search field placeholder text */
        $wp_customize->add_setting('taptap_search_placeholder',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_placeholder',));
        function sanitize_taptap_search_placeholder($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_placeholder',array('type' => 'text','label' => 'Search field placeholder text','description' => 'If empty, defaults to "enter search term"','section' => 'taptap_search_field_section',));
        
        /* search field align right */
        $wp_customize->add_setting('taptap_search_field_right',array('sanitize_callback' => 'sanitize_taptap_search_field_right',));
        function sanitize_taptap_search_field_right( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_field_right',array('type' => 'checkbox','label' => 'Align search field text to right', 'section' => 'taptap_search_field_section',));
        
        /* search field animation speed */
        $wp_customize->add_setting('taptap_search_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_animation_speed',));
        function sanitize_taptap_search_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_animation_speed',array('type' => 'text','label' => 'Animation speed (in seconds)','description' => 'Example: 0.5. If empty, defaults to 0.25','section' => 'taptap_search_field_section',));
        
        /* hide clear field */
        $wp_customize->add_setting('taptap_search_clear_field',array('sanitize_callback' => 'sanitize_taptap_search_clear_field',));
        function sanitize_taptap_search_clear_field( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_clear_field',array('type' => 'checkbox','label' => 'Hide clear field function', 'section' => 'taptap_search_field_section',));
        
        /* search close button color */
        $wp_customize->add_setting( 'taptap_search_close_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_close_button_color',array(
            'label' => 'Close search button', 'settings' => 'taptap_search_close_button_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search close button color */
        $wp_customize->add_setting( 'taptap_search_close_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_close_button_hover_color',array(
            'label' => 'Close search button hover', 'settings' => 'taptap_search_close_button_hover_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search clear field button color */
        $wp_customize->add_setting( 'taptap_search_clear_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_clear_button_color',array(
            'label' => 'Clear search field button', 'settings' => 'taptap_search_clear_button_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search clear field button color */
        $wp_customize->add_setting( 'taptap_search_clear_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_clear_button_hover_color',array(
            'label' => 'Clear search field button hover', 'settings' => 'taptap_search_clear_button_hover_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field placeholder text color */
        $wp_customize->add_setting( 'taptap_search_field_placeholder_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_placeholder_color',array(
            'label' => 'Search field placeholder text', 'settings' => 'taptap_search_field_placeholder_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field text color */
        $wp_customize->add_setting( 'taptap_search_field_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_text_color',array(
            'label' => 'Search field text', 'settings' => 'taptap_search_field_text_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field background color */
        $wp_customize->add_setting( 'taptap_search_field_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_background_color',array(
            'label' => 'Search field background', 'settings' => 'taptap_search_field_background_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field background opacity */
        $wp_customize->add_setting('taptap_search_background_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_background_opacity',));
        function sanitize_taptap_search_background_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_background_opacity',array('type' => 'text','label' => 'Search field background opacity','description' => 'Example: 0.5. If empty, defaults to 1','section' => 'taptap_search_field_section',));

        /* text field font size */
        $wp_customize->add_setting('taptap_search_field_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_font_size',));
        function sanitize_taptap_search_field_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_font_size',array('type' => 'text','label' => 'Font size (in pixels)','description' => 'If empty, defaults to 15','section' => 'taptap_search_field_section',));
        
        /* text field letter spacing */
        $wp_customize->add_setting('taptap_search_field_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_letter_spacing',));
        function sanitize_taptap_search_field_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_letter_spacing',array('type' => 'text','label' => 'Letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_search_field_section',));

        /* text field font */
        $wp_customize->add_setting('taptap_search_field_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_search_field_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_search_field_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* text field theme font */
        $wp_customize->add_setting('taptap_search_field_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_theme_font',));
        function sanitize_taptap_search_field_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_search_field_section',));
        
        /* search overlay color */
        $wp_customize->add_setting( 'taptap_search_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_overlay_color',array(
            'label' => 'Overlay', 'settings' => 'taptap_search_overlay_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search overlay opcity */
        $wp_customize->add_setting('taptap_search_overlay_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_overlay_opacity',));
        function sanitize_taptap_search_overlay_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_overlay_opacity',array('type' => 'text','label' => 'Overlay opacity','description' => 'From 0-1 (example: 0.5) If empty, defaults to 0.5','section' => 'taptap_search_field_section',));

        //
        // ADD "Header" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_header_section',array('title' => __( 'Header', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* show header */
        $wp_customize->add_setting('taptap_show_header',array('sanitize_callback' => 'sanitize_taptap_show_header',));
        function sanitize_taptap_show_header( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_header',array('type' => 'checkbox','label' => 'Show header','description' => 'Display background behind menu/search buttons and logo', 'section' => 'taptap_header_section',));

        /* header height */
        $wp_customize->add_setting('taptap_header_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_height',));
        function sanitize_taptap_header_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_height',array('type' => 'text','label' => 'Header height (in pixels)','description' => 'If empty, defaults to 65','section' => 'taptap_header_section',));

        /* header opacity */
        $wp_customize->add_setting('taptap_header_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_opacity',));
        function sanitize_taptap_header_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_opacity',array('type' => 'text','label' => 'Header opacity','description' => 'From 0-1 (example: 0.5) If empty, defaults to 1','section' => 'taptap_header_section',));

        /* show header shadow */
        $wp_customize->add_setting('taptap_show_header_shadow',array('sanitize_callback' => 'sanitize_taptap_show_header_shadow',));
        function sanitize_taptap_show_header_shadow( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_header_shadow',array('type' => 'checkbox','label' => 'Show header shadow','description' => 'Display shadow behind menu/search buttons and logo', 'section' => 'taptap_header_section',));
        
        /* header shadow opacity */
        $wp_customize->add_setting('taptap_header_shadow_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_shadow_opacity',));
        function sanitize_taptap_header_shadow_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_shadow_opacity',array('type' => 'text','label' => 'Header shadow opacity','description' => 'From 0-1 (example: 0.75) If empty, defaults to 0.4','section' => 'taptap_header_section',));

        /* header background color */
        $wp_customize->add_setting( 'taptap_header_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_header_background_color',array(
            'label' => 'Header Background', 'settings' => 'taptap_header_background_color', 'section' => 'taptap_header_section' )
        ));

        //
        // ADD "Menu Container & Overlay" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_container_section',array('title' => __( 'Menu Container & Overlay', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* menu appearance */
        $wp_customize->add_setting('taptap_menu_appearance',array(
            'default' => 'slidetop',
        ));
        $wp_customize->add_control('taptap_menu_appearance',array(
            'type' => 'select',
            'label' => 'Menu appearance',
            'section' => 'taptap_container_section',
            'choices' => array(
                'slidetop' => 'Slide Top',
                'slideleft' => 'Slide Left',
                'slideright' => 'Slide Right',
                'slidebottom' => 'Slide Bottom',
                'fade' => 'Fade',
        ),
        ));
        
        /* menu appearance speed */
        $wp_customize->add_setting('taptap_menu_appearance_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_appearance_speed',));
        function sanitize_taptap_menu_appearance_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_appearance_speed',array('type' => 'text','label' => 'Appearance speed (in seconds)','description' => 'If empty, defaults to 0.5 (also applies to customizations in "Content Animation" section.)','section' => 'taptap_container_section',));
        
        /* menu appearance scaling */
        $wp_customize->add_setting('taptap_menu_appearance_scaling',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_appearance_scaling',));
        function sanitize_taptap_menu_appearance_scaling($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_appearance_scaling',array('type' => 'text','label' => 'Appearance scaling (0-1)','description' => 'If empty, defaults to 0.75. To disable scaling, enter value as 1','section' => 'taptap_container_section',));
        
        /* menu width */
        $wp_customize->add_setting('taptap_menu_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_width',));
        function sanitize_taptap_menu_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_width',array('type' => 'text','label' => 'Width (in pixels)','description' => 'Applied when Slide Left or Slide Right appearance selected. If empty, defaults to full width','section' => 'taptap_container_section',));
        
        /* menu height */
        $wp_customize->add_setting('taptap_menu_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_height',));
        function sanitize_taptap_menu_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_height',array('type' => 'text','label' => 'Height (in pixels)','description' => 'Applied when Slide Top or Slide Bottom appearance selected. If empty, defaults to full height','section' => 'taptap_container_section',));
        
        /* content horizontal alignment */
        $wp_customize->add_setting('taptap_content_horizontal_alignment',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_content_horizontal_alignment',array(
            'type' => 'select',
            'label' => 'Content horizontal alignment',
            'section' => 'taptap_container_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* content vertical alignment */
        $wp_customize->add_setting('taptap_content_vertical_alignment',array(
            'default' => 'top',
        ));
        $wp_customize->add_control('taptap_content_vertical_alignment',array(
            'type' => 'select',
            'label' => 'Content vertical alignment',
            'section' => 'taptap_container_section',
            'choices' => array(
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
        ),
        ));
        
        /* content max width */
        $wp_customize->add_setting('taptap_menu_container_content_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_content_width',));
        function sanitize_taptap_menu_container_content_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_content_width',array('type' => 'text','label' => 'Max content width (in pixels)','description' => 'If empty, defaults to 800','section' => 'taptap_container_section',));
        
        /* left padding */
        $wp_customize->add_setting('taptap_menu_container_left_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_left_padding',));
        function sanitize_taptap_menu_container_left_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_left_padding',array('type' => 'text','label' => 'Left padding (in pixels)','description' => 'Left distance for contents inside menu container. If empty, defaults to 25','section' => 'taptap_container_section',));
        
        /* right padding */
        $wp_customize->add_setting('taptap_menu_container_right_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_right_padding',));
        function sanitize_taptap_menu_container_right_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_right_padding',array('type' => 'text','label' => 'Right padding (in pixels)','description' => 'Right distance for contents inside menu container. If empty, defaults to 25','section' => 'taptap_container_section',));
        
        /* top padding */
        $wp_customize->add_setting('taptap_menu_container_top_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_top_padding',));
        function sanitize_taptap_menu_container_top_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_top_padding',array('type' => 'text','label' => 'Top padding (in pixels)','description' => 'Top distance for contents inside menu container. If left empty, defaults to 75','section' => 'taptap_container_section',));
        
        /* bottom padding */
        $wp_customize->add_setting('taptap_menu_container_bottom_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_bottom_padding',));
        function sanitize_taptap_menu_container_bottom_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_bottom_padding',array('type' => 'text','label' => 'Bottom padding (in pixels)','description' => 'Bottom distance for contents inside menu container. If left empty, defaults to 75','section' => 'taptap_container_section',));
        
        /* background color */
        $wp_customize->add_setting( 'taptap_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color',array(
            'label' => 'Background color', 'description' => 'Please note: To create pulsating background color effect, also select colors #2 and #3 below (pulsating will not take effect unless all three colors are chosen)', 'settings' => 'taptap_background_color', 'section' => 'taptap_container_section' )
        ));
        
        /* background color two */
        $wp_customize->add_setting( 'taptap_background_color_two', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color_two',array(
            'label' => 'Background color #2', 'settings' => 'taptap_background_color_two', 'section' => 'taptap_container_section' )
        ));
        
        /* background color three */
        $wp_customize->add_setting( 'taptap_background_color_three', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color_three',array(
            'label' => 'Background color #3', 'settings' => 'taptap_background_color_three', 'section' => 'taptap_container_section' )
        ));
        
        /* background color pulsating speed */
        $wp_customize->add_setting('taptap_background_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_animation_speed',));
        function sanitize_taptap_background_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_animation_speed',array('type' => 'text','label' => 'Background color pulsating speed (in seconds)','description' => 'If you have entered all three background colors above, then you can use this setting to control the color pulsating speed. If empty, defaults to 10','section' => 'taptap_container_section',));

        /* background image */
        $wp_customize->add_setting('taptap_background_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_background_image',
            array(
                'label' => 'Background image',
                'description' => '',
                'settings' => 'taptap_background_image',
                'section' => 'taptap_container_section',
        )
        ));
        
        /* background image as pattern */
        $wp_customize->add_setting('taptap_background_pattern',array('sanitize_callback' => 'sanitize_taptap_background_pattern',));
        function sanitize_taptap_background_pattern( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_background_pattern',array('type' => 'checkbox','label' => 'Show background image as pattern','section' => 'taptap_container_section',));
        
        /* background image opacity */
        $wp_customize->add_setting('taptap_background_image_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_image_opacity',));
        function sanitize_taptap_background_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_image_opacity',array('type' => 'text','label' => 'Background image opacity','description' => 'From 0-1 (example: 0.5) If empty, defaults to 0.1','section' => 'taptap_container_section',));
        
        /* background color opacity */
        $wp_customize->add_setting('taptap_background_color_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_color_opacity',));
        function sanitize_taptap_background_color_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_color_opacity',array('type' => 'text','label' => 'Background color opacity','description' => 'From 0-1 (example: 0.95) If empty, defaults to 1','section' => 'taptap_container_section',));

        /* background image horizontal alignment */
        $wp_customize->add_setting('taptap_background_horizontal_alignment',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_background_horizontal_alignment',array(
            'type' => 'select',
            'label' => 'Background image horizontal alignment',
            'section' => 'taptap_container_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* background image vertical alignment */
        $wp_customize->add_setting('taptap_background_vertical_alignment',array(
            'default' => 'middle',
        ));
        $wp_customize->add_control('taptap_background_vertical_alignment',array(
            'type' => 'select',
            'label' => 'Background image vertical alignment',
            'section' => 'taptap_container_section',
            'choices' => array(
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
        ),
        ));
        
        /* background overlay color */
        $wp_customize->add_setting( 'taptap_background_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_overlay_color',array(
            'label' => 'Overlay', 'settings' => 'taptap_background_overlay_color', 'section' => 'taptap_container_section' )
        ));
        
        /* background overlay opacity */
        $wp_customize->add_setting('taptap_background_overlay_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_overlay_opacity',));
        function sanitize_taptap_background_overlay_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_overlay_opacity',array('type' => 'text','label' => 'Overlay opacity','description' => 'From 0-1 (example: 0.5) If empty, defaults to 0.5','section' => 'taptap_container_section',));


        //
        // ADD "Heading Text" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_heading_text_section',array('title' => __( 'Heading Text', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* heading text */
        $wp_customize->add_setting('taptap_heading_text',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_text',));
        function sanitize_taptap_heading_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_text',array('type' => 'text','label' => 'Text','description' => '','section' => 'taptap_heading_text_section',));
        
        /* heading text color */
        $wp_customize->add_setting( 'taptap_heading_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_heading_color',array(
            'label' => 'Heading Text', 'settings' => 'taptap_heading_color', 'section' => 'taptap_heading_text_section' )
        ));
        
        /* heading link */
        $wp_customize->add_setting('taptap_heading_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_link',));
        function sanitize_taptap_heading_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_link',array('type' => 'text','label' => 'Link','description' => '','section' => 'taptap_heading_text_section',));

        /* heading font size */
        $wp_customize->add_setting('taptap_heading_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_font_size',));
        function sanitize_taptap_heading_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_font_size',array('type' => 'text','label' => 'Font size (in pixels)','description' => 'If empty, defaults to 14','section' => 'taptap_heading_text_section',));
        
        /* heading letter spacing */
        $wp_customize->add_setting('taptap_heading_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_letter_spacing',));
        function sanitize_taptap_heading_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_letter_spacing',array('type' => 'text','label' => 'Letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_heading_text_section',));

        /* heading line height */
        $wp_customize->add_setting('taptap_heading_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_line_height',));
        function sanitize_taptap_heading_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_line_height',array('type' => 'text','label' => 'Line height (in pixels)','description' => 'If empty, defaults to 16','section' => 'taptap_heading_text_section',));

        /* heading font */
        $wp_customize->add_setting('taptap_heading_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_heading_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_heading_text_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* heading theme font */
        $wp_customize->add_setting('taptap_heading_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_theme_font',));
        function sanitize_taptap_heading_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_heading_text_section',));

        //
        // ADD "Subheading Text" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_subheading_text_section',array('title' => __( 'Subheading Text', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* subheading distance */
        $wp_customize->add_setting('taptap_subheading_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_distance',));
        function sanitize_taptap_subheading_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_distance',array('type' => 'text','label' => 'Spacing between heading/subheading (in pixels)','description' => 'If empty, defaults to 5.','section' => 'taptap_subheading_text_section',));
        
        /* subheading text */
        $wp_customize->add_setting('taptap_subheading_text',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_text',));
        function sanitize_taptap_subheading_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_text',array('type' => 'text','label' => 'Text','description' => '','section' => 'taptap_subheading_text_section',));
        
        /* subheading text color */
        $wp_customize->add_setting( 'taptap_subheading_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_subheading_color',array(
            'label' => 'Subheading Text', 'settings' => 'taptap_subheading_color', 'section' => 'taptap_subheading_text_section' )
        ));
        
        /* subheading link */
        $wp_customize->add_setting('taptap_subheading_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_link',));
        function sanitize_taptap_subheading_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_link',array('type' => 'text','label' => 'Link','description' => '','section' => 'taptap_subheading_text_section',));

        /* subheading font size */
        $wp_customize->add_setting('taptap_subheading_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_font_size',));
        function sanitize_taptap_subheading_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_font_size',array('type' => 'text','label' => 'Font size (in pixels)','description' => 'If empty, defaults to 10','section' => 'taptap_subheading_text_section',));
        
        /* subheading letter spacing */
        $wp_customize->add_setting('taptap_subheading_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_letter_spacing',));
        function sanitize_taptap_subheading_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_letter_spacing',array('type' => 'text','label' => 'Letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_subheading_text_section',));

        /* subheading line height */
        $wp_customize->add_setting('taptap_subheading_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_line_height',));
        function sanitize_taptap_subheading_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_line_height',array('type' => 'text','label' => 'Line height (in pixels)','description' => 'If empty, defaults to 16','section' => 'taptap_subheading_text_section',));

        /* subheading font */
        $wp_customize->add_setting('taptap_subheading_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_subheading_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_subheading_text_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* subheading theme font */
        $wp_customize->add_setting('taptap_subheading_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_theme_font',));
        function sanitize_taptap_subheading_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_subheading_text_section',));

        //
        // ADD "Heading Image" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_heading_image_section',array('title' => __( 'Heading Image', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* heading image */
        $wp_customize->add_setting('taptap_heading_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_heading_image',
            array(
                'label' => 'Image',
                'description' => '<strong>How to add retina image:</strong> Enable retina script in Misc section, then upload both the regular and retina image files and make sure they are named correctly. If retina image is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-image.png and my-image@2x.png (note that the retina image must have "@2x" at the end. @3x images work as well.).<br><br>',
                'settings' => 'taptap_heading_image',
                'section' => 'taptap_heading_image_section',
        )
        ));
        
        /* heading image max width */
        $wp_customize->add_setting('taptap_heading_image_max_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_max_width',));
        function sanitize_taptap_heading_image_max_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_max_width',array('type' => 'text','label' => 'Maximum width','description' => '','section' => 'taptap_heading_image_section',));
        
        /* heading image link */
        $wp_customize->add_setting('taptap_heading_image_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_link',));
        function sanitize_taptap_heading_image_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_link',array('type' => 'text','label' => 'Link','description' => '','section' => 'taptap_heading_image_section',));
        
        /* heading image new window */
        $wp_customize->add_setting('taptap_heading_image_new_window',array('sanitize_callback' => 'sanitize_taptap_heading_image_new_window',));
        function sanitize_taptap_heading_image_new_window( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_heading_image_new_window',array('type' => 'checkbox','label' => 'Open in new window/tab','section' => 'taptap_heading_image_section',));
        
        /* heading image top margin */
        $wp_customize->add_setting('taptap_heading_image_top_margin',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_top_margin',));
        function sanitize_taptap_heading_image_top_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_top_margin',array('type' => 'text','label' => 'Top margin (in pixels)','description' => '','section' => 'taptap_heading_image_section',));
        
        /* heading image bottom margin */
        $wp_customize->add_setting('taptap_heading_image_bottom_margin',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_bottom_margin',));
        function sanitize_taptap_heading_image_bottom_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_bottom_margin',array('type' => 'text','label' => 'Bottom margin (in pixels)','description' => '','section' => 'taptap_heading_image_section',));

        //
        // ADD "Menu & Submenu" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_submenu_section',array('title' => __( 'Menu & Submenu Items', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* Alternate submenu activation */
        $wp_customize->add_setting('taptap_alternate_submenu_activation',array('sanitize_callback' => 'sanitize_taptap_alternate_submenu_activation',));
        function sanitize_taptap_alternate_submenu_activation( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_alternate_submenu_activation',array('type' => 'checkbox','label' => 'Alternate submenu activation','description' => 'Make entire top-level menu item open the submenu. If unchecked, only the arrow icon opens submenu','section' => 'taptap_menu_submenu_section',));
        
        /* Close menu after click */
        $wp_customize->add_setting('taptap_close_menu_on_click',array('sanitize_callback' => 'sanitize_taptap_close_menu_on_click',));
        function sanitize_taptap_close_menu_on_click( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_close_menu_on_click',array('type' => 'checkbox','label' => 'Close menu after click','description' => 'Close menu when menu item is clicked/tapped (useful on one-page websites where menu links lead to anchors, not new pages).','section' => 'taptap_menu_submenu_section',));
        
        /* menu item font size */
        $wp_customize->add_setting('taptap_menu_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_font_size',));
        function sanitize_taptap_menu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_font_size',array('type' => 'text','label' => 'Menu item font size (in pixels)','description' => 'If empty, defaults to 14','section' => 'taptap_menu_submenu_section',));
        
        /* submenu item font size */
        $wp_customize->add_setting('taptap_submenu_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_font_size',));
        function sanitize_taptap_submenu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_font_size',array('type' => 'text','label' => 'Submenu item font size (in pixels)','description' => 'If empty, defaults to 13','section' => 'taptap_menu_submenu_section',));
        
        /* menu item vertical spacing */
        $wp_customize->add_setting('taptap_menu_vertical_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_vertical_spacing',));
        function sanitize_taptap_menu_vertical_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_vertical_spacing',array('type' => 'text','label' => 'Menu items vertical spacing (in pixels)','description' => 'Enter custom value to increase spacing between between menu items.','section' => 'taptap_menu_submenu_section',));
        
        /* submenu item vertical spacing */
        $wp_customize->add_setting('taptap_submenu_vertical_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_vertical_spacing',));
        function sanitize_taptap_submenu_vertical_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_vertical_spacing',array('type' => 'text','label' => 'Submenu items vertical spacing (in pixels)','description' => 'Enter custom value to increase spacing between between submenu items.','section' => 'taptap_menu_submenu_section',));
        
        /* menu item letter spacing */
        $wp_customize->add_setting('taptap_menu_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_letter_spacing',));
        function sanitize_taptap_menu_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_letter_spacing',array('type' => 'text','label' => 'Menu items letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_submenu_section',));
        
        /* submenu item letter spacing */
        $wp_customize->add_setting('taptap_submenu_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_letter_spacing',));
        function sanitize_taptap_submenu_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_letter_spacing',array('type' => 'text','label' => 'Submenu items letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_submenu_section',));
        
        /* menu item color */
        $wp_customize->add_setting( 'taptap_menu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_color',array(
            'label' => 'Menu item', 'settings' => 'taptap_menu_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item color (current) */
        $wp_customize->add_setting( 'taptap_menu_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_color_current',array(
            'label' => 'Menu item (current)', 'settings' => 'taptap_menu_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item hover color */
        $wp_customize->add_setting( 'taptap_menu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_hover_color',array(
            'label' => 'Menu item hover', 'settings' => 'taptap_menu_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item hover color (current) */
        $wp_customize->add_setting( 'taptap_menu_hover_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_hover_color_current',array(
            'label' => 'Menu item hover (current)', 'settings' => 'taptap_menu_hover_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item color */
        $wp_customize->add_setting( 'taptap_submenu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_color',array(
            'label' => 'Submenu item', 'settings' => 'taptap_submenu_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item color (current) */
        $wp_customize->add_setting( 'taptap_submenu_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_color_current',array(
            'label' => 'Submenu item (current)', 'settings' => 'taptap_submenu_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item hover color */
        $wp_customize->add_setting( 'taptap_submenu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_hover_color',array(
            'label' => 'Submenu item hover', 'settings' => 'taptap_submenu_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item hover color (current) */
        $wp_customize->add_setting( 'taptap_submenu_hover_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_hover_color_current',array(
            'label' => 'Submenu item hover (current)', 'settings' => 'taptap_submenu_hover_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));

        /* submenu arrow color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_color',array(
            'label' => 'Submenu arrow', 'settings' => 'taptap_submenu_arrow_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu arrow hover color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_hover_color',array(
            'label' => 'Submenu arrow (hover)', 'settings' => 'taptap_submenu_arrow_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu arrow divider color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_divider_color',array(
            'label' => 'Submenu arrow divider', 'settings' => 'taptap_submenu_arrow_divider_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item font */
        $wp_customize->add_setting('taptap_menu_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_menu_submenu_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* menu item theme font */
        $wp_customize->add_setting('taptap_menu_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_theme_font',));
        function sanitize_taptap_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_menu_submenu_section',));
        
        /* submenu arrow position (top-level items) */
        $wp_customize->add_setting('taptap_menu_arrow_alignment',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_arrow_alignment',));
        function sanitize_taptap_menu_arrow_alignment($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_arrow_alignment',array('type' => 'text','label' => 'Submenu arrow position (top-level items, in pixels)','description' => 'At certain settings, the arrow next to a top-level menu item may need to be vertically re-aligned. If you find the it to be misaligned, enter a number here to nudge it into position. Example: 5','section' => 'taptap_menu_submenu_section',));
        
        /* submenu arrow position (submenu items) */
        $wp_customize->add_setting('taptap_submenu_arrow_alignment',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_arrow_alignment',));
        function sanitize_taptap_submenu_arrow_alignment($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_arrow_alignment',array('type' => 'text','label' => 'Submenu arrow position (submenu items, in pixels)','description' => 'At certain settings, the arrow next to a sublevel menu item may need to be vertically re-aligned. If you find the it to be misaligned, enter a number here to nudge it into position. Example: 5','section' => 'taptap_menu_submenu_section',));

        //
        // ADD "Menu Item Descriptions" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_description_section',array('title' => __( 'Menu Item Descriptions', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* menu item description font size */
        $wp_customize->add_setting('taptap_menu_description_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_font_size',));
        function sanitize_taptap_menu_description_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_font_size',array('type' => 'text','label' => 'Menu description font size (in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_menu_description_section',));
        
        /* menu item description color */
        $wp_customize->add_setting( 'taptap_menu_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_description_color',array(
            'label' => 'Menu item description', 'settings' => 'taptap_menu_description_color', 'section' => 'taptap_menu_description_section' )
        ));
        
        /* menu item description top padding */
        $wp_customize->add_setting('taptap_menu_description_top_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_top_padding',));
        function sanitize_taptap_menu_description_top_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_top_padding',array('type' => 'text','label' => 'Menu description top padding (in pixels)','description' => 'Enter custom value to increase top spacing around menu item description.','section' => 'taptap_menu_description_section',));
        
        /* menu item description bottom padding */
        $wp_customize->add_setting('taptap_menu_description_bottom_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_bottom_padding',));
        function sanitize_taptap_menu_description_bottom_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_bottom_padding',array('type' => 'text','label' => 'Menu description bottom padding (in pixels)','description' => 'Enter custom value to increase bottom spacing around menu item description.','section' => 'taptap_menu_description_section',));
        
        /* menu item description line height */
        $wp_customize->add_setting('taptap_menu_description_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_line_height',));
        function sanitize_taptap_menu_description_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_line_height',array('type' => 'text','label' => 'Menu description line height (in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_menu_description_section',));
        
        /* menu item description letter spacing */
        $wp_customize->add_setting('taptap_menu_description_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_letter_spacing',));
        function sanitize_taptap_menu_description_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_letter_spacing',array('type' => 'text','label' => 'Menu description letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_description_section',));
        
        /* menu item description font */
        $wp_customize->add_setting('taptap_menu_description_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_description_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_menu_description_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));
        
        /* menu item description theme font */
        $wp_customize->add_setting('taptap_menu_description_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_theme_font',));
        function sanitize_taptap_menu_description_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_menu_description_section',));

        //
        // ADD "Menu Icons" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_icon_section',array('title' => __( 'Menu Icons', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* menu item icon size */
        $wp_customize->add_setting('taptap_menu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_icon_size',));
        function sanitize_taptap_menu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_icon_size',array('type' => 'text','label' => 'Icon size (top-level items, in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_menu_icon_section',));

        /* submenu item icon size */
        $wp_customize->add_setting('taptap_submenu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_icon_size',));
        function sanitize_taptap_submenu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_icon_size',array('type' => 'text','label' => 'Icon size (submenu items, in pixels)','description' => 'If empty, defaults to 11','section' => 'taptap_menu_icon_section',));

        /* menu item icon position */
        $wp_customize->add_setting('taptap_menu_icon_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_icon_position',));
        function sanitize_taptap_menu_icon_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_icon_position',array('type' => 'text','label' => 'Icon position (top-level items, in pixels)','description' => 'If you have set custom icon and text sizes that are radically different from one another, the icon next to a top-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position.','section' => 'taptap_menu_icon_section',));

        /* submenu item icon position */
        $wp_customize->add_setting('taptap_submenu_icon_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_icon_position',));
        function sanitize_taptap_submenu_icon_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_icon_position',array('type' => 'text','label' => 'Icon position (submenu items, in pixels)','description' => 'If you have set custom icon and text sizes that are radically different from one another, the icon next to a sub-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position.','section' => 'taptap_menu_icon_section',));
        
        /* icon color */
        $wp_customize->add_setting( 'taptap_menu_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_icon_color',array(
            'label' => 'Icon', 'settings' => 'taptap_menu_icon_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* icon hover color */
        $wp_customize->add_setting( 'taptap_menu_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_icon_hover_color',array(
            'label' => 'Icon hover', 'settings' => 'taptap_menu_icon_hover_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* submenu icon color */
        $wp_customize->add_setting( 'taptap_submenu_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_icon_color',array(
            'label' => 'Submenu icon', 'settings' => 'taptap_submenu_icon_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* submenu icon hover color */
        $wp_customize->add_setting( 'taptap_submenu_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_icon_hover_color',array(
            'label' => 'Submenu icon hover', 'settings' => 'taptap_submenu_icon_hover_color', 'section' => 'taptap_menu_icon_section' )
        ));

        //
        // ADD "Widgets" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_widget_section',array('title' => __( 'Widgets', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* widgets top distance */
        $wp_customize->add_setting('taptap_widget_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_top_distance',));
        function sanitize_taptap_widget_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_top_distance',array('type' => 'text','label' => 'Top distance (in pixels)','description' => 'Useful if you would like to have more space between the menu and widget area. If empty, defaults to 30','section' => 'taptap_menu_widget_section',));

        /* widget title font size */
        $wp_customize->add_setting('taptap_widget_title_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_font_size',));
        function sanitize_taptap_widget_title_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_font_size',array('type' => 'text','label' => 'Title font size (in pixels)','description' => 'If empty, defaults to 12','section' => 'taptap_menu_widget_section',));

        /* widget title letter spacing */
        $wp_customize->add_setting('taptap_widget_title_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_letter_spacing',));
        function sanitize_taptap_widget_title_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_letter_spacing',array('type' => 'text','label' => 'Title letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_widget_section',));

        /* widget title letter spacing */
        $wp_customize->add_setting('taptap_widget_title_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_line_height',));
        function sanitize_taptap_widget_title_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_line_height',array('type' => 'text','label' => 'Title line height (in pixels)','description' => 'If empty, defaults to 12','section' => 'taptap_menu_widget_section',));

        /* widget title font */
        $wp_customize->add_setting('taptap_widget_title_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_widget_title_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_menu_widget_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));

        /* widget title theme font */
        $wp_customize->add_setting('taptap_widget_title_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_theme_font',));
        function sanitize_taptap_widget_title_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_theme_font',array('type' => 'text','label' => 'Title advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_menu_widget_section',));

        /* widget font size */
        $wp_customize->add_setting('taptap_widget_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_font_size',));
        function sanitize_taptap_widget_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_font_size',array('type' => 'text','label' => 'Font size (in pixels)','description' => 'If empty, defaults to 12','section' => 'taptap_menu_widget_section',));

        /* widget letter spacing */
        $wp_customize->add_setting('taptap_widget_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_letter_spacing',));
        function sanitize_taptap_widget_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_letter_spacing',array('type' => 'text','label' => 'Letter spacing (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_menu_widget_section',));

        /* widget line height */
        $wp_customize->add_setting('taptap_widget_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_line_height',));
        function sanitize_taptap_widget_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_line_height',array('type' => 'text','label' => 'Line height (in pixels)','description' => 'If empty, defaults to 16','section' => 'taptap_menu_widget_section',));

        /* widget font */
        $wp_customize->add_setting('taptap_widget_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_widget_font',array(
            'type' => 'select',
            'label' => 'Font',
            'section' => 'taptap_menu_widget_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
        ),
        ));

        /* widget theme font */
        $wp_customize->add_setting('taptap_widget_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_theme_font',));
        function sanitize_taptap_widget_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_theme_font',array('type' => 'text','label' => 'Advanced feature: Use theme fonts','description' => 'If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','section' => 'taptap_menu_widget_section',));
        
        /* widget title color */
        $wp_customize->add_setting( 'taptap_widget_title_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_title_color',array(
            'label' => 'Widget title', 'settings' => 'taptap_widget_title_color', 'section' => 'taptap_menu_widget_section' )
        ));
        
        /* widget text color */
        $wp_customize->add_setting( 'taptap_widget_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_text_color',array(
            'label' => 'Widget text', 'settings' => 'taptap_widget_text_color', 'section' => 'taptap_menu_widget_section' )
        ));
        
        /* widget link color */
        $wp_customize->add_setting( 'taptap_widget_link_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_link_color',array(
            'label' => 'Widget link', 'settings' => 'taptap_widget_link_color', 'section' => 'taptap_menu_widget_section' )
        ));

        //
        // ADD "Styled Scrollbar" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_scrollbar_section',array('title' => __( 'Styled Scrollbar', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* show styled scrollbar */
        $wp_customize->add_setting('taptap_styled_scrollbar',array('sanitize_callback' => 'sanitize_taptap_styled_scrollbar',));
        function sanitize_taptap_styled_scrollbar( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_styled_scrollbar',array('type' => 'checkbox','label' => 'Enable styled scrollbar','description' => 'If ticked, the menu will have a styled scrollbar. Applied on desktop only. On mobile, native scroll of a device is used.', 'section' => 'taptap_scrollbar_section',));
        
        /* show on mouseover only */
        $wp_customize->add_setting('taptap_styled_scrollbar_hover_only',array('sanitize_callback' => 'sanitize_taptap_styled_scrollbar_hover_only',));
        function sanitize_taptap_styled_scrollbar_hover_only( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_styled_scrollbar_hover_only',array('type' => 'checkbox','label' => 'Show on mouseover only','description' => 'If ticked, the scrollbar will be shown only when mouse is over the menu area.', 'section' => 'taptap_scrollbar_section',));
        
        /* scrollbar distance */
        $wp_customize->add_setting('taptap_styled_scrollbar_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_distance',));
        function sanitize_taptap_styled_scrollbar_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_distance',array('type' => 'text','label' => 'Distance from sides (in pixels)','description' => 'If empty, defaults to 3','section' => 'taptap_scrollbar_section',));
        
        /* scrollbar thickness */
        $wp_customize->add_setting('taptap_styled_scrollbar_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_width',));
        function sanitize_taptap_styled_scrollbar_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_width',array('type' => 'text','label' => 'Thickness (in pixels)','description' => 'If empty, defaults to 5','section' => 'taptap_scrollbar_section',));
        
        /* rounded corners */
        $wp_customize->add_setting('taptap_styled_scrollbar_rounded',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_rounded',));
        function sanitize_taptap_styled_scrollbar_rounded($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_rounded',array('type' => 'text','label' => 'Corner roundness (in pixels)','description' => 'If empty, defaults to 0','section' => 'taptap_scrollbar_section',));
        
        /* scrollbar color */
        $wp_customize->add_setting('taptap_styled_scrollbar_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_color',array(
            'label' => 'Scrollbar','settings' => 'taptap_styled_scrollbar_color','section' => 'taptap_scrollbar_section' )
        ));
        
        /* scrollbar color (when dragged) */
        $wp_customize->add_setting('taptap_styled_scrollbar_color_dragged',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_color_dragged',array(
            'label' => 'Scrollbar (when dragged)','settings' => 'taptap_styled_scrollbar_color_dragged','section' => 'taptap_scrollbar_section' )
        ));
        
        /* scrollbar background color */
        $wp_customize->add_setting('taptap_styled_scrollbar_background_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_background_color',array(
            'label' => 'Scrollbar background','settings' => 'taptap_styled_scrollbar_background_color','section' => 'taptap_scrollbar_section' )
        ));
        
        //
        // ADD "Content Animation" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_content_animation_section',array('title' => __( 'Content Animation', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* elements to animate */
        $wp_customize->add_setting('taptap_content_animation_elements',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_elements',));
        function sanitize_taptap_content_animation_elements($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_elements',array('type' => 'text','label' => 'Enter elements to animate (*required for animation to kick in)','description' => 'Enter the classes/IDs of the elements you wish to animate, separate with comma like you would in a stylesheet. Example: "#my-content, .content-wrapper"','section' => 'taptap_content_animation_section',));
        
        /* scaling */
        $wp_customize->add_setting('taptap_content_animation_scale',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_scale',));
        function sanitize_taptap_content_animation_scale($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_scale',array('type' => 'text','label' => 'Scaling','description' => 'To scale down, enter number smaller than 1. To scale up, enter number higher than 1. Example: 0.8 or 1.25. If empty, defaults to 0.95','section' => 'taptap_content_animation_section',));
        
        /* opacity */
        $wp_customize->add_setting('taptap_content_animation_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_opacity',));
        function sanitize_taptap_content_animation_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_opacity',array('type' => 'text','label' => 'Opacity','description' => 'Example: 0.6 or 0.75. If empty, defaults to 1','section' => 'taptap_content_animation_section',));
        
        /* blur */
        $wp_customize->add_setting('taptap_content_blur',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_blur',));
        function sanitize_taptap_content_blur($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_blur',array('type' => 'text','label' => 'Blur','description' => 'Example: 5 or 10. If empty, blur effect disabled','section' => 'taptap_content_animation_section',));
        
        /* blur on mobile only */
        $wp_customize->add_setting('taptap_content_blur_mobile',array('sanitize_callback' => 'sanitize_taptap_content_blur_mobile',));
        function sanitize_taptap_content_blur_mobile( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_content_blur_mobile',array('type' => 'checkbox','label' => 'Show blur effect on touch devices only','description' => 'Due to possible rendering issues in current versions of Chrome (the effect may cause a noticeable flicker when applied), you may want to show the blur effect on touch devices only, where it is much more reliable.', 'section' => 'taptap_content_animation_section',));

        //
        // ADD "Misc" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_misc_section',array('title' => __( 'Misc', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* enable smart scroll */
        $wp_customize->add_setting('taptap_enable_smart_scroll',array('sanitize_callback' => 'sanitize_taptap_enable_smart_scroll',));
        function sanitize_taptap_enable_smart_scroll( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_enable_smart_scroll',array('type' => 'checkbox','label' => 'Enable smart scroll','description' => 'If ticked, header elements will hide when scrolled downwards and become visible again when scrolled upwards.', 'section' => 'taptap_misc_section',));
        
        /* open on front page */
        $wp_customize->add_setting('taptap_open_on_front_page',array('sanitize_callback' => 'sanitize_taptap_open_on_front_page',));
        function sanitize_taptap_open_on_front_page( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_open_on_front_page',array('type' => 'checkbox','label' => 'Open on front page?','description' => 'If ticked, menu is open by default on the front page.', 'section' => 'taptap_misc_section',));
        
        /* body scroll lock */
        $wp_customize->add_setting('taptap_body_scroll_lock',array('sanitize_callback' => 'sanitize_taptap_body_scroll_lock',));
        function sanitize_taptap_body_scroll_lock( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_body_scroll_lock',array('type' => 'checkbox','label' => 'Lock body scroll','description' => 'If ticked, the body scroll will be disabled when menu is opened (unless scrolling is handled in an unusual way by the theme).', 'section' => 'taptap_misc_section',));
        
        /* show submenu when current */
        $wp_customize->add_setting('taptap_current_menu_open',array('sanitize_callback' => 'sanitize_taptap_current_menu_open',));
        function sanitize_taptap_current_menu_open( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_current_menu_open',array('type' => 'checkbox','label' => 'Show submenu when current','description' => 'Open submenu by default when the menu item linking to current page resides inside.', 'section' => 'taptap_misc_section',));
        
        /* absolute positioning */
        $wp_customize->add_setting('taptap_absolute_position',array('sanitize_callback' => 'sanitize_taptap_absolute_position',));
        function sanitize_taptap_absolute_position( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_absolute_position',array('type' => 'checkbox','label' => 'Absolute positioning','description' => 'If ticked, the menu/search buttons and logo leave the screen when scrolled.', 'section' => 'taptap_misc_section',));
        
        /* header, search above menu */
        $wp_customize->add_setting('taptap_header_above_menu',array('sanitize_callback' => 'sanitize_taptap_header_above_menu',));
        function sanitize_taptap_header_above_menu( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_header_above_menu',array('type' => 'checkbox','label' => 'Show header elements above menu','description' => 'If ticked, the logo and search button will be visible when menu is open. If left unchecked, they will appear behind the menu.', 'section' => 'taptap_misc_section',));
        
        /* push down site */
        $wp_customize->add_setting('taptap_push_down_site',array('sanitize_callback' => 'sanitize_taptap_push_down_site',));
        function sanitize_taptap_push_down_site( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_push_down_site',array('type' => 'checkbox','label' => 'Push down site','description' => 'If ticked, your site will be pushed down by the height of the TapTap menu.', 'section' => 'taptap_misc_section',));

        /* don't load FontAwesome */
        $wp_customize->add_setting('taptap_no_fontawesome',array('sanitize_callback' => 'sanitize_taptap_no_fontawesome',));
        function sanitize_taptap_no_fontawesome( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_fontawesome',array('type' => 'checkbox','label' => 'Do not load FontAwesome icon set','description' => 'Useful if you do not use any icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.','section' => 'taptap_misc_section',));
        
        /* enable retina.js */
        $wp_customize->add_setting('taptap_no_retina',array('sanitize_callback' => 'sanitize_taptap_no_retina',));
        function sanitize_taptap_no_retina( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_retina',array('type' => 'checkbox','label' => 'Enable retina script support for logo/heading image','description' => 'Please note: can potentially cause a conflict with some elements in some themes. To display image as retina when this script is disabled, simply upload the image twice as large (example: if image file height is 150, set the height value as 75).','section' => 'taptap_misc_section',));

        /* smaller than */
        $wp_customize->add_setting('taptap_smaller_than',array('sanitize_callback' => 'sanitize_taptap_smaller_than',));
        function sanitize_taptap_smaller_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_smaller_than',array(
            'type' => 'text',
            'label' => 'Hide at certain width/resolution',
            'description' => '<strong>Example #1:</strong> If you want to show TapTap on desktop only, enter the values as 0 and 500. <br><br> <strong>Example #2:</strong> If you want to show TapTap on mobile only, enter the values as 500 and 5000. <br><br> Feel free to experiment with your own values to get the result that is right for you. If fields are empty, TapTap will be visible at all browser widths and resolutions. <br><br> Hide TapTap menu if browser width or screen resolution (in pixels) is between...',
            'section' => 'taptap_misc_section',
        ));
        
        /* larger than */
        $wp_customize->add_setting('taptap_larger_than',array('sanitize_callback' => 'sanitize_taptap_larger_than',));
        function sanitize_taptap_larger_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_larger_than',array(
            'type' => 'text',
            'description' => '..and:',
            'section' => 'taptap_misc_section',
        ));
        
        /* hide theme menu */
        $wp_customize->add_setting('taptap_hide_theme_menu',array('sanitize_callback' => 'sanitize_taptap_hide_theme_menu',));
        function sanitize_taptap_hide_theme_menu($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hide_theme_menu',array(
            'type' => 'text',
            'label' => 'Advanced: Hide theme menu',
            'description' => 'If you have set TapTap to show only at a certain resolution, know the class/ID of your theme menu and would like to hide it when TapTap is visible, enter the class/ID into this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet).',
            'section' => 'taptap_misc_section',
        ));
        
    }
	add_action('customize_register', 'taptap_theme_customizer');

	//
	// Add menu to theme (unless hidden on specified posts/pages)
	//
    
	function bonfire_taptap_footer() {
        if( is_singular() ) {
            $meta_value = get_post_meta( get_the_ID(), 'taptap-hide-checkbox', true );
            if( empty( $meta_value ) ) {
                include( plugin_dir_path( __FILE__ ) . 'include.php');
            }
        } else {
            include( plugin_dir_path( __FILE__ ) . 'include.php');
        }
	}
	add_action('wp_footer','bonfire_taptap_footer');

	//
	// ADD the walker class (for menu descriptions)
	//
	
	class TapTap_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '<div class="taptap-menu-item-description">' . $item->description . '</div>';
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
	}

	//
	// ENQUEUE taptap.css
	//
	function bonfire_taptap_css() {
        wp_register_style( 'bonfire-taptap-css', plugins_url( '/taptap.css', __FILE__ ) . '', array(), '1', 'all' );
        wp_enqueue_style( 'bonfire-taptap-css' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_css' );

	//
	// ENQUEUE taptap-accordion.js
	//
	function bonfire_taptap_accordion() {
        if(get_theme_mod('taptap_alternate_submenu_activation')) {
            wp_register_script( 'bonfire-taptap-accordion-full-link', plugins_url( '/taptap-accordion-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-accordion-full-link' );
        } else {
            wp_register_script( 'bonfire-taptap-accordion', plugins_url( '/taptap-accordion.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-accordion' );
        }
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_accordion' );
	
	//
	// ENQUEUE taptap.js
	//
	function bonfire_taptap_js() {
        wp_register_script( 'bonfire-taptap-js', plugins_url( '/taptap.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
        wp_enqueue_script( 'bonfire-taptap-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_js' );
	
	//
	// ENQUEUE taptap-close-on-click.js
	//
    if(get_theme_mod('taptap_close_menu_on_click')) {
		function bonfire_taptap_close_on_click_js() {
            if(get_theme_mod('taptap_alternate_submenu_activation')) {
                wp_register_script( 'bonfire-taptap-close-on-click-js-full-link', plugins_url( '/taptap-close-on-click-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-taptap-close-on-click-js-full-link' );
            } else {
                wp_register_script( 'bonfire-taptap-close-on-click-js', plugins_url( '/taptap-close-on-click.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-taptap-close-on-click-js' );
            }
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_taptap_close_on_click_js' );
	}
    
    //
	// ENQUEUE retina.min.js
	//
    if(get_theme_mod('taptap_no_retina') != '') {
        function bonfire_taptap_retina_js() {
            wp_register_script( 'bonfire-taptap-retina-js', plugins_url( '/retina.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-retina-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_retina_js' );
    }

    //
	// ENQUEUE taptap-body-scroll-lock.js
	//
    if(get_theme_mod('taptap_body_scroll_lock') != '') {
        function bonfire_taptap_body_scroll_lock_js() {
            wp_register_script( 'bonfire-taptap-body-scroll-lock-js', plugins_url( '/taptap-body-scroll-lock.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
            wp_enqueue_script( 'bonfire-taptap-body-scroll-lock-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_body_scroll_lock_js' );
    }
    
    //
	// ENQUEUE taptap-smart-scroll.js
	//
    if(get_theme_mod('taptap_enable_smart_scroll') != '') {
        function bonfire_taptap_smart_scroll_js() {
            wp_register_script( 'bonfire-taptap-smart-scroll-js', plugins_url( '/taptap-smart-scroll.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
            wp_enqueue_script( 'bonfire-taptap-smart-scroll-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_smart_scroll_js' );
    }
    
    //
	// ENQUEUE jquery.scrollbar.min.js (except on touch devices)
	//
    if(get_theme_mod('taptap_styled_scrollbar') != '') {
        function bonfire_taptap_scrollbar_js() {
            if ( wp_is_mobile() ) { } else {
                wp_register_script( 'bonfire-taptap-scrollbar-js', plugins_url( '/jquery.scrollbar.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                wp_enqueue_script( 'bonfire-taptap-scrollbar-js' );
            }
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_scrollbar_js' );
    }
    
    //
	// ENQUEUE Google WebFonts
	//
    function taptap_fonts_url() {
        $font_url = '';

        if ( 'off' !== _x( 'on', 'Google font: on or off', 'taptap' ) ) {
            $font_url = add_query_arg( 'family', urlencode( 'Montserrat:400,700|Varela Round|Hind Siliguri:400,600|Dosis:600|Roboto:100,400|Roboto Condensed:400,700|Bree Serif|Droid Serif:400' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
	}
	function bonfire_taptap_font() {
		wp_enqueue_style( 'taptap-fonts', taptap_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_font' );

	//
	// Enqueue font-awesome.min.css (icons for menu, if option to hide not enabled)
	//
    if(get_theme_mod('taptap_no_fontawesome') == '') {
		function bonfire_taptap_fontawesome() {
            wp_register_style( 'taptap-fontawesome', plugins_url( '/fonts/font-awesome/css/font-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'taptap-fontawesome' );
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_taptap_fontawesome' );
	}

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'taptap-by-bonfire' => ( 'TapTap, by Bonfire' ),
		) );
	}
	
    //
	// Add 'Settings' link to plugin page
	//
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'taptap_add_action_links' );
    function taptap_add_action_links ( $links ) {
        $mylinks = array(
        '<a href="' . admin_url( 'customize.php?autofocus[panel]=taptap_panel' ) . '">Settings</a>',
        );
    return array_merge( $links, $mylinks );
    }
    
	//
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');
	
	//
	// Register Widgets
	//
	function bonfire_taptap_widgets_init() {

		register_sidebar( array(
		'name' => __( 'TapTap Widgets (above menu)', 'bonfire' ),
		'id' => 'taptap-widgets-above',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
        
        register_sidebar( array(
		'name' => __( 'TapTap Widgets (below menu)', 'bonfire' ),
		'id' => 'taptap-widgets',
		'description' => __( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_taptap_widgets_init' );

	//
	// Insert theme customizer options into the footer
	//
	function bonfire_taptap_header_customize() {

		if( is_singular() ) {
            $meta_value = get_post_meta( get_the_ID(), 'taptap-hide-checkbox', true );
            if( empty( $meta_value ) ) {
                include( plugin_dir_path( __FILE__ ) . 'include-styles.php');
            }
        } else {
            include( plugin_dir_path( __FILE__ ) . 'include-styles.php');
        }

	}
	add_action('wp_head','bonfire_taptap_header_customize');
    
    //
    // Hide TapTap on specific posts/pages
    //
    function taptap_hide_custom_meta() {
        add_meta_box( 'taptap_hide', __( 'TapTap plugin', 'taptap' ), 'taptap_meta_callback', 'post', 'normal', 'high' );
        add_meta_box( 'taptap_hide', __( 'TapTap plugin', 'taptap' ), 'taptap_meta_callback', 'page', 'normal', 'high' );
    }
    add_action( 'add_meta_boxes', 'taptap_hide_custom_meta' );
    // Output
    function taptap_meta_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'taptap_nonce' );
        $taptap_stored_meta = get_post_meta( $post->ID );
        ?>
    
        <p>
            <div class="taptap-row-content">
                <label for="taptap-hide-checkbox">
                    <input type="checkbox" name="taptap-hide-checkbox" id="taptap-hide-checkbox" value="yes" <?php if ( isset ( $taptap_stored_meta['taptap-hide-checkbox'] ) ) checked( $taptap_stored_meta['taptap-hide-checkbox'][0], 'yes' ); ?> />
                    <?php _e( 'Hide TapTap menu on this post/page', 'taptap' )?>
                </label>
            </div>
        </p>
    
        <?php
    }
    // Save
    function taptap_hide_save( $post_id ) {
    
        // Check save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'taptap_nonce' ] ) && wp_verify_nonce( $_POST[ 'taptap_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
        // Exit script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
    
        // Check input and sanitize/save if needed
        if( isset( $_POST[ 'meta-text' ] ) ) {
            update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
        }
        
        // Check input and save
        if( isset( $_POST[ 'taptap-hide-checkbox' ] ) ) {
            update_post_meta( $post_id, 'taptap-hide-checkbox', 'yes' );
        } else {
            update_post_meta( $post_id, 'taptap-hide-checkbox', '' );
        }
    
    }
    add_action( 'save_post', 'taptap_hide_save' );

?>