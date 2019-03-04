<!-- BEGIN CUSTOM COLORS (WP THEME CUSTOMIZER) -->
<style>
/**************************************************************
*** CUSTOM COLORS + SETTINGS
**************************************************************/
/* show hovers on non-touch devices only */
<?php if ( wp_is_mobile() ) { ?>
<?php } else { ?>
/* menu label hover */
.taptap-menu-button-wrapper:hover .taptap-menu-button-label { color:<?php echo get_theme_mod('taptap_menu_button_label_hover_color'); ?>; }
/* logo hover */
.taptap-logo a:hover { color:<?php echo get_theme_mod('taptap_logo_hover_color'); ?>; }
/* serach label hover */
.taptap-search-button-wrapper:hover .taptap-search-button-label { color:<?php echo get_theme_mod('taptap_search_button_label_hover_color'); ?>; }
/* search button hover*/
.taptap-search-button-wrapper:hover .taptap-search-button { border-color:<?php if(get_theme_mod('taptap_search_button_hover_color')) { ?><?php echo get_theme_mod('taptap_search_button_hover_color'); ?><?php } else { ?>#ddd<?php } ?>; }
.taptap-search-button-wrapper:hover .taptap-search-button::after { background-color:<?php if(get_theme_mod('taptap_search_button_hover_color')) { ?><?php echo get_theme_mod('taptap_search_button_hover_color'); ?><?php } else { ?>#ddd<?php } ?>; }
/* search close button hover */
.taptap-search-close-wrapper:hover .taptap-search-close-inner::before,
.taptap-search-close-wrapper:hover .taptap-search-close-inner::after { background-color:<?php if(get_theme_mod('taptap_search_close_button_hover_color')) { ?><?php echo get_theme_mod('taptap_search_close_button_hover_color'); ?><?php } else { ?>#ddd<?php } ?>; }
/* search clear field button hover */
.taptap-search-clear-wrapper:hover .taptap-search-clear { background-color:<?php if(get_theme_mod('taptap_search_clear_button_hover_color')) { ?><?php echo get_theme_mod('taptap_search_clear_button_hover_color'); ?><?php } else { ?>#666<?php } ?>; }
/* current menu item hover */
.taptap-by-bonfire ul li.current-menu-item.full-item-arrow-hover > a,
.taptap-by-bonfire ul li.current-menu-item > a:hover { color:<?php echo get_theme_mod('taptap_menu_hover_color_current'); ?>; }
/* current submenu item hover */
.taptap-by-bonfire .sub-menu .current-menu-item.full-item-arrow-hover > a,
.taptap-by-bonfire .sub-menu .current-menu-item > a:hover { color:<?php echo get_theme_mod('taptap_submenu_hover_color_current'); ?>; }
/* menu item icon hover */
.taptap-by-bonfire ul li a:hover i,
.taptap-by-bonfire ul li.full-item-arrow-hover a i { color:<?php echo get_theme_mod('taptap_menu_icon_hover_color'); ?>; }
/* submenu item icon hover */
.taptap-by-bonfire .sub-menu a:hover i,
.taptap-by-bonfire .sub-menu .full-item-arrow-hover a i { color:<?php echo get_theme_mod('taptap_submenu_icon_hover_color'); ?>; }
/* menu item hovers */
.taptap-by-bonfire ul li.full-item-arrow-hover > a,
.taptap-by-bonfire ul li a:hover { color:<?php if( get_theme_mod('taptap_menu_hover_color') != '') { ?><?php echo get_theme_mod('taptap_menu_hover_color'); ?><?php } else { ?>#E4D7D7<?php } ?>; }
.taptap-by-bonfire ul.sub-menu li.full-item-arrow-hover > a,
.taptap-by-bonfire ul.sub-menu li a:hover { color:<?php if( get_theme_mod('taptap_submenu_hover_color') != '') { ?><?php echo get_theme_mod('taptap_submenu_hover_color'); ?><?php } else { ?>#77787C<?php } ?>; }
/* submenu arrow hover */
.full-item-arrow-hover > .taptap-sub-arrow .taptap-sub-arrow-inner::before,
.full-item-arrow-hover > .taptap-sub-arrow .taptap-sub-arrow-inner::after,
.taptap-sub-arrow:hover .taptap-sub-arrow-inner::before,
.taptap-sub-arrow:hover .taptap-sub-arrow-inner::after { background-color:<?php if( get_theme_mod('taptap_submenu_arrow_hover_color') != '') { ?><?php echo get_theme_mod('taptap_submenu_arrow_hover_color'); ?><?php } else { ?>#fff<?php } ?>; }
/* menu button hover */
.taptap-menu-button-wrapper:hover .taptap-main-menu-button:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button div.taptap-main-menu-button-middle:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button:after,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-two:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-two div.taptap-main-menu-button-two-middle:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-two:after,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-three:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-three div.taptap-main-menu-button-three-middle:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-three:after,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-four:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-four div.taptap-main-menu-button-four-middle:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-four:after,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-five:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-five div.taptap-main-menu-button-five-middle:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-five:after,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-six:before,
.taptap-menu-button-wrapper:hover .taptap-main-menu-button-six:after {
    background-color:<?php if(get_theme_mod('taptap_menu_button_hover_color')) { ?><?php echo get_theme_mod('taptap_menu_button_hover_color'); ?><?php } else { ?>#ddd<?php } ?>;
}
/* menu bars hover (if menu opened) */
.taptap-menu-active:hover .taptap-main-menu-button:before,
.taptap-menu-active:hover .taptap-main-menu-button div.taptap-main-menu-button-middle:before,
.taptap-menu-active:hover .taptap-main-menu-button:after,
.taptap-menu-active:hover .taptap-main-menu-button-two:before,
.taptap-menu-active:hover .taptap-main-menu-button-two div.taptap-main-menu-button-two-middle:before,
.taptap-menu-active:hover .taptap-main-menu-button-two:after,
.taptap-menu-active:hover .taptap-main-menu-button-three:before,
.taptap-menu-active:hover .taptap-main-menu-button-three div.taptap-main-menu-button-three-middle:before,
.taptap-menu-active:hover .taptap-main-menu-button-three:after,
.taptap-menu-active:hover .taptap-main-menu-button-four:before,
.taptap-menu-active:hover .taptap-main-menu-button-four div.taptap-main-menu-button-four-middle:before,
.taptap-menu-active:hover .taptap-main-menu-button-four:after,
.taptap-menu-active:hover .taptap-main-menu-button-five:before,
.taptap-menu-active:hover .taptap-main-menu-button-five div.taptap-main-menu-button-five-middle:before,
.taptap-menu-active:hover .taptap-main-menu-button-five:after,
.taptap-menu-active:hover .taptap-main-menu-button-six:before,
.taptap-menu-active:hover .taptap-main-menu-button-six:after {
    background-color:<?php echo get_theme_mod('taptap_menu_button_active_hover_color'); ?>;
}        
<?php } ?>

/* MENU BUTTON */
/* menu button opacity */
.taptap-menu-button-wrapper { opacity:<?php echo get_theme_mod('taptap_menu_button_opacity'); ?>; }
/* menu button */
.taptap-main-menu-button:before,
.taptap-main-menu-button div.taptap-main-menu-button-middle:before,
.taptap-main-menu-button:after,
.taptap-main-menu-button-two:before,
.taptap-main-menu-button-two div.taptap-main-menu-button-two-middle:before,
.taptap-main-menu-button-two:after,
.taptap-main-menu-button-three:before,
.taptap-main-menu-button-three div.taptap-main-menu-button-three-middle:before,
.taptap-main-menu-button-three:after,
.taptap-main-menu-button-four:before,
.taptap-main-menu-button-four div.taptap-main-menu-button-four-middle:before,
.taptap-main-menu-button-four:after,
.taptap-main-menu-button-five:before,
.taptap-main-menu-button-five div.taptap-main-menu-button-five-middle:before,
.taptap-main-menu-button-five:after,
.taptap-main-menu-button-six:before,
.taptap-main-menu-button-six:after {
    background-color:<?php echo get_theme_mod('taptap_menu_button_color'); ?>;
    <?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>height:1px;<?php } ?>
}
/* menu button (if menu opened) */
.taptap-menu-active .taptap-main-menu-button:before,
.taptap-menu-active .taptap-main-menu-button div.taptap-main-menu-button-middle:before,
.taptap-menu-active .taptap-main-menu-button:after,
.taptap-menu-active .taptap-main-menu-button-two:before,
.taptap-menu-active .taptap-main-menu-button-two div.taptap-main-menu-button-two-middle:before,
.taptap-menu-active .taptap-main-menu-button-two:after,
.taptap-menu-active .taptap-main-menu-button-three:before,
.taptap-menu-active .taptap-main-menu-button-three div.taptap-main-menu-button-three-middle:before,
.taptap-menu-active .taptap-main-menu-button-three:after,
.taptap-menu-active .taptap-main-menu-button-four:before,
.taptap-menu-active .taptap-main-menu-button-four div.taptap-main-menu-button-four-middle:before,
.taptap-menu-active .taptap-main-menu-button-four:after,
.taptap-menu-active .taptap-main-menu-button-five:before,
.taptap-menu-active .taptap-main-menu-button-five div.taptap-main-menu-button-five-middle:before,
.taptap-menu-active .taptap-main-menu-button-five:after,
.taptap-menu-active .taptap-main-menu-button-six:before,
.taptap-menu-active .taptap-main-menu-button-six:after { background-color:<?php echo get_theme_mod('taptap_menu_button_active_color'); ?>; }
/* menu button animations (-/X) */
<?php $bonfire_taptap_menu_button_animation = get_theme_mod('taptap_menu_button_animation'); if($bonfire_taptap_menu_button_animation != '') { switch ($bonfire_taptap_menu_button_animation) { case 'minussign': ?>
/* MINUS SIGN ANIMATION */
    /* button style #1 top bar*/
    .taptap-menu-active .taptap-main-menu-button:before {
        opacity:0;
        
        -webkit-transform:translateX(10px);
        -moz-transform:translateX(10px);
        transform:translateX(10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #1 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button:after {
        opacity:0;
        
        -webkit-transform:translateX(-10px);
        -moz-transform:translateX(-10px);
        transform:translateX(-10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #2 top bar*/
    .taptap-menu-active .taptap-main-menu-button-two:before {
        opacity:0;
        
        -webkit-transform:translateX(10px);
        -moz-transform:translateX(10px);
        transform:translateX(10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #2 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-two:after {
        opacity:0;
        
        -webkit-transform:translateX(-10px);
        -moz-transform:translateX(-10px);
        transform:translateX(-10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #3 top bar*/
    .taptap-menu-active .taptap-main-menu-button-three:before {
        opacity:0;
        
        -webkit-transform:translateX(10px);
        -moz-transform:translateX(10px);
        transform:translateX(10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #3 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-three:after {
        opacity:0;
        
        -webkit-transform:translateX(-10px);
        -moz-transform:translateX(-10px);
        transform:translateX(-10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #4 top bar*/
    .taptap-menu-active .taptap-main-menu-button-four:before {
        opacity:0;
        
        -webkit-transform:translateX(10px);
        -moz-transform:translateX(10px);
        transform:translateX(10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #4 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-four:after {
        opacity:0;
        
        -webkit-transform:translateX(-10px);
        -moz-transform:translateX(-10px);
        transform:translateX(-10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #5 top bar*/
    .taptap-menu-active .taptap-main-menu-button-five:before {
        opacity:0;
        
        -webkit-transform:translateX(10px);
        -moz-transform:translateX(10px);
        transform:translateX(10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #5 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-five:after {
        opacity:0;
        
        -webkit-transform:translateX(-10px);
        -moz-transform:translateX(-10px);
        transform:translateX(-10px);
        
        -webkit-transition:-webkit-transform .25s ease, opacity .15s ease .1s;
        -moz-transition:-moz-transform .25s ease, opacity .15s ease .1s;
        transition:transform .25s ease, opacity .15s ease .1s;
    }
    /* button style #6 top bar*/
    .taptap-menu-active .taptap-main-menu-button-six:before {
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px);
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px);
        
        -webkit-transition:-webkit-transform .25s ease;
        -moz-transition:-moz-transform .25s ease;
        transition:transform .25s ease;
    }
    /* button style #6 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-six:after {
        -webkit-transform:translateY(-4px);
        -moz-transform:translateY(-4px);
        transform:translateY(-4px);
        
        -webkit-transition:-webkit-transform .25s ease;
        -moz-transition:-moz-transform .25s ease;
        transition:transform .25s ease;
    }
<?php break; case 'xsign': ?>
/* X SIGN ANIMATION */
    /* button style #1 top bar*/
    .taptap-menu-active .taptap-main-menu-button:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
    }
    /* button style #1 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button:after {
        transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -moz-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -webkit-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
    }
    /* button style #1 middle bar*/
    .taptap-menu-active div.taptap-main-menu-button-middle:before {
        opacity:0;
        pointer-events:none;
        
        -webkit-transform:translateX(-20px);
        -moz-transform:translateX(-20px);
        transform:translateX(-20px);
        
        -webkit-transition:all .25s ease, opacity .25s ease .025s;
        -moz-transition:all .25s ease, opacity .25s ease .025s;
        transition:all .25s ease, opacity .25s ease .025s;
    }
    /* button style #2 top bar*/
    .taptap-menu-active .taptap-main-menu-button-two:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
    }
    .taptap-menu-active .taptap-main-menu-button-two:hover:before { width:30px; }
    /* button style #2 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-two:after {
        width:30px;
        margin-left:0;
        transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -moz-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -webkit-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
    }
    /* button style #2 middle bar*/
    .taptap-menu-active div.taptap-main-menu-button-two-middle:before {
        opacity:0;
        pointer-events:none;
        
        -webkit-transform:translateX(-20px);
        -moz-transform:translateX(-20px);
        transform:translateX(-20px);
        
        -webkit-transition:all .25s ease, opacity .25s ease .025s;
        -moz-transition:all .25s ease, opacity .25s ease .025s;
        transition:all .25s ease, opacity .25s ease .025s;
    }
    /* button style #3 top bar*/
    .taptap-menu-active .taptap-main-menu-button-three:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
    }
    /* button style #3 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-three:after {
        transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -moz-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -webkit-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
    }
    /* button style #3 middle bar*/
    .taptap-menu-active div.taptap-main-menu-button-three-middle:before {
        opacity:0;
        pointer-events:none;
        
        -webkit-transform:translateX(-20px);
        -moz-transform:translateX(-20px);
        transform:translateX(-20px);
        
        -webkit-transition:all .25s ease, opacity .25s ease .025s;
        -moz-transition:all .25s ease, opacity .25s ease .025s;
        transition:all .25s ease, opacity .25s ease .025s;
    }
    /* button style #4 top bar*/
    .taptap-menu-active .taptap-main-menu-button-four:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(45deg);
    }
    .taptap-menu-active .taptap-main-menu-button-four:hover:before { width:25px; }
    /* button style #4 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-four:after {
        width:25px;
        transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -moz-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
        -webkit-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>8<?php } else { ?>9<?php } ?>px) rotate(-45deg);
    }
    /* button style #4 middle bar*/
    .taptap-menu-active div.taptap-main-menu-button-four-middle:before {
        opacity:0;
        pointer-events:none;
        
        -webkit-transform:translateX(-20px);
        -moz-transform:translateX(-20px);
        transform:translateX(-20px);
        
        -webkit-transition:all .25s ease, opacity .25s ease .025s;
        -moz-transition:all .25s ease, opacity .25s ease .025s;
        transition:all .25s ease, opacity .25s ease .025s;
    }
    /* button style #5 top bar*/
    .taptap-menu-active .taptap-main-menu-button-five:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(45deg);
    }
    /* button style #5 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-five:after {
        transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(-45deg);
        -moz-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(-45deg);
        -webkit-transform:translateY(-<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>10<?php } else { ?>11<?php } ?>px) rotate(-45deg);
    }
    /* button style #5 middle bar*/
    .taptap-menu-active div.taptap-main-menu-button-five-middle:before {
        opacity:0;
        pointer-events:none;
        
        -webkit-transform:translateX(-20px);
        -moz-transform:translateX(-20px);
        transform:translateX(-20px);
        
        -webkit-transition:all .25s ease, opacity .25s ease .025s;
        -moz-transition:all .25s ease, opacity .25s ease .025s;
        transition:all .25s ease, opacity .25s ease .025s;
    }
    /* button style #6 top bar*/
    .taptap-menu-active .taptap-main-menu-button-six:before {
        transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px) rotate(45deg);
        -moz-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px) rotate(45deg);
        -webkit-transform:translateY(<?php if(get_theme_mod('taptap_menu_button_skinny') != '') { ?>3<?php } else { ?>4<?php } ?>px) rotate(45deg);
    }
    /* button style #6 bottom bar*/
    .taptap-menu-active .taptap-main-menu-button-six:after {
        transform:translateY(-4px) rotate(-45deg);
        -moz-transform:translateY(-4px) rotate(-45deg);
        -webkit-transform:translateY(-4px) rotate(-45deg);
    }
<?php break; } } ?>
/* menu button animation speed + logo/search hover speeds */
.taptap-menu-button-label,
.taptap-search-button-label,
.taptap-search-button,
.taptap-search-button::after,
.taptap-logo a,
.taptap-search-close-inner::before,
.taptap-search-close-inner::after,
.taptap-search-clear,
.taptap-main-menu-button:before,
.taptap-main-menu-button div.taptap-main-menu-button-middle:before,
.taptap-main-menu-button:after,
.taptap-main-menu-button-two:before,
.taptap-main-menu-button-two div.taptap-main-menu-button-two-middle:before,
.taptap-main-menu-button-two:after,
.taptap-main-menu-button-three:before,
.taptap-main-menu-button-three div.taptap-main-menu-button-three-middle:before,
.taptap-main-menu-button-three:after,
.taptap-main-menu-button-four:before,
.taptap-main-menu-button-four div.taptap-main-menu-button-four-middle:before,
.taptap-main-menu-button-four:after,
.taptap-main-menu-button-five:before,
.taptap-main-menu-button-five div.taptap-main-menu-button-five-middle:before,
.taptap-main-menu-button-five:after,
.taptap-main-menu-button-six:before,
.taptap-main-menu-button-six:after {
    -webkit-transition:all <?php echo get_theme_mod('taptap_menu_button_animation_speed'); ?>s ease !important;
    -moz-transition:all <?php echo get_theme_mod('taptap_menu_button_animation_speed'); ?>s ease !important;
    transition:all <?php echo get_theme_mod('taptap_menu_button_animation_speed'); ?>s ease !important;
}
/* menu button top, side distances + right position */
.taptap-menu-button-wrapper { top:<?php echo get_theme_mod('taptap_menu_button_top_distance'); ?>px; }
<?php $bonfire_taptap_menu_button_position = get_theme_mod('taptap_menu_button_position'); if($bonfire_taptap_menu_button_position != '') { switch ($bonfire_taptap_menu_button_position) { case 'left': ?>
    .taptap-menu-button-wrapper {
        left:<?php echo get_theme_mod('taptap_menu_button_side_distance'); ?>px;
    }
<?php break; case 'right': ?>
    .taptap-menu-button-wrapper {
        right:<?php if(get_theme_mod('taptap_menu_button_side_distance') != '') { ?><?php echo get_theme_mod('taptap_menu_button_side_distance'); ?><?php } else { ?>15<?php } ?>px;
        left:auto;
    }
<?php break; } } ?>
/* if menu button hidden, remove button height and set default label position to 0 */
<?php if(get_theme_mod('taptap_hide_menu_button') != '') { ?>
.taptap-menu-button-wrapper { height:auto; }
.taptap-menu-button-label { top:0; left:0; }
<?php } ?>
/* menu button label customization */
.taptap-menu-button-label {
    left:<?php echo get_theme_mod('taptap_menu_button_label_horizontal_position'); ?>px;
    top:<?php echo get_theme_mod('taptap_menu_button_label_vertical_position'); ?>px;
    color:<?php echo get_theme_mod('taptap_menu_button_label_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_menu_button_label_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_menu_button_label_letter_spacing'); ?>px;
}
/* menu button label font + theme font */
<?php if(get_theme_mod('taptap_menu_button_label_theme_font')) { ?>
    .taptap-menu-button-label {
        font-family:<?php echo get_theme_mod('taptap_menu_button_label_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_menu_button_label_font = get_theme_mod('taptap_menu_button_label_font'); if($bonfire_taptap_menu_button_label_font != '') { switch ($bonfire_taptap_menu_button_label_font) { case 'style2': ?>
    .taptap-menu-button-label {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-menu-button-label {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-menu-button-label {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-menu-button-label {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-menu-button-label {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-menu-button-label {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-menu-button-label {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-menu-button-label {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-menu-button-label {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-menu-button-label {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-menu-button-label {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* LOGO */
/* logo font size + letter spacing */
.taptap-logo a {
    color:<?php echo get_theme_mod('taptap_logo_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_logo_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_logo_letter_spacing'); ?>px;
}
/* logo font + theme font */
<?php if(get_theme_mod('taptap_logo_theme_font')) { ?>
    .taptap-logo a {
        font-family:<?php echo get_theme_mod('taptap_logo_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_logo_font = get_theme_mod('taptap_logo_font'); if($bonfire_taptap_logo_font != '') { switch ($bonfire_taptap_logo_font) { case 'style2': ?>
    .taptap-logo a {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-logo a {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-logo a {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-logo a {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-logo a {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-logo a {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-logo a {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-logo a {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-logo a {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-logo a {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-logo a {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>
/* logo image size + top/side distances + right positioning */
.taptap-logo-image img { max-height:<?php echo get_theme_mod('taptap_logo_max_height'); ?>px; }
.taptap-logo-wrapper { top:<?php echo get_theme_mod('taptap_logo_top_distance'); ?>px; }
<?php $bonfire_taptap_logo_position = get_theme_mod('taptap_logo_position'); if($bonfire_taptap_logo_position != '') { switch ($bonfire_taptap_logo_position) { case 'left': ?>
    .taptap-logo-wrapper {
        left:<?php if(get_theme_mod('taptap_logo_side_distance') != '') { ?><?php echo get_theme_mod('taptap_logo_side_distance'); ?><?php } else { ?>15<?php } ?>px;
        -webkit-transform:translateX(0);
        -moz-transform:translateX(0);
        transform:translateX(0);
    }
<?php break; case 'right': ?>
    .taptap-logo-wrapper {
        right:<?php if(get_theme_mod('taptap_logo_side_distance') != '') { ?><?php echo get_theme_mod('taptap_logo_side_distance'); ?><?php } else { ?>15<?php } ?>px;
        left:auto;
        -webkit-transform:translateX(0);
        -moz-transform:translateX(0);
        transform:translateX(0);
    }
<?php break; } } ?>

/* SEARCH */
/* search button */
.taptap-search-button {
    border-color:<?php echo get_theme_mod('taptap_search_button_color'); ?>;
    <?php if(get_theme_mod('taptap_search_button_skinny') != '') { ?>
    width:14px;
    height:14px;
    border-width:1px;
    <?php } ?>
    <?php if(get_theme_mod('taptap_search_button_flip') != '') { ?>
    margin-left:15px;
    -webkit-transform:scaleX(-1);
    -moz-transform:scaleX(-1);
    transform:scaleX(-1);
    <?php } ?>
}
.taptap-search-button::after {
    background-color:<?php echo get_theme_mod('taptap_search_button_color'); ?>;
    <?php if(get_theme_mod('taptap_search_button_skinny') != '') { ?>height:1px; top:13px; left:10px;<?php } ?>
}
/* search button top, side distances + right position */
.taptap-search-button-wrapper { top:<?php echo get_theme_mod('taptap_search_button_top_distance'); ?>px; }
<?php $bonfire_taptap_search_button_position = get_theme_mod('taptap_search_button_position'); if($bonfire_taptap_search_button_position != '') { switch ($bonfire_taptap_search_button_position) { case 'left': ?>
    .taptap-search-button-wrapper {
        left:<?php if(get_theme_mod('taptap_search_button_side_distance') != '') { ?><?php echo get_theme_mod('taptap_search_button_side_distance'); ?><?php } else { ?>10<?php } ?>px;
        right:auto;
    }
<?php break; case 'right': ?>
    .taptap-search-button-wrapper {
        right:<?php echo get_theme_mod('taptap_search_button_side_distance'); ?>px;
    }
<?php break; } } ?>
/* if search button hidden, remove button height and set default label position to 0 */
<?php if(get_theme_mod('taptap_hide_search_button') != '') { ?>
.taptap-search-button-wrapper { height:auto; }
.taptap-search-button-label { top:0; left:0; }
<?php } ?>
/* search button label customization */
.taptap-search-button-label {
    left:<?php echo get_theme_mod('taptap_search_button_label_horizontal_position'); ?>px;
    top:<?php echo get_theme_mod('taptap_search_button_label_vertical_position'); ?>px;
    color:<?php echo get_theme_mod('taptap_search_button_label_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_search_button_label_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_search_button_label_letter_spacing'); ?>px;
}
/* search button label font + theme font */
<?php if(get_theme_mod('taptap_search_button_label_theme_font')) { ?>
    .taptap-search-button-label {
        font-family:<?php echo get_theme_mod('taptap_search_button_label_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_search_button_label_font = get_theme_mod('taptap_search_button_label_font'); if($bonfire_taptap_search_button_label_font != '') { switch ($bonfire_taptap_search_button_label_font) { case 'style2': ?>
    .taptap-search-button-label {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-search-button-label {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-search-button-label {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-search-button-label {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-search-button-label {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-search-button-label {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-search-button-label {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-search-button-label {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-search-button-label {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-search-button-label {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-search-button-label {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>
/* search form background + background color + animation speed */
.taptap-search-wrapper,
.taptap-search-background {
    height:<?php echo get_theme_mod('taptap_search_field_height'); ?>px;
    
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
    transition:transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
}
.taptap-search-background {
    opacity:<?php echo get_theme_mod('taptap_search_background_opacity'); ?>;
    background-color:<?php echo get_theme_mod('taptap_search_field_background_color'); ?>;
}
.taptap-search-wrapper-active {
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s !important;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s !important;
    transition:transform <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s !important;
}
.taptap-search-overlay {
    background-color:<?php echo get_theme_mod('taptap_search_overlay_color'); ?>;
    -webkit-transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
    -moz-transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
    transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s;
}
.taptap-search-overlay-active {
    opacity:<?php echo get_theme_mod('taptap_search_overlay_opacity'); ?>;
    -webkit-transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s;
    -moz-transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s;
    transition:opacity <?php echo get_theme_mod('taptap_search_animation_speed'); ?>s ease 0s, top 0s ease 0s;
}
/* search form placeholder */
#searchform input::-webkit-input-placeholder { font-size:<?php echo get_theme_mod('taptap_search_field_font_size'); ?>px; color:<?php echo get_theme_mod('taptap_search_field_placeholder_color'); ?> !important; }
#searchform input:-moz-placeholder { font-size:<?php echo get_theme_mod('taptap_search_field_font_size'); ?>px; color:<?php echo get_theme_mod('taptap_search_field_placeholder_color'); ?> !important; }
#searchform input::-moz-placeholder { font-size:<?php echo get_theme_mod('taptap_search_field_font_size'); ?>px; color:<?php echo get_theme_mod('taptap_search_field_placeholder_color'); ?> !important; }
#searchform input:-ms-input-placeholder { font-size:<?php echo get_theme_mod('taptap_search_field_font_size'); ?>px; color:<?php echo get_theme_mod('taptap_search_field_placeholder_color'); ?> !important; }
/* search form text color + align + padding if clear field hidden */
.taptap-search-wrapper #searchform input {
    color:<?php echo get_theme_mod('taptap_search_field_text_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_search_field_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_search_field_letter_spacing'); ?>px;
    <?php if(get_theme_mod('taptap_search_field_right') != '') { ?>text-align:right;<?php } ?>
    <?php if(get_theme_mod('taptap_search_clear_field') != '') { ?>padding-right:20px;<?php } ?>
}
/* search field font */
<?php if(get_theme_mod('taptap_search_field_theme_font')) { ?>
    .taptap-search-wrapper #searchform input {
        font-family:<?php echo get_theme_mod('taptap_search_field_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_search_field_font = get_theme_mod('taptap_search_field_font'); if($bonfire_taptap_search_field_font != '') { switch ($bonfire_taptap_search_field_font) { case 'style2': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-search-wrapper #searchform input {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>
/* search form close button */
.taptap-search-close-inner::before,
.taptap-search-close-inner::after { background-color:<?php echo get_theme_mod('taptap_search_close_button_color'); ?>; }
/* search clear field button */
.taptap-search-clear { background-color:<?php echo get_theme_mod('taptap_search_clear_button_color'); ?>; }
/* make search field X the same color as search field background */
.taptap-search-clear::before,
.taptap-search-clear::after { background-color:<?php echo get_theme_mod('taptap_search_field_background_color'); ?>; }

/* HEADER */
/* header height + background color */
.taptap-header {
    height:<?php echo get_theme_mod('taptap_header_height'); ?>px;
    background-color:<?php echo get_theme_mod('taptap_header_background_color'); ?>;
    opacity:<?php echo get_theme_mod('taptap_header_opacity'); ?>;
}
/* show header shadow */
<?php if(get_theme_mod('taptap_show_header_shadow') != '') { ?>
    .taptap-header {
        -webkit-box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
        -moz-box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
        box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.4);
        
        -webkit-box-shadow:0px 0px 2px 1px rgba(0,0,0,<?php echo get_theme_mod('taptap_header_shadow_opacity'); ?>);
        -moz-box-shadow:0px 0px 2px 1px rgba(0,0,0,<?php echo get_theme_mod('taptap_header_shadow_opacity'); ?>);
        box-shadow:0px 0px 2px 1px rgba(0,0,0,<?php echo get_theme_mod('taptap_header_shadow_opacity'); ?>);
    }
<?php } ?>

/* MENU CONTAINER */
/* background color */
.taptap-background-color {
    opacity:<?php echo get_theme_mod('taptap_background_color_opacity'); ?>;
    background-color:<?php echo get_theme_mod('taptap_background_color'); ?>;
}
/* pulsating background colors + speed */
<?php if(get_theme_mod('taptap_background_color_two') != '' && get_theme_mod('taptap_background_color_three') != '') { ?>
.taptap-background-color {
    animation-name:TapTapPulse;
    animation-duration:<?php if(get_theme_mod('taptap_background_animation_speed') != '') { ?><?php echo get_theme_mod('taptap_background_animation_speed'); ?><?php } else { ?>10<?php } ?>s;
    animation-iteration-count:infinite;
}
@keyframes TapTapPulse {
0% { background-color:<?php echo get_theme_mod('taptap_background_color'); ?>; }
33% { background-color:<?php echo get_theme_mod('taptap_background_color_two'); ?>; }
66% { background-color:<?php echo get_theme_mod('taptap_background_color_three'); ?>; }
100 { background-color:<?php echo get_theme_mod('taptap_background_color'); ?>; }
}
<?php } ?>
/* background image opacity + horizontal/vertical alignment */
.taptap-background-image {
    opacity:<?php echo get_theme_mod('taptap_background_image_opacity'); ?>;
    background-position:<?php $bonfire_taptap_background_vertical_alignment = get_theme_mod('taptap_background_vertical_alignment'); if($bonfire_taptap_background_vertical_alignment != '') { switch ($bonfire_taptap_background_vertical_alignment) { case 'top': ?>top<?php break; case 'middle': ?>center<?php break; case 'bottom': ?>bottom<?php break; } } ?> <?php $bonfire_taptap_background_horizontal_alignment = get_theme_mod('taptap_background_horizontal_alignment'); if($bonfire_taptap_background_horizontal_alignment != '') { switch ($bonfire_taptap_background_horizontal_alignment) { case 'left': ?>left<?php break; case 'center': ?>center<?php break; case 'right': ?>right<?php break; } } ?>;
}
/* background pattern */
<?php if(get_theme_mod('taptap_background_pattern') != '') { ?>
    .taptap-background-image {
        background-size:auto;
        background-repeat:repeat;
    }
<?php } ?>
/* menu container top/bottom padding */
.taptap-main-inner-inner {
    padding-top:<?php echo get_theme_mod('taptap_menu_container_top_padding'); ?>px;
    padding-bottom:<?php echo get_theme_mod('taptap_menu_container_bottom_padding'); ?>px;
    padding-left:<?php echo get_theme_mod('taptap_menu_container_left_padding'); ?>px;
    padding-right:<?php echo get_theme_mod('taptap_menu_container_right_padding'); ?>px;
}
/* max content width */
.taptap-contents-wrapper {
    max-width:<?php echo get_theme_mod('taptap_menu_container_content_width'); ?>px;
}
/* menu container appearance speed */
.taptap-main-wrapper {
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
    transition:transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
}
.taptap-main-wrapper-active {
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
    transition:transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s, opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease 0s;
}
.taptap-background-color,
.taptap-background-image {
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
    transition:transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
}
.taptap-background-color-active,
.taptap-background-image-active {
    -webkit-transition:-webkit-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
    -moz-transition:-moz-transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
    transition:transform <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
}
/* menu contents horizontal alignment */
<?php $bonfire_taptap_content_horizontal_alignment = get_theme_mod('taptap_content_horizontal_alignment'); if($bonfire_taptap_content_horizontal_alignment != '') { switch ($bonfire_taptap_content_horizontal_alignment) { case 'left': ?>
    .taptap-contents-wrapper { margin:0 auto 0 0; }
    .taptap-heading,
    .taptap-subheading,
    .taptap-image,
    .taptap-by-bonfire ul li,
    .taptap-widgets-wrapper .widget { text-align:left; }
    .taptap-widgets-wrapper .widget div,
    .taptap-widgets-wrapper .widget span,
    .taptap-widgets-wrapper .widget iframe,
    .taptap-widgets-wrapper .widget object,
    .taptap-widgets-wrapper .widget embed {
        margin-left:0;
        margin-right:auto;
    }
<?php break; case 'right': ?>
    .taptap-contents-wrapper { margin:0 0 0 auto; }
    .taptap-heading,
    .taptap-subheading,
    .taptap-image,
    .taptap-by-bonfire ul li,
    .taptap-widgets-wrapper .widget { text-align:right; clear:both; }
    .taptap-widgets-wrapper .widget div,
    .taptap-widgets-wrapper .widget span,
    .taptap-widgets-wrapper .widget iframe,
    .taptap-widgets-wrapper .widget object,
    .taptap-widgets-wrapper .widget embed {
        margin-left:auto;
        margin-right:0;
    }
    .taptap-by-bonfire ul li a { float:right; }
    .taptap-by-bonfire .menu li span {
        position:relative;
    }
    .taptap-sub-arrow {
        margin-right:13px;
        margin-left:0;
    }
    .taptap-sub-arrow-inner {
        border-left:none;
        border-right:1px solid #4A4D50;
    }
<?php break; } } ?>
/* menu contents vertical alignment */
<?php $bonfire_taptap_content_vertical_alignment = get_theme_mod('taptap_content_vertical_alignment'); if($bonfire_taptap_content_vertical_alignment != '') { switch ($bonfire_taptap_content_vertical_alignment) { case 'middle': ?>
    .taptap-main-inner-inner { vertical-align:middle; }
<?php break; case 'bottom': ?>
    .taptap-main-inner-inner { vertical-align:bottom; }
<?php break; } } ?>
/* menu animations (top/left/right/bottom/fade) */
.taptap-main-wrapper {
    -webkit-transform:translateY(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    -moz-transform:translateY(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    transform:translateY(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
}
.taptap-main-wrapper-active {
    -webkit-transform:translateY(0) scale(1);
    -moz-transform:translateY(0) scale(1);
    transform:translateY(0) scale(1);
}
<?php $bonfire_taptap_menu_appearance = get_theme_mod('taptap_menu_appearance'); if($bonfire_taptap_menu_appearance != '') { switch ($bonfire_taptap_menu_appearance) { case 'slidetop': ?>
    /* menu container height */
    .taptap-background-color,
    .taptap-background-image,
    .taptap-main-wrapper {
        max-height:<?php echo get_theme_mod('taptap_menu_height'); ?>px;
    }
<?php break; case 'slideleft': ?>
    .taptap-main-wrapper {
        -webkit-transform:translateY(0) translateX(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        -moz-transform:translateY(0) translateX(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        transform:translateY(0) translateX(-125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    }
    .taptap-background-color,
    .taptap-background-image {
        -webkit-transform:translateY(0) translateX(-<?php if(get_theme_mod('taptap_menu_width') != '') { ?><?php echo get_theme_mod('taptap_menu_width'); ?>px<?php } else { ?>100%<?php } ?>);
        -moz-transform:translateY(0) translateX(-<?php if(get_theme_mod('taptap_menu_width') != '') { ?><?php echo get_theme_mod('taptap_menu_width'); ?>px<?php } else { ?>100%<?php } ?>);
        transform:translateY(0) translateX(-<?php if(get_theme_mod('taptap_menu_width') != '') { ?><?php echo get_theme_mod('taptap_menu_width'); ?>px<?php } else { ?>100%<?php } ?>);
    }
    .taptap-main-wrapper-active,
    .taptap-background-color-active,
    .taptap-background-image-active {
        -webkit-transform:translateY(0) translateX(0);
        -moz-transform:translateY(0) translateX(0);
        transform:translateY(0) translateX(0);
    }
    /* menu container width */
    .taptap-background-color,
    .taptap-background-image,
    .taptap-main-wrapper {
        max-width:<?php echo get_theme_mod('taptap_menu_width'); ?>px;
    }
<?php break; case 'slideright': ?>
    .taptap-main-wrapper {
        -webkit-transform:translateY(0) translateX(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        -moz-transform:translateY(0) translateX(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        transform:translateY(0) translateX(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    }
    .taptap-background-color,
    .taptap-background-image {
        -webkit-transform:translateY(0) translateX(100%);
        -moz-transform:translateY(0) translateX(100%);
        transform:translateY(0) translateX(100%);
    }
    .taptap-main-wrapper-active,
    .taptap-background-color-active,
    .taptap-background-image-active {
        -webkit-transform:translateY(0) translateX(0);
        -moz-transform:translateY(0) translateX(0);
        transform:translateY(0) translateX(0);
    }
    /* menu container width */
    .taptap-background-color,
    .taptap-background-image,
    .taptap-main-wrapper {
        max-width:<?php echo get_theme_mod('taptap_menu_width'); ?>px;
        left:auto;
        right:0;
    }
<?php break; case 'slidebottom': ?>
    .taptap-main-wrapper {
        -webkit-transform:translateY(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        -moz-transform:translateY(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        transform:translateY(125%) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    }
    .taptap-background-color,
    .taptap-background-image {
        -webkit-transform:translateY(100%);
        -moz-transform:translateY(100%);
        transform:translateY(100%);
    }
    .taptap-main-wrapper-active,
    .taptap-background-color-active,
    .taptap-background-image-active {
        -webkit-transform:translateY(0) scale(1);
        -moz-transform:translateY(0) scale(1);
        transform:translateY(0) scale(1);
    }
    /* menu container height */
    .taptap-background-color,
    .taptap-background-image,
    .taptap-main-wrapper {
        max-height:<?php echo get_theme_mod('taptap_menu_height'); ?>px;
        top:auto;
        bottom:0;
    }
<?php break; case 'fade': ?>
    .taptap-background-color,
    .taptap-background-image {
        opacity:0;
        
        -webkit-transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s;
        -moz-transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s;
        transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s;
    }
    .taptap-background-color-active,
    .taptap-background-image-active {
        opacity:<?php if(get_theme_mod('taptap_background_color_opacity') != '') { ?><?php echo get_theme_mod('taptap_background_color_opacity'); ?><?php } else { ?>1<?php } ?>;
        
        -webkit-transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease 0s;
        -moz-transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease 0s;
        transition:opacity <?php if(get_theme_mod('taptap_menu_appearance_speed') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_speed'); ?><?php } else { ?>.5<?php } ?>s ease, top 0s ease 0s;
    }
    .taptap-main-wrapper {
        -webkit-transform:translateY(0) translateX(0) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        -moz-transform:translateY(0) translateX(0) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
        transform:translateY(0) translateX(0) scale(<?php if(get_theme_mod('taptap_menu_appearance_scaling') != '') { ?><?php echo get_theme_mod('taptap_menu_appearance_scaling'); ?><?php } else { ?>0.75<?php } ?>);
    }
    .taptap-background-color,
    .taptap-background-image {
        -webkit-transform:translateY(0) translateX(0);
        -moz-transform:translateY(0) translateX(0);
        transform:translateY(0) translateX(0);
    }
    .taptap-main-wrapper-active,
    .taptap-background-color-active,
    .taptap-background-image-active {
        -webkit-transform:translateY(0) translateX(0);
        -moz-transform:translateY(0) translateX(0);
        transform:translateY(0) translateX(0);
    }
    .taptap-background-image { opacity:0; }
    .taptap-background-image-active { opacity:<?php if(get_theme_mod('taptap_background_image_opacity') != '') { ?><?php echo get_theme_mod('taptap_background_image_opacity'); ?><?php } else { ?>0.1<?php } ?>; }
<?php break; } } ?>

/* BACKGROUND OVERLAY */
/* background overlay opacity + color + animation speed */
.taptap-background-overlay {
    background-color:<?php echo get_theme_mod('taptap_background_overlay_color'); ?>;
    
    -webkit-transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
    -moz-transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
    transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s;
}
.taptap-background-overlay-active {
    opacity:<?php echo get_theme_mod('taptap_background_overlay_opacity'); ?>;
    
    -webkit-transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
    -moz-transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
    transition:opacity <?php echo get_theme_mod('taptap_menu_appearance_speed'); ?>s ease, top 0s ease 0s;
}

/* HEADING + SUBHEADING */
/* headings */
.taptap-heading,
.taptap-heading a,
.taptap-heading a:hover { color:<?php echo get_theme_mod('taptap_heading_color'); ?>; }
.taptap-subheading,
.taptap-subheading a,
.taptap-subheading a:hover { color:<?php echo get_theme_mod('taptap_subheading_color'); ?>; }
/* heading */
.taptap-heading,
.taptap-heading a {
    font-size:<?php echo get_theme_mod('taptap_heading_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_heading_letter_spacing'); ?>px;
    line-height:<?php echo get_theme_mod('taptap_heading_line_height'); ?>px;
}
/* subheading */
.taptap-subheading {
    margin-top:<?php echo get_theme_mod('taptap_subheading_distance'); ?>px;
}
.taptap-subheading,
.taptap-subheading a {
    font-size:<?php echo get_theme_mod('taptap_subheading_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_subheading_letter_spacing'); ?>px;
    line-height:<?php echo get_theme_mod('taptap_subheading_line_height'); ?>px;
}
/* heading font */
<?php if(get_theme_mod('taptap_heading_theme_font')) { ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:<?php echo get_theme_mod('taptap_heading_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_heading_font = get_theme_mod('taptap_heading_font'); if($bonfire_taptap_heading_font != '') { switch ($bonfire_taptap_heading_font) { case 'style2': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-heading,
    .taptap-heading a {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* subheading font */
<?php if(get_theme_mod('taptap_subheading_theme_font')) { ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:<?php echo get_theme_mod('taptap_subheading_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_subheading_font = get_theme_mod('taptap_subheading_font'); if($bonfire_taptap_subheading_font != '') { switch ($bonfire_taptap_subheading_font) { case 'style2': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-subheading,
    .taptap-subheading a {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* HEADING IMAGE */
.taptap-image {
    margin-top:<?php echo get_theme_mod('taptap_heading_image_top_margin'); ?>px;
    margin-bottom:<?php echo get_theme_mod('taptap_heading_image_bottom_margin'); ?>px;
}
.taptap-image img {
    max-width:<?php echo get_theme_mod('taptap_heading_image_max_width'); ?>px;
}

/* MENUS */
/* menu */
.taptap-by-bonfire ul li a {
    color:<?php echo get_theme_mod('taptap_menu_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_menu_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_menu_letter_spacing'); ?>px;
    margin-top:<?php echo get_theme_mod('taptap_menu_vertical_spacing'); ?>px;
}
.taptap-by-bonfire > .menu > li.menu-item-has-children > span { margin-top:<?php echo get_theme_mod('taptap_menu_vertical_spacing'); ?>px; }
/* submenu */
.taptap-by-bonfire .sub-menu a {
    color:<?php echo get_theme_mod('taptap_submenu_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_submenu_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_submenu_letter_spacing'); ?>px;
    margin-bottom:<?php echo get_theme_mod('taptap_submenu_vertical_spacing'); ?>px;
}
/* drop-down arrow position (top-level) */
.taptap-by-bonfire > .menu > li.menu-item-has-children > span { top:<?php echo get_theme_mod('taptap_menu_arrow_alignment'); ?>px; }
/* drop-down arrow position (sub-level) */
.taptap-by-bonfire .sub-menu li.menu-item-has-children span { top:<?php echo get_theme_mod('taptap_submenu_arrow_alignment'); ?>px; }
/* submenu arrow */
.taptap-sub-arrow .taptap-sub-arrow-inner::before,
.taptap-sub-arrow .taptap-sub-arrow-inner::after { background-color:<?php echo get_theme_mod('taptap_submenu_arrow_color'); ?>; }
.taptap-by-bonfire .menu li span { border-color:<?php echo get_theme_mod('taptap_submenu_arrow_divider_color'); ?>; }
/* current menu items */
.taptap-by-bonfire ul li.current-menu-item > a { color:<?php echo get_theme_mod('taptap_menu_color_current'); ?>; }
.taptap-by-bonfire .sub-menu .current-menu-item > a { color:<?php echo get_theme_mod('taptap_submenu_color_current'); ?>; }
/* menu font */
<?php if(get_theme_mod('taptap_menu_theme_font')) { ?>
    .taptap-by-bonfire ul li a {
        font-family:<?php echo get_theme_mod('taptap_menu_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_menu_font = get_theme_mod('taptap_menu_font'); if($bonfire_taptap_menu_font != '') { switch ($bonfire_taptap_menu_font) { case 'style2': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-by-bonfire ul li a {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* MENU ITEM DESCRIPTIONS */
.taptap-menu-item-description {
    color:<?php echo get_theme_mod('taptap_menu_description_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_menu_description_font_size'); ?>px;
    padding-top:<?php echo get_theme_mod('taptap_menu_description_top_padding'); ?>px;
    padding-bottom:<?php echo get_theme_mod('taptap_menu_description_bottom_padding'); ?>px;
    line-height:<?php echo get_theme_mod('taptap_menu_description_line_height'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_menu_description_letter_spacing'); ?>px;
}
<?php if(get_theme_mod('taptap_menu_description_theme_font')) { ?>
    .taptap-menu-item-description {
        font-family:<?php echo get_theme_mod('taptap_menu_description_theme_font'); ?>;
    }
<?php } else { ?>
    /* menu item description font */
    <?php $bonfire_taptap_menu_description_font = get_theme_mod('taptap_menu_description_font'); if($bonfire_taptap_menu_description_font != '') { switch ($bonfire_taptap_menu_description_font) { case 'style2': ?>
    .taptap-menu-item-description {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-menu-item-description {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-menu-item-description {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-menu-item-description {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-menu-item-description {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-menu-item-description {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-menu-item-description {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-menu-item-description {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-menu-item-description {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-menu-item-description {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-menu-item-description {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* MENU ITEM ICONS */
/* menu icons */
.taptap-by-bonfire ul li a i {
    color:<?php echo get_theme_mod('taptap_menu_icon_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_menu_icon_size'); ?>px;
    margin-top:<?php echo get_theme_mod('taptap_menu_icon_position'); ?>px;
}
/* submenu icons */
.taptap-by-bonfire .sub-menu a i {
    color:<?php echo get_theme_mod('taptap_submenu_icon_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_submenu_icon_size'); ?>px;
    margin-top:<?php echo get_theme_mod('taptap_submenu_icon_position'); ?>px;
}

/* WIDGETS */
/* widget top distance */
.taptap-widgets-wrapper { margin-top:<?php echo get_theme_mod('taptap_widget_top_distance'); ?>px; }
/* widget titles */
.taptap-widgets-wrapper .widget .widgettitle {
    color:<?php echo get_theme_mod('taptap_widget_title_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_widget_title_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_widget_title_letter_spacing'); ?>px;
    line-height:<?php echo get_theme_mod('taptap_widget_title_line_height'); ?>px;
}
/* widget title font */
<?php if(get_theme_mod('taptap_widget_title_theme_font')) { ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:<?php echo get_theme_mod('taptap_widget_title_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_widget_title_font = get_theme_mod('taptap_widget_title_font'); if($bonfire_taptap_widget_title_font != '') { switch ($bonfire_taptap_widget_title_font) { case 'style2': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-widgets-wrapper .widget .widgettitle {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>
/* widgets */
.taptap-widgets-wrapper .widget,
.taptap-widgets-wrapper .widget a {
    color:<?php echo get_theme_mod('taptap_widget_text_color'); ?>;
    font-size:<?php echo get_theme_mod('taptap_widget_font_size'); ?>px;
    letter-spacing:<?php echo get_theme_mod('taptap_widget_letter_spacing'); ?>px;
    line-height:<?php echo get_theme_mod('taptap_widget_line_height'); ?>px;
}
.taptap-widgets-wrapper .widget a {
    color:<?php echo get_theme_mod('taptap_widget_link_color'); ?>;
}
/* widget font */
<?php if(get_theme_mod('taptap_widget_theme_font')) { ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:<?php echo get_theme_mod('taptap_widget_theme_font'); ?>;
    }
<?php } else { ?>
    <?php $bonfire_taptap_widget_font = get_theme_mod('taptap_widget_font'); if($bonfire_taptap_widget_font != '') { switch ($bonfire_taptap_widget_font) { case 'style2': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Montserrat';
        font-weight:700;
    }
    <?php break; case 'style3': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Varela Round';
    }
    <?php break; case 'style4': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Hind Siliguri';
        font-weight:400;
    }
    <?php break; case 'style5': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Hind Siliguri';
        font-weight:600;
    }
    <?php break; case 'style6': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Dosis';
        font-weight:600;
    }
    <?php break; case 'style7': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Roboto';
        font-weight:100;
    }
    <?php break; case 'style8': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Roboto';
        font-weight:400;
    }
    <?php break; case 'style9': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Roboto Condensed';
        font-weight:400;
    }
    <?php break; case 'style10': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Roboto Condensed';
        font-weight:700;
    }
    <?php break; case 'style11': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Bree Serif';
    }
    <?php break; case 'style12': ?>
    .taptap-widgets-wrapper .widget,
    .taptap-widgets-wrapper .widget a {
        font-family:'Droid Serif';
    }
    <?php break; } } ?>
<?php } ?>

/* STYLED SCROLLBAR */
<?php if(get_theme_mod('taptap_styled_scrollbar_hover_only') != '') { ?>
.taptap-main-inner > .scroll-element .scroll-element_track,
.taptap-main-inner > .scroll-element .scroll-bar {
    opacity:0;
    -webkit-transition:opacity .75s ease .5s;
    -moz-transition:opacity .75s ease .5s;
    transition:opacity .75s ease .5s;
}
.taptap-main-inner:hover > .scroll-element .scroll-element_track,
.taptap-main-inner:hover > .scroll-element .scroll-bar {
    opacity:1;
    -webkit-transition:opacity .25s ease 0s;
    -moz-transition:opacity .25s ease 0s;
    transition:opacity .25s ease 0s;
}
<?php } ?>
/* show scrollbar styling, if scrollbar enabled */
<?php if(get_theme_mod('taptap_styled_scrollbar') != '') { ?>
.taptap-main-inner > .scroll-element.scroll-y {
    right:<?php echo get_theme_mod('taptap_styled_scrollbar_distance'); ?>px;
    top:<?php echo get_theme_mod('taptap_styled_scrollbar_distance'); ?>px;
    bottom:<?php echo get_theme_mod('taptap_styled_scrollbar_distance'); ?>px;
    width:<?php echo get_theme_mod('taptap_styled_scrollbar_width'); ?>px;
}
.taptap-main-inner > .scroll-element .scroll-element_outer,
.taptap-main-inner > .scroll-element .scroll-element_track,
.taptap-main-inner > .scroll-element .scroll-bar {
    -webkit-border-radius:<?php echo get_theme_mod('taptap_styled_scrollbar_rounded'); ?>px;
    -moz-border-radius:<?php echo get_theme_mod('taptap_styled_scrollbar_rounded'); ?>px;
    border-radius:<?php echo get_theme_mod('taptap_styled_scrollbar_rounded'); ?>px;
}
.taptap-main-inner > .scroll-element .scroll-bar { background-color:<?php echo get_theme_mod('taptap_styled_scrollbar_color'); ?>; }
.taptap-main-inner > .scroll-element.scroll-draggable .scroll-bar { background-color:<?php echo get_theme_mod('taptap_styled_scrollbar_color_dragged'); ?>; }
.taptap-main-inner > .scroll-element .scroll-element_track { background-color:<?php echo get_theme_mod('taptap_styled_scrollbar_background_color'); ?>; }
<?php } ?>

/* MISC */
/* show header + search when menu open */
<?php if(get_theme_mod('taptap_header_above_menu') != '') { ?>
.taptap-search-button-wrapper { z-index:999999; }
.taptap-logo-wrapper { z-index:999998; }
.taptap-header { z-index:999997; }
<?php } ?>
/* push down site by height of menu */
<?php if(get_theme_mod('taptap_push_down_site') != '') { ?>
html { margin-top:<?php if(get_theme_mod('taptap_header_height') != '') { ?><?php echo get_theme_mod('taptap_header_height'); ?><?php } else { ?>65<?php } ?>px; }
<?php } ?>
/* if submenu arrow divider is hidden */
<?php if(get_theme_mod('taptap_alternate_submenu_activation')) { ?>
.taptap-by-bonfire .menu li span {
    border:none;
}
.taptap-sub-arrow {
    margin-right:0;
    margin-left:0;
}
.taptap-sub-arrow { margin-right:0; }
<?php } ?>
</style>
<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->