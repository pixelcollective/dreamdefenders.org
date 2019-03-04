<!-- BEGIN MENU BUTTON -->
<div class="taptap-menu-button-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?><?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?> taptap-menu-active<?php } ?>">
    
    <!-- BEGIN MENU BUTTON LABEL (if one is entered) -->
    <?php if(get_theme_mod('taptap_menu_button_label') != '') { ?>
    <div class="taptap-menu-button-label">
        <?php echo get_theme_mod('taptap_menu_button_label'); ?>
    </div>
    <?php } ?>
    <!-- END MENU BUTTON LABEL (if one is entered) -->
    
    <!-- BEGIN MENU BUTTON STYLES -->
    <?php if(get_theme_mod('taptap_hide_menu_button') == '') { ?>
        <?php $bonfire_taptap_menu_button_style = get_theme_mod( 'taptap_menu_button_style' ); if( $bonfire_taptap_menu_button_style == '' ) { 
            echo '
            <div class="taptap-main-menu-button">
                <div class="taptap-main-menu-button-middle"></div>
            </div>
            ';
        }
        else if( $bonfire_taptap_menu_button_style != '' ) { switch ( $bonfire_taptap_menu_button_style ) {
        case 'style1':
        echo '
            <div class="taptap-main-menu-button">
                <div class="taptap-main-menu-button-middle"></div>
            </div>
        ';
        break; case 'style2':
        echo '
            <div class="taptap-main-menu-button-two">
                <div class="taptap-main-menu-button-two-middle"></div>
            </div>
        ';
        break; case 'style3':
        echo '
            <div class="taptap-main-menu-button-three">
                <div class="taptap-main-menu-button-three-middle"></div>
            </div>
        ';
        break; case 'style4':
        echo '
            <div class="taptap-main-menu-button-four">
                <div class="taptap-main-menu-button-four-middle"></div>
            </div>
        ';
        break; case 'style5':
        echo '
            <div class="taptap-main-menu-button-five">
                <div class="taptap-main-menu-button-five-middle"></div>
            </div>
        ';
        break; case 'style6':
        echo '
            <div class="taptap-main-menu-button-six">
            </div>
        ';
        break; }} ?>
        <!-- END MENU BUTTON STYLES -->
    <?php } ?>
</div>
<!-- END MENU BUTTON -->

<!-- BEGIN SEARCH BUTTON -->
<div class="taptap-search-button-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?>">
    <!-- BEGIN SEARCH BUTTON LABEL (if one is entered) -->
    <?php if(get_theme_mod('taptap_search_button_label') != '') { ?>
    <div class="taptap-search-button-label">
        <?php echo get_theme_mod('taptap_search_button_label'); ?>
    </div>
    <?php } ?>
    <!-- END SEARCH BUTTON LABEL (if one is entered) -->
    
    <?php if(get_theme_mod('taptap_hide_search_button') == '') { ?>
    <div class="taptap-search-button"></div>
    <?php } ?>
</div>
<!-- END SEARCH BUTTON -->

<!-- BEGIN SEARCH FORM -->
<div class="taptap-search-wrapper<?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
        <!-- BEGIN SEARCH FORM CLOSE BUTTON -->
        <div class="taptap-search-close-wrapper">
            <div class="taptap-search-close-inner">
            </div>
        </div>
        <!-- END SEARCH FORM CLOSE BUTTON -->
        
        <!-- BEGIN SEARCH FORM CLEAR FIELD BUTTON -->
        <?php if(get_theme_mod('taptap_search_clear_field') == '') { ?>
        <div class="taptap-search-clear-wrapper">
            <div class="taptap-search-clear-inner">
                <div class="taptap-search-clear"></div>
            </div>
        </div>
        <?php } ?>
        <!-- END SEARCH FORM CLEAR FIELD BUTTON -->
    
        <form method="get" id="searchform" action="<?php echo esc_url( home_url('') ); ?>/">
            <input type="text" name="s" class="taptap-search-field" placeholder="<?php if(get_theme_mod('taptap_search_placeholder') != '') { ?><?php echo get_theme_mod('taptap_search_placeholder'); ?><?php } else { ?><?php _e( 'enter search term' , 'bonfire' ) ?><?php } ?>">
        </form>
</div>
<!-- END SEARCH FORM -->

<!-- BEGIN SEARCH FORM BACKGROUND -->
<div class="taptap-search-background<?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?><?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
</div>
<!-- END SEARCH FORM BACKGROUND -->

<!-- BEGIN SEARCH FORM OVERLAY -->
<div class="taptap-search-overlay">
</div>
<!-- END SEARCH FORM OVERLAY -->

<!-- BEGIN LOGO -->
<?php if(get_theme_mod('taptap_hide_logo') == '') { ?>
    <div class="taptap-logo-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?>">
        <?php if(get_theme_mod('taptap_logo_image')) : ?>
    
            <!-- BEGIN LOGO IMAGE -->
            <div class="taptap-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod('taptap_logo_image'); ?>" data-rjs="3" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            </div>
            <!-- END LOGO IMAGE -->
    
        <?php else : ?>
    
            <!-- BEGIN LOGO -->
            <div class="taptap-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            <!-- END LOGO -->
    
        <?php endif; ?>
    </div>
<?php } ?>
<!-- END LOGO -->

<!-- BEGIN HEADER BACKGROUND -->
<?php if(get_theme_mod('taptap_show_header') != '') { ?>
    <div class="taptap-header<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?><?php if(get_theme_mod('taptap_absolute_position') != '') { ?> taptap-absolute<?php } ?>">
    </div>
<?php } ?>
<!-- END HEADER BACKGROUND -->

<!-- BEGIN MENU BACKGROUND COLOR -->
<div class="taptap-background-color<?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?> taptap-background-color-active<?php } ?>">
</div>
<!-- END MENU BACKGROUND COLOR -->

<!-- BEGIN MENU BACKGROUND IMAGE -->
<?php if (get_theme_mod('taptap_background_image')) { ?>        
<div class="taptap-background-image<?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?> taptap-background-image-active<?php } ?>" style="background-image: url(<?php echo get_theme_mod('taptap_background_image'); ?>);">
</div>
<?php } ?>
<!-- END MENU BACKGROUND IMAGE -->

<!-- BEGIN BACKGROUND OVERELAY -->
<div class="taptap-background-overlay<?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?> taptap-background-overlay-active<?php } ?>">
</div>
<!-- END BACKGROUND OVERELAY -->

<!-- BEGIN MAIN WRAPPER -->
<div class="taptap-main-wrapper<?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?> taptap-main-wrapper-active<?php } ?>">
    <div class="taptap-main-inner">
        <div class="taptap-main">
            <div class="taptap-main-inner-inner<?php if ( is_admin_bar_showing() ) { ?> taptap-main-inner-inner-toolbar<?php } ?>">
                <div class="taptap-contents-wrapper">
                    <!-- BEGIN HEADING -->
                    <?php if(get_theme_mod('taptap_heading_text') != '') { ?>
                    <div class="taptap-heading">
                        <?php if(get_theme_mod('taptap_heading_link')) { ?>
                        <a href="<?php echo get_theme_mod('taptap_heading_link'); ?>">
                        <?php } ?>
                            <?php echo get_theme_mod('taptap_heading_text'); ?>
                        <?php if(get_theme_mod('taptap_heading_link')) { ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!-- END HEADING -->
                    
                    <!-- BEGIN SUBHEADING -->
                    <?php if(get_theme_mod('taptap_subheading_text') != '') { ?>
                    <div class="taptap-subheading">
                        <?php if(get_theme_mod('taptap_subheading_link')) { ?>
                        <a href="<?php echo get_theme_mod('taptap_subheading_link'); ?>">
                        <?php } ?>
                            <?php echo get_theme_mod('taptap_subheading_text'); ?>
                        <?php if(get_theme_mod('taptap_subheading_link')) { ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!-- END SUBHEADING -->

                    <!-- BEGIN IMAGE -->
                    <?php if(get_theme_mod('taptap_heading_image')) { ?>
                    <div class="taptap-image">
                        <?php if(get_theme_mod('taptap_heading_image_link')) { ?>
                        <a href="<?php echo get_theme_mod('taptap_heading_image_link'); ?>" <?php if(get_theme_mod('taptap_heading_image_new_window')) { ?>target="_blank"<?php } ?>>
                        <?php } ?>
                            <img src="<?php echo get_theme_mod('taptap_heading_image'); ?>" data-rjs="3">
                        <?php if(get_theme_mod('taptap_heading_image_link')) { ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!-- END IMAGE -->
                    
                    <!-- BEGIN WIDGETS (above menu) -->
                    <?php if ( is_active_sidebar( 'taptap-widgets-above' ) ) { ?>
                        <div class="taptap-widgets-wrapper">
                            <?php dynamic_sidebar( 'taptap-widgets-above' ); ?>
                        </div>
                    <?php } ?>	
                    <!-- END WIDGETS (above menu) -->
                    
                    <!-- BEGIN MENU -->
                    <?php $walker = new TapTap_Menu_Description; ?>
                    <?php wp_nav_menu( array( 'container_class' => 'taptap-by-bonfire', 'theme_location' => 'taptap-by-bonfire', 'walker' => $walker, 'fallback_cb' => '' ) ); ?>
                    <!-- END MENU -->
                    
                    <!-- BEGIN WIDGETS (below menu) -->
                    <?php if ( is_active_sidebar( 'taptap-widgets' ) ) { ?>
                        <div class="taptap-widgets-wrapper">
                            <?php dynamic_sidebar( 'taptap-widgets' ); ?>
                        </div>
                    <?php } ?>	
                    <!-- END WIDGETS (below menu) -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN WRAPPER -->

<!-- BEGIN SHOW SUBMENU WHEN CURRENT -->
<?php if(get_theme_mod('taptap_current_menu_open') != '') { ?>
<script>
jQuery(document).ready(function (jQuery) {
'use strict';
    jQuery(".taptap-by-bonfire .current-menu-ancestor").find(" > .sub-menu").slideDown(0);
    jQuery(".taptap-by-bonfire .current-menu-ancestor").find(" > span").addClass("taptap-submenu-active");
});
</script>
<?php } else { ?>
<script>
jQuery(document).ready(function (jQuery) {
'use strict';
    /* close sub-menus when menu button clicked */
    jQuery(".taptap-menu-button-wrapper").on('click', function(e) {
        jQuery(".taptap-by-bonfire .menu > li").find(".sub-menu").slideUp(300);
        jQuery(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").removeClass("taptap-submenu-active");
    })
    jQuery(document).keyup(function(e) {
        if (e.keyCode == 27) {
                jQuery(".taptap-by-bonfire .menu > li").find(".sub-menu").slideUp(300);
            jQuery(".taptap-by-bonfire .menu > li > span, .taptap-by-bonfire .sub-menu > li > span").removeClass("taptap-submenu-active");
        }
    });
});
</script>
<?php } ?>
<!-- END SHOW SUBMENU WHEN CURRENT -->

<!-- BEGIN IF RETINA ENABLED -->
<?php if(get_theme_mod('taptap_no_retina') != '') { ?>
<script>
retinajs(jQuery('.taptap-logo-image img, .taptap-image img'));
</script>
<?php } ?>
<!-- END IF RETINA ENABLED -->

<script>
jQuery('.taptap-menu-button-wrapper, .taptap-background-overlay, .taptap-custom-activator').on('click', function(e) {
'use strict';
	e.preventDefault();
		if(jQuery('.taptap-background-color').hasClass('taptap-background-color-active'))
		{
			/* hide main wrapper */
			jQuery('.taptap-main-wrapper').removeClass('taptap-main-wrapper-active');
			/* hide background color */
			jQuery('.taptap-background-color').removeClass('taptap-background-color-active');
			/* hide background image */
			jQuery('.taptap-background-image').removeClass('taptap-background-image-active');
            /* hide background overlay */
			jQuery('.taptap-background-overlay').removeClass('taptap-background-overlay-active');
			/* hide expanded menu button */
			jQuery('.taptap-menu-button-wrapper').removeClass('taptap-menu-active');
            /* remove content animation */
            <?php if( get_theme_mod('taptap_content_animation_elements') != '') { ?>
			jQuery('<?php echo get_theme_mod('taptap_content_animation_elements'); ?>').removeClass('taptap-content-animation-active');
            <?php } ?>
            /* show menu button label */
            <?php if( get_theme_mod('taptap_menu_button_hide') != '') { ?>
			jQuery('.taptap-menu-button-label').removeClass('taptap-menu-button-label-hide');
            <?php } ?>
		} else {
			/* show main wrapper */
			jQuery('.taptap-main-wrapper').addClass('taptap-main-wrapper-active');
			/* show background color */
			jQuery('.taptap-background-color').addClass('taptap-background-color-active');
			/* show background image */
			jQuery('.taptap-background-image').addClass('taptap-background-image-active');
            /* show background overlay */
			jQuery('.taptap-background-overlay').addClass('taptap-background-overlay-active');
			/* show expanded menu button */
			jQuery('.taptap-menu-button-wrapper').addClass('taptap-menu-active');
            /* add content animation */
            <?php if( get_theme_mod('taptap_content_animation_elements') != '') { ?>
			jQuery('<?php echo get_theme_mod('taptap_content_animation_elements'); ?>').addClass('taptap-content-animation-active');
            <?php } ?>
            /* hide menu button label */
            <?php if( get_theme_mod('taptap_menu_button_hide') != '') { ?>
			jQuery('.taptap-menu-button-label').addClass('taptap-menu-button-label-hide');
            <?php } ?>
		}
});

// BEGIN APPLY CONTANT ANIMATIONS IF OPEN ON FRONT PAGE BY DEFAULT
<?php if(get_theme_mod('taptap_open_on_front_page')!='' && is_front_page() ) { ?>
    <?php if( get_theme_mod('taptap_content_animation_elements') != '') { ?>
        jQuery('<?php echo get_theme_mod('taptap_content_animation_elements'); ?>').addClass('taptap-content-animation-active');
    <?php } ?>
<?php } ?>
// END APPLY CONTANT ANIMATIONS IF OPEN ON FRONT PAGE BY DEFAULT

// BEGIN HIDE MENU WHEN ESC BUTTON PRESSED
jQuery(document).keyup(function(e) {
	if (e.keyCode == 27) { 

        /* show header + menu/search buttons + logo */
        jQuery('.taptap-header, .taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper').removeClass('taptap-hide-header-elements');    
		/* hide search field */
		jQuery('.taptap-search-wrapper, .taptap-search-background').removeClass('taptap-search-wrapper-active');
        /* hide search overlay */
        jQuery('.taptap-search-overlay').removeClass('taptap-search-overlay-active');
        /* un-focus search field */
		jQuery('input.taptap-search-field').blur();

		/* hide main wrapper */
		jQuery('.taptap-main-wrapper').removeClass('taptap-main-wrapper-active');
		/* hide background color */
		jQuery('.taptap-background-color').removeClass('taptap-background-color-active');
		/* hide background image */
		jQuery('.taptap-background-image').removeClass('taptap-background-image-active');
        /* hide background overlay */
        jQuery('.taptap-background-overlay').removeClass('taptap-background-overlay-active');
		/* hide expanded menu button */
		jQuery('.taptap-menu-button-wrapper').removeClass('taptap-menu-active');
        
        <?php if( get_theme_mod('taptap_content_animation_elements') != '') { ?>
        jQuery('<?php echo get_theme_mod('taptap_content_animation_elements'); ?>').removeClass('taptap-content-animation-active');
        <?php } ?>
        
        /* show menu button label */
        <?php if( get_theme_mod('taptap_menu_button_hide') != '') { ?>
        jQuery('.taptap-menu-button-label').removeClass('taptap-menu-button-label-hide');
        <?php } ?>

		return false;
	}
});
// END HIDE MENU WHEN ESC BUTTON PRESSED
</script>

<style>
/* content animation */
<?php if(get_theme_mod('taptap_content_animation_elements') != '') { ?>
<?php echo get_theme_mod('taptap_content_animation_elements'); ?> {
    -webkit-transition:-webkit-transform <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, -webkit-filter <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease;
    -moz-transition:-moz-transform <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, -moz-filter <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease;
    transition:transform <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease, filter <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>0.5<?php } ?>s ease;
}
<?php } ?>
.taptap-content-animation-active {
    -webkit-transform:scale(<?php if(get_theme_mod('taptap_content_animation_scale') != '') { ?><?php echo get_theme_mod('taptap_content_animation_scale'); ?><?php } else { ?>0.9<?php } ?>);
    -moz-transform:scale(<?php if(get_theme_mod('taptap_content_animation_scale') != '') { ?><?php echo get_theme_mod('taptap_content_animation_scale'); ?><?php } else { ?>0.9<?php } ?>);
    transform:scale(<?php if(get_theme_mod('taptap_content_animation_scale') != '') { ?><?php echo get_theme_mod('taptap_content_animation_scale'); ?><?php } else { ?>0.9<?php } ?>);
    opacity:<?php echo get_theme_mod('taptap_content_animation_opacity'); ?>;
    
    /* blur effect (unless hidden on non-mobile devices) */
    <?php if(get_theme_mod('taptap_content_blur_mobile') != '') { ?>
        <?php if ( wp_is_mobile() ) { ?>
        -webkit-filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
        -moz-filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
        filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
        <?php } ?>
    <?php } else { ?>
        -webkit-filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
        -moz-filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
        filter:blur(<?php echo get_theme_mod('taptap_content_blur'); ?>px);
    <?php } ?>
}
/* if push down site */
<?php if(get_theme_mod('taptap_push_down_site') != '') { ?>
    <?php if ( is_admin_bar_showing() ) { ?>
    html { margin-top:<?php if(get_theme_mod('taptap_header_height') != '') { ?>calc(<?php echo get_theme_mod('taptap_header_height'); ?>px + 32px)<?php } else { ?>97px<?php } ?> !important; }
    @media screen and (max-width: 782px) {
        html { margin-top:<?php if(get_theme_mod('taptap_header_height') != '') { ?>calc(<?php echo get_theme_mod('taptap_header_height'); ?>px + 46px)<?php } else { ?>111px<?php } ?> !important; }
    }
    <?php } ?>
<?php } ?>
/* hide taptap between resolutions */
@media ( min-width:<?php echo get_theme_mod('taptap_smaller_than'); ?>px) and (max-width:<?php echo get_theme_mod('taptap_larger_than'); ?>px) {
    .taptap-menu-button-wrapper,
    .taptap-logo-wrapper,
    .taptap-header,
    .taptap-background-color,
    .taptap-background-image,
    .taptap-background-overlay,
    .taptap-main-wrapper,
    .taptap-search-wrapper,
    .taptap-search-button-wrapper { display:none; }
    html { margin-top:0 !important; }
}
/* hide theme menu */
<?php if(get_theme_mod('taptap_hide_theme_menu') != '') { ?>
@media screen and (max-width:<?php echo get_theme_mod('taptap_smaller_than'); ?>px) {
    <?php echo get_theme_mod('taptap_hide_theme_menu'); ?> { display:none !important; }
}
@media screen and (min-width:<?php echo get_theme_mod('taptap_larger_than'); ?>px) {
    <?php echo get_theme_mod('taptap_hide_theme_menu'); ?> { display:none !important; }
}
<?php } ?>
</style>