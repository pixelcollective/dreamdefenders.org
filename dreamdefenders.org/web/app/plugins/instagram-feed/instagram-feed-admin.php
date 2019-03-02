<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function sbi_add_caps() {
	global $wp_roles;
	$wp_roles->add_cap( 'administrator', 'manage_instagram_feed_options' );
}
add_action( 'admin_init', 'sbi_add_caps' );

function sb_instagram_menu() {
    $cap = current_user_can( 'manage_instagram_feed_options' ) ? 'manage_instagram_feed_options' : 'manage_options';

    add_menu_page(
        __( 'Instagram Feed', 'instagram-feed' ),
        __( 'Instagram Feed', 'instagram-feed' ),
	    $cap,
        'sb-instagram-feed',
        'sb_instagram_settings_page'
    );
    add_submenu_page(
        'sb-instagram-feed',
        __( 'Settings', 'instagram-feed' ),
        __( 'Settings', 'instagram-feed' ),
	    $cap,
        'sb-instagram-feed',
        'sb_instagram_settings_page'
    );
}
add_action('admin_menu', 'sb_instagram_menu');

function sb_instagram_settings_page() {

    //Hidden fields
    $sb_instagram_settings_hidden_field = 'sb_instagram_settings_hidden_field';
    $sb_instagram_configure_hidden_field = 'sb_instagram_configure_hidden_field';
    $sb_instagram_customize_hidden_field = 'sb_instagram_customize_hidden_field';

    //Declare defaults
    $sb_instagram_settings_defaults = array(
        'sb_instagram_at'                   => '',
        'sb_instagram_user_id'              => '',
        'sb_instagram_preserve_settings'    => '',
        'sb_instagram_ajax_theme'           => false,
        'sb_instagram_cache_time'           => 1,
        'sb_instagram_cache_time_unit'      => 'hours',
        'sb_instagram_width'                => '100',
        'sb_instagram_width_unit'           => '%',
        'sb_instagram_feed_width_resp'      => false,
        'sb_instagram_height'               => '',
        'sb_instagram_num'                  => '20',
        'sb_instagram_height_unit'          => '',
        'sb_instagram_cols'                 => '4',
        'sb_instagram_disable_mobile'       => false,
        'sb_instagram_image_padding'        => '5',
        'sb_instagram_image_padding_unit'   => 'px',
        'sb_instagram_sort'                 => 'none',
        'sb_instagram_background'           => '',
        'sb_instagram_show_btn'             => true,
        'sb_instagram_btn_background'       => '',
        'sb_instagram_btn_text_color'       => '',
        'sb_instagram_btn_text'             => __( 'Load More...', 'instagram-feed' ),
        'sb_instagram_image_res'            => 'auto',
        //Header
        'sb_instagram_show_header'          => true,
        'sb_instagram_header_size'  => 'small',
        'sb_instagram_header_color'         => '',
        //Follow button
        'sb_instagram_show_follow_btn'      => true,
        'sb_instagram_folow_btn_background' => '',
        'sb_instagram_follow_btn_text_color' => '',
        'sb_instagram_follow_btn_text'      => __( 'Follow on Instagram', 'instagram-feed' ),
        //Misc
        'sb_instagram_custom_css'           => '',
        'sb_instagram_custom_js'            => '',
        'sb_instagram_cron'                 => 'no',
        'check_api'         => true,
        'sb_instagram_backup' => true,
        'enqueue_css_in_shortcode' => false,
        'sb_instagram_disable_mob_swipe' => false,
        'sbi_font_method' => 'svg',
        'sb_instagram_disable_awesome'      => false
    );
    //Save defaults in an array
    $options = wp_parse_args(get_option('sb_instagram_settings'), $sb_instagram_settings_defaults);
    update_option( 'sb_instagram_settings', $options );

    //Set the page variables
    $sb_instagram_at = $options[ 'sb_instagram_at' ];
    $sb_instagram_user_id = $options[ 'sb_instagram_user_id' ];
    $sb_instagram_preserve_settings = $options[ 'sb_instagram_preserve_settings' ];
    $sb_instagram_ajax_theme = $options[ 'sb_instagram_ajax_theme' ];
	$sb_instagram_cache_time = $options[ 'sb_instagram_cache_time' ];
	$sb_instagram_cache_time_unit = $options[ 'sb_instagram_cache_time_unit' ];

	$sb_instagram_width = $options[ 'sb_instagram_width' ];
    $sb_instagram_width_unit = $options[ 'sb_instagram_width_unit' ];
    $sb_instagram_feed_width_resp = $options[ 'sb_instagram_feed_width_resp' ];
    $sb_instagram_height = $options[ 'sb_instagram_height' ];
    $sb_instagram_height_unit = $options[ 'sb_instagram_height_unit' ];
    $sb_instagram_num = $options[ 'sb_instagram_num' ];
    $sb_instagram_cols = $options[ 'sb_instagram_cols' ];
    $sb_instagram_disable_mobile = $options[ 'sb_instagram_disable_mobile' ];
    $sb_instagram_image_padding = $options[ 'sb_instagram_image_padding' ];
    $sb_instagram_image_padding_unit = $options[ 'sb_instagram_image_padding_unit' ];
    $sb_instagram_sort = $options[ 'sb_instagram_sort' ];
    $sb_instagram_background = $options[ 'sb_instagram_background' ];
    $sb_instagram_show_btn = $options[ 'sb_instagram_show_btn' ];
    $sb_instagram_btn_background = $options[ 'sb_instagram_btn_background' ];
    $sb_instagram_btn_text_color = $options[ 'sb_instagram_btn_text_color' ];
    $sb_instagram_btn_text = $options[ 'sb_instagram_btn_text' ];
    $sb_instagram_image_res = $options[ 'sb_instagram_image_res' ];
    //Header
    $sb_instagram_show_header = $options[ 'sb_instagram_show_header' ];
	$sb_instagram_header_size = $options[ 'sb_instagram_header_size' ];
	$sb_instagram_show_bio = isset( $options[ 'sb_instagram_show_bio' ] ) ? $options[ 'sb_instagram_show_bio' ] : true;
    $sb_instagram_header_color = $options[ 'sb_instagram_header_color' ];
    //Follow button
    $sb_instagram_show_follow_btn = $options[ 'sb_instagram_show_follow_btn' ];
    $sb_instagram_folow_btn_background = $options[ 'sb_instagram_folow_btn_background' ];
    $sb_instagram_follow_btn_text_color = $options[ 'sb_instagram_follow_btn_text_color' ];
    $sb_instagram_follow_btn_text = $options[ 'sb_instagram_follow_btn_text' ];
    //Misc
    $sb_instagram_custom_css = $options[ 'sb_instagram_custom_css' ];
    $sb_instagram_custom_js = $options[ 'sb_instagram_custom_js' ];
	$sb_instagram_cron = $options[ 'sb_instagram_cron' ];
	$check_api = $options[ 'check_api' ];
	$sb_instagram_backup = $options[ 'sb_instagram_backup' ];
	$sbi_font_method = $options[ 'sbi_font_method' ];
	$sb_instagram_disable_awesome = $options[ 'sb_instagram_disable_awesome' ];


    //Check nonce before saving data
    if ( ! isset( $_POST['sb_instagram_settings_nonce'] ) || ! wp_verify_nonce( $_POST['sb_instagram_settings_nonce'], 'sb_instagram_saving_settings' ) ) {
        //Nonce did not verify
    } else {
        // See if the user has posted us some information. If they did, this hidden field will be set to 'Y'.
        if( isset($_POST[ $sb_instagram_settings_hidden_field ]) && $_POST[ $sb_instagram_settings_hidden_field ] == 'Y' ) {

            if( isset($_POST[ $sb_instagram_configure_hidden_field ]) && $_POST[ $sb_instagram_configure_hidden_field ] == 'Y' ) {

                $sb_instagram_at = sanitize_text_field( $_POST[ 'sb_instagram_at' ] );
	            $sb_instagram_user_id = array();
	            if ( isset( $_POST[ 'sb_instagram_user_id' ] )) {
		            if ( is_array( $_POST[ 'sb_instagram_user_id' ] ) ) {
			            foreach( $_POST[ 'sb_instagram_user_id' ] as $user_id ) {
				            $sb_instagram_user_id[] = sanitize_text_field( $user_id );
			            }
		            } else {
			            $sb_instagram_user_id[] = sanitize_text_field( $_POST[ 'sb_instagram_user_id' ] );
		            }
	            }
                isset($_POST[ 'sb_instagram_preserve_settings' ]) ? $sb_instagram_preserve_settings = sanitize_text_field( $_POST[ 'sb_instagram_preserve_settings' ] ) : $sb_instagram_preserve_settings = '';
	            isset($_POST[ 'sb_instagram_cache_time' ]) ? $sb_instagram_cache_time = sanitize_text_field( $_POST[ 'sb_instagram_cache_time' ] ) : $sb_instagram_cache_time = '';
	            isset($_POST[ 'sb_instagram_cache_time_unit' ]) ? $sb_instagram_cache_time_unit = sanitize_text_field( $_POST[ 'sb_instagram_cache_time_unit' ] ) : $sb_instagram_cache_time_unit = '';

                $options[ 'sb_instagram_at' ] = $sb_instagram_at;
                $options[ 'sb_instagram_user_id' ] = $sb_instagram_user_id;
                $options[ 'sb_instagram_preserve_settings' ] = $sb_instagram_preserve_settings;

	            $options[ 'sb_instagram_cache_time' ] = $sb_instagram_cache_time;
	            $options[ 'sb_instagram_cache_time_unit' ] = $sb_instagram_cache_time_unit;

	            //Delete all SBI transients
	            global $wpdb;
	            $table_name = $wpdb->prefix . "options";
	            $wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_sbi\_%')
                    " );
	            $wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_timeout\_sbi\_%')
                    " );
	            $wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_&sbi\_%')
			        " );
	            $wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_timeout\_&sbi\_%')
			        " );
            } //End config tab post

            if( isset($_POST[ $sb_instagram_customize_hidden_field ]) && $_POST[ $sb_instagram_customize_hidden_field ] == 'Y' ) {
                
                //Validate and sanitize width field
                $safe_width = intval( sanitize_text_field( $_POST['sb_instagram_width'] ) );
                if ( ! $safe_width ) $safe_width = '';
                if ( strlen( $safe_width ) > 4 ) $safe_width = substr( $safe_width, 0, 4 );
                $sb_instagram_width = $safe_width;

                $sb_instagram_width_unit = sanitize_text_field( $_POST[ 'sb_instagram_width_unit' ] );
                isset($_POST[ 'sb_instagram_feed_width_resp' ]) ? $sb_instagram_feed_width_resp = sanitize_text_field( $_POST[ 'sb_instagram_feed_width_resp' ] ) : $sb_instagram_feed_width_resp = '';

                //Validate and sanitize height field
                $safe_height = intval( sanitize_text_field( $_POST['sb_instagram_height'] ) );
                if ( ! $safe_height ) $safe_height = '';
                if ( strlen( $safe_height ) > 4 ) $safe_height = substr( $safe_height, 0, 4 );
                $sb_instagram_height = $safe_height;

                $sb_instagram_height_unit = sanitize_text_field( $_POST[ 'sb_instagram_height_unit' ] );

                //Validate and sanitize number of photos field
                $safe_num = intval( sanitize_text_field( $_POST['sb_instagram_num'] ) );
                if ( ! $safe_num ) $safe_num = '';
                if ( strlen( $safe_num ) > 4 ) $safe_num = substr( $safe_num, 0, 4 );
                $sb_instagram_num = $safe_num;

                $sb_instagram_cols = sanitize_text_field( $_POST[ 'sb_instagram_cols' ] );
                isset($_POST[ 'sb_instagram_disable_mobile' ]) ? $sb_instagram_disable_mobile = sanitize_text_field( $_POST[ 'sb_instagram_disable_mobile' ] ) : $sb_instagram_disable_mobile = '';

                //Validate and sanitize padding field
                $safe_padding = intval( sanitize_text_field( $_POST['sb_instagram_image_padding'] ) );
                if ( ! $safe_padding ) $safe_padding = '';
                if ( strlen( $safe_padding ) > 4 ) $safe_padding = substr( $safe_padding, 0, 4 );
                $sb_instagram_image_padding = $safe_padding;

                $sb_instagram_image_padding_unit = sanitize_text_field( $_POST[ 'sb_instagram_image_padding_unit' ] );
                $sb_instagram_sort = sanitize_text_field( $_POST[ 'sb_instagram_sort' ] );
                $sb_instagram_background = sanitize_text_field( $_POST[ 'sb_instagram_background' ] );
                isset($_POST[ 'sb_instagram_show_btn' ]) ? $sb_instagram_show_btn = sanitize_text_field( $_POST[ 'sb_instagram_show_btn' ] ) : $sb_instagram_show_btn = '';
                $sb_instagram_btn_background = sanitize_text_field( $_POST[ 'sb_instagram_btn_background' ] );
                $sb_instagram_btn_text_color = sanitize_text_field( $_POST[ 'sb_instagram_btn_text_color' ] );
	            $sb_instagram_btn_text = sanitize_text_field( $_POST[ 'sb_instagram_btn_text' ] );
                $sb_instagram_image_res = sanitize_text_field( $_POST[ 'sb_instagram_image_res' ] );
                //Header
                isset($_POST[ 'sb_instagram_show_header' ]) ? $sb_instagram_show_header = sanitize_text_field( $_POST[ 'sb_instagram_show_header' ] ) : $sb_instagram_show_header = '';
                isset($_POST[ 'sb_instagram_show_bio' ]) ? $sb_instagram_show_bio = sanitize_text_field( $_POST[ 'sb_instagram_show_bio' ] ) : $sb_instagram_show_bio = '';
	            if (isset($_POST[ 'sb_instagram_header_size' ]) ) $sb_instagram_header_size = $_POST[ 'sb_instagram_header_size' ];

                $sb_instagram_header_color = sanitize_text_field( $_POST[ 'sb_instagram_header_color' ] );
                //Follow button
                isset($_POST[ 'sb_instagram_show_follow_btn' ]) ? $sb_instagram_show_follow_btn = sanitize_text_field( $_POST[ 'sb_instagram_show_follow_btn' ] ) : $sb_instagram_show_follow_btn = '';
                $sb_instagram_folow_btn_background = sanitize_text_field( $_POST[ 'sb_instagram_folow_btn_background' ] );
                $sb_instagram_follow_btn_text_color = sanitize_text_field( $_POST[ 'sb_instagram_follow_btn_text_color' ] );
                $sb_instagram_follow_btn_text = sanitize_text_field( $_POST[ 'sb_instagram_follow_btn_text' ] );
                //Misc
                $sb_instagram_custom_css = $_POST[ 'sb_instagram_custom_css' ];
                $sb_instagram_custom_js = $_POST[ 'sb_instagram_custom_js' ];
                isset($_POST[ 'sb_instagram_ajax_theme' ]) ? $sb_instagram_ajax_theme = sanitize_text_field( $_POST[ 'sb_instagram_ajax_theme' ] ) : $sb_instagram_ajax_theme = '';
	            if (isset($_POST[ 'sb_instagram_cron' ]) ) $sb_instagram_cron = $_POST[ 'sb_instagram_cron' ];
	            isset($_POST[ 'check_api' ]) ? $check_api = $_POST[ 'check_api' ] : $check_api = '';
	            isset($_POST[ 'sb_instagram_backup' ]) ? $sb_instagram_backup = $_POST[ 'sb_instagram_backup' ] : $sb_instagram_backup = '';
	            isset($_POST[ 'sbi_font_method' ]) ? $sbi_font_method = $_POST[ 'sbi_font_method' ] : $sbi_font_method = 'svg';
	            isset($_POST[ 'sb_instagram_disable_awesome' ]) ? $sb_instagram_disable_awesome = sanitize_text_field( $_POST[ 'sb_instagram_disable_awesome' ] ) : $sb_instagram_disable_awesome = '';

                $options[ 'sb_instagram_width' ] = $sb_instagram_width;
                $options[ 'sb_instagram_width_unit' ] = $sb_instagram_width_unit;
                $options[ 'sb_instagram_feed_width_resp' ] = $sb_instagram_feed_width_resp;
                $options[ 'sb_instagram_height' ] = $sb_instagram_height;
                $options[ 'sb_instagram_height_unit' ] = $sb_instagram_height_unit;
                $options[ 'sb_instagram_num' ] = $sb_instagram_num;
                $options[ 'sb_instagram_cols' ] = $sb_instagram_cols;
                $options[ 'sb_instagram_disable_mobile' ] = $sb_instagram_disable_mobile;
                $options[ 'sb_instagram_image_padding' ] = $sb_instagram_image_padding;
                $options[ 'sb_instagram_image_padding_unit' ] = $sb_instagram_image_padding_unit;
                $options[ 'sb_instagram_sort' ] = $sb_instagram_sort;
                $options[ 'sb_instagram_background' ] = $sb_instagram_background;
                $options[ 'sb_instagram_show_btn' ] = $sb_instagram_show_btn;
                $options[ 'sb_instagram_btn_background' ] = $sb_instagram_btn_background;
                $options[ 'sb_instagram_btn_text_color' ] = $sb_instagram_btn_text_color;
	            $options[ 'sb_instagram_btn_text' ] = $sb_instagram_btn_text;
                $options[ 'sb_instagram_image_res' ] = $sb_instagram_image_res;
                //Header
                $options[ 'sb_instagram_show_header' ] = $sb_instagram_show_header;
	            $options[ 'sb_instagram_header_size' ] = $sb_instagram_header_size;
	            $options[ 'sb_instagram_show_bio' ] = $sb_instagram_show_bio;
                $options[ 'sb_instagram_header_color' ] = $sb_instagram_header_color;
                //Follow button
                $options[ 'sb_instagram_show_follow_btn' ] = $sb_instagram_show_follow_btn;
                $options[ 'sb_instagram_folow_btn_background' ] = $sb_instagram_folow_btn_background;
                $options[ 'sb_instagram_follow_btn_text_color' ] = $sb_instagram_follow_btn_text_color;
                $options[ 'sb_instagram_follow_btn_text' ] = $sb_instagram_follow_btn_text;
                //Misc
                $options[ 'sb_instagram_custom_css' ] = $sb_instagram_custom_css;
                $options[ 'sb_instagram_custom_js' ] = $sb_instagram_custom_js;
                $options[ 'sb_instagram_ajax_theme' ] = $sb_instagram_ajax_theme;
	            $options[ 'sb_instagram_cron' ] = $sb_instagram_cron;
	            $options[ 'check_api' ] = $check_api;
	            $options['sb_instagram_backup'] = $sb_instagram_backup;
	            $options['sbi_font_method'] = $sbi_font_method;
	            $options[ 'sb_instagram_disable_awesome' ] = $sb_instagram_disable_awesome;

	            //clear expired tokens
	            delete_option( 'sb_expired_tokens' );

	            //Delete all SBI transients
	            global $wpdb;
	            $table_name = $wpdb->prefix . "options";
	            $wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_sbi\_%')
                    " );
	            $wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_timeout\_sbi\_%')
                    " );
	            $wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_&sbi\_%')
			        " );
	            $wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_timeout\_&sbi\_%')
			        " );

	            if( $sb_instagram_cron == 'no' ) wp_clear_scheduled_hook('sb_instagram_cron_job');

	            //Run cron when Misc settings are saved
	            if( $sb_instagram_cron == 'yes' ){
		            //Clear the existing cron event
		            wp_clear_scheduled_hook('sb_instagram_cron_job');

		            $sb_instagram_cache_time = $options[ 'sb_instagram_cache_time' ];
		            $sb_instagram_cache_time_unit = $options[ 'sb_instagram_cache_time_unit' ];

		            //Set the event schedule based on what the caching time is set to
		            $sb_instagram_cron_schedule = 'hourly';
		            if( $sb_instagram_cache_time_unit == 'hours' && $sb_instagram_cache_time > 5 ) $sb_instagram_cron_schedule = 'twicedaily';
		            if( $sb_instagram_cache_time_unit == 'days' ) $sb_instagram_cron_schedule = 'daily';

		            wp_schedule_event(time(), $sb_instagram_cron_schedule, 'sb_instagram_cron_job');

		            sb_instagram_clear_page_caches();
	            }
                
            } //End customize tab post
            
            //Save the settings to the settings array
            update_option( 'sb_instagram_settings', $options );

        ?>
        <div class="updated"><p><strong><?php _e( 'Settings saved.', 'instagram-feed' ); ?></strong></p></div>
        <?php } ?>

    <?php } //End nonce check ?>


    <div id="sbi_admin" class="wrap">

        <div id="header">
            <h1><?php _e( 'Instagram Feed', 'instagram-feed' ); ?></h1>
        </div>
    
        <form name="form1" method="post" action="">
            <input type="hidden" name="<?php echo $sb_instagram_settings_hidden_field; ?>" value="Y">
            <?php wp_nonce_field( 'sb_instagram_saving_settings', 'sb_instagram_settings_nonce' ); ?>

            <?php $sbi_active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'configure'; ?>
            <h2 class="nav-tab-wrapper">
                <a href="?page=sb-instagram-feed&amp;tab=configure" class="nav-tab <?php echo $sbi_active_tab == 'configure' ? 'nav-tab-active' : ''; ?>"><?php _e( '1. Configure', 'instagram-feed' ); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=customize" class="nav-tab <?php echo $sbi_active_tab == 'customize' ? 'nav-tab-active' : ''; ?>"><?php _e( '2. Customize', 'instagram-feed' ); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=display"   class="nav-tab <?php echo $sbi_active_tab == 'display'   ? 'nav-tab-active' : ''; ?>"><?php _e( '3. Display Your Feed', 'instagram-feed' ); ?></a>
                <a href="?page=sb-instagram-feed&amp;tab=support"   class="nav-tab <?php echo $sbi_active_tab == 'support'   ? 'nav-tab-active' : ''; ?>"><?php _e( 'Support', 'instagram-feed' ); ?></a>
            </h2>

            <?php if( $sbi_active_tab == 'configure' ) { //Start Configure tab ?>
            <input type="hidden" name="<?php echo $sb_instagram_configure_hidden_field; ?>" value="Y">

            <table class="form-table">
                <tbody>
                    <h3><?php _e( 'Configure', 'instagram-feed' ); ?></h3>

                    <div id="sbi_config">
                        <!-- <a href="https://instagram.com/oauth/authorize/?client_id=1654d0c81ad04754a898d89315bec227&redirect_uri=https://smashballoon.com/instagram-feed/instagram-token-plugin/?return_uri=<?php echo admin_url('admin.php?page=sb-instagram-feed'); ?>&response_type=token" class="sbi_admin_btn"><?php _e( 'Log in and get my Access Token and User ID', 'instagram-feed' ); ?></a> -->
                        <a href="https://instagram.com/oauth/authorize/?client_id=3a81a9fa2a064751b8c31385b91cc25c&scope=basic+public_content&redirect_uri=https://api.smashballoon.com/instagram-plugin-token.php?return_uri=<?php echo admin_url('admin.php?page=sb-instagram-feed'); ?>&response_type=token&state=<?php echo admin_url('admin.php?page-sb-instagram-feed'); ?>" class="sbi_admin_btn"><i class="fa fa-user-plus" aria-hidden="true" style="font-size: 20px;"></i>&nbsp; <?php _e( 'Connect an Instagram Account', 'instagram-feed' ); ?></a>
                        <a href="https://smashballoon.com/instagram-feed/token/?utm_source=plugin-free&utm_campaign=sbi" target="_blank" style="position: relative; top: 14px; left: 15px;"><?php _e( 'Button not working?', 'instagram-feed' ); ?></a>
                    </div>

                    <!-- Old Access Token -->
                    <input name="sb_instagram_at" id="sb_instagram_at" type="hidden" value="<?php echo esc_attr( $sb_instagram_at ); ?>" size="80" maxlength="100" placeholder="Click button above to get your Access Token" />

                    <?php

                    $returned_data = sbi_get_connected_accounts_data( $sb_instagram_at );
                    $connected_accounts = $returned_data['connected_accounts'];
                    $user_feeds_returned = isset(  $returned_data['user_ids'] ) ? $returned_data['user_ids'] : false;
                    if ( $user_feeds_returned ) {
	                    $user_feed_ids = $user_feeds_returned;
                    } else {
	                    $user_feed_ids = ! is_array( $sb_instagram_user_id ) ? explode( ',', $sb_instagram_user_id ) : $sb_instagram_user_id;
                    }
                    $expired_tokens = get_option( 'sb_expired_tokens', array() );
                    $sb_instagram_type = 'user';
                    ?>

                    <tr valign="top">
                        <th scope="row"><label><?php _e( 'Instagram Accounts', 'instagram-feed' ); ?></label><span style="font-weight:normal; font-style:italic; font-size: 12px; display: block;"><?php _e( 'Use the button above to connect an Instagram account', 'instagram-feed' ); ?></span></th>
                        <td class="sbi_connected_accounts_wrap">
		                    <?php if ( empty( $connected_accounts ) ) : ?>
                                <p class="sbi_no_accounts"><?php _e( 'No Instagram accounts connected. Click the button above to connect an account.', 'instagram-feed' ); ?></p><br />
		                    <?php else:  ?>
			                    <?php foreach ( $connected_accounts as $account ) :
				                    $username = $account['username'] ? $account['username'] : $account['user_id'];
				                    $profile_picture = $account['profile_picture'] ? '<img class="sbi_ca_avatar" src="'.$account['profile_picture'].'" />' : ''; //Could add placeholder avatar image
				                    $access_token_expired = (in_array(  $account['access_token'], $expired_tokens, true ) || in_array( sbi_maybe_clean( $account['access_token'] ), $expired_tokens, true ));
				                    $is_invalid_class = ! $account['is_valid'] || $access_token_expired ? ' sbi_account_invalid' : '';
				                    $in_user_feed = in_array( $account['user_id'], $user_feed_ids, true );
				                    ?>
                                    <div class="sbi_connected_account<?php echo $is_invalid_class; ?><?php if ( $in_user_feed ) echo ' sbi_account_active' ?>" id="sbi_connected_account_<?php esc_attr_e( $account['user_id'] ); ?>" data-accesstoken="<?php esc_attr_e( $account['access_token'] ); ?>" data-userid="<?php esc_attr_e( $account['user_id'] ); ?>" data-username="<?php esc_attr_e( $account['username'] ); ?>">

                                        <div class="sbi_ca_alert">
                                            <span><?php _e( 'The Access Token for this account is expired or invalid. Click the button above to attempt to renew it.', 'instagram-feed' ) ?></span>
                                        </div>
                                        <div class="sbi_ca_info">

                                            <div class="sbi_ca_delete">
                                                <a href="JavaScript:void(0);" class="sbi_delete_account"><i class="fa fa-times"></i><span class="sbi_remove_text"><?php _e( 'Remove', 'instagram-feed' ); ?></span></a>
                                            </div>

                                            <div class="sbi_ca_username">
							                    <?php echo $profile_picture; ?>
                                                <strong><?php echo $username; ?></strong>
                                            </div>

                                            <div class="sbi_ca_actions">
							                    <?php if ( ! $in_user_feed ) : ?>
                                                    <a href="JavaScript:void(0);" class="sbi_use_in_user_feed button-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i><?php _e( 'Add to Primary Feed', 'instagram-feed' ); ?></a>
							                    <?php else : ?>
                                                    <a href="JavaScript:void(0);" class="sbi_remove_from_user_feed button-primary"><i class="fa fa-minus-circle" aria-hidden="true"></i><?php _e( 'Remove from Primary Feed', 'instagram-feed' ); ?></a>
							                    <?php endif; ?>
                                                <a class="sbi_ca_token_shortcode button-secondary" href="JavaScript:void(0);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i><?php _e( 'Add to another Feed', 'instagram-feed' ); ?></a>
                                                <p class="sbi_ca_show_token"><input type="checkbox" id="sbi_ca_show_token_<?php esc_attr_e( $account['user_id'] ); ?>" /><label for="sbi_ca_show_token_<?php esc_attr_e( $account['user_id'] ); ?>"><?php _e( 'Show Access Token', 'instagram-feed' ); ?></label></p>

                                            </div>

                                            <div class="sbi_ca_shortcode">

                                                <p><?php _e( 'Copy and paste this shortcode into your page or widget area:', 'instagram-feed' ); ?><br>
								                    <?php if ( !empty( $account['username'] ) ) : ?>
                                                        <code>[instagram-feed user="<?php echo $account['username']; ?>"]</code>
								                    <?php else : ?>
                                                        <code>[instagram-feed accesstoken="<?php echo $account['access_token']; ?>"]</code>
								                    <?php endif; ?>
                                                </p>

                                                <p><?php _e( 'To add multiple users in the same feed, simply separate them using commas:', 'instagram-feed' ); ?><br>
								                    <?php if ( !empty( $account['username'] ) ) : ?>
                                                        <code>[instagram-feed user="<?php echo $account['username']; ?>, a_second_user, a_third_user"]</code>
								                    <?php else : ?>
                                                        <code>[instagram-feed accesstoken="<?php echo $account['access_token']; ?>, another_access_token"]</code>
								                    <?php endif; ?>

                                                <p><?php _e( 'Click on the <a href="?page=sb-instagram-feed&tab=display" target="_blank">Display Your Feed</a> tab to learn more about shortcodes', 'instagram-feed' ); ?></p>
                                            </div>

                                            <div class="sbi_ca_accesstoken">
                                                <span class="sbi_ca_token_label"><?php _e( 'Access Token:', 'instagram-feed' ); ?></span><input type="text" class="sbi_ca_token" value="<?php echo $account['access_token']; ?>" readonly="readonly" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac).">
                                            </div>

                                        </div>

                                    </div>

			                    <?php endforeach;  ?>
		                    <?php endif; ?>
                            <a href="JavaScript:void(0);" class="sbi_manually_connect button-secondary"><?php _e( 'Manually Connect an Account', 'instagram-feed' ); ?></a>
                            <div class="sbi_manually_connect_wrap">
                                <input name="sb_manual_at" id="sb_manual_at" type="text" value="" style="margin-top: 4px; padding: 5px 9px; margin-left: 0px;" size="64" maxlength="100" placeholder="<?php _e( 'Enter a valid Instagram Access Token', 'instagram-feed' ); ?>" />
                                <p class="sbi_submit" style="display: inline-block;"><button name="submit" id="sbi_manual_submit" class="button button-primary"><?php _e( 'Connect This Account', 'instagram-feed' ); ?></button></p>
                            </div>
                        </td>
                    </tr>

                    <tr valign="top" class="sbi_feed_type">
                        <th scope="row"><label><?php _e('Show Photos From:', 'instagram-feed'); ?></label><code class="sbi_shortcode"> type
                            Eg: type=user id=12986477
                        </code></th>
                        <td>
                            <div class="sbi_row">
                                <div class="sbi_col sbi_one">
                                    <input type="radio" name="sb_instagram_type" id="sb_instagram_type_user" value="user" <?php if($sb_instagram_type == "user") echo "checked"; ?> />
                                    <label class="sbi_radio_label" for="sb_instagram_type_user"><?php _e( 'User Account:', 'instagram-feed' ); ?></label>
                                </div>
                                <div class="sbi_col sbi_two">
                                    <div class="sbi_user_feed_ids_wrap">
				                        <?php foreach ( $user_feed_ids as $feed_id ) : if ( $feed_id !== '' ) :?>
                                            <?php if( count($connected_accounts) > 0 ) { ?><div id="sbi_user_feed_id_<?php echo $feed_id; ?>" class="sbi_user_feed_account_wrap"><?php } ?>

						                        <?php if ( isset( $connected_accounts[ $feed_id ] ) && ! empty( $connected_accounts[ $feed_id ]['username'] ) ) : ?>
                                                    <strong><?php echo $connected_accounts[ $feed_id ]['username']; ?></strong> <span>(<?php echo $feed_id; ?>)</span>
                                                    <input name="sb_instagram_user_id[]" id="sb_instagram_user_id" type="hidden" value="<?php esc_attr_e( $feed_id ); ?>" />
						                        <?php elseif ( isset( $connected_accounts[ $feed_id ] ) && ! empty( $connected_accounts[ $feed_id ]['access_token'] ) ) : ?>
                                                    <strong><?php echo $feed_id; ?></strong>
                                                    <input name="sb_instagram_user_id[]" id="sb_instagram_user_id" type="hidden" value="<?php esc_attr_e( $feed_id ); ?>" />
						                        <?php endif; ?>

                                            <?php if( count($connected_accounts) > 0 ) { ?></div><?php } ?>
				                        <?php endif; endforeach; ?>
                                    </div>

			                        <?php if ( empty( $user_feed_ids ) ) : ?>
                                        <p class="sbi_no_accounts" style="margin-top: -3px; margin-right: 10px;"><?php _e( 'Connect a user account above', 'instagram-feed' ); ?></p>
			                        <?php endif; ?>

                                    <a class="sbi_tooltip_link" href="JavaScript:void(0);" style="margin: 5px 0 10px 0; display: inline-block; height: 19px;"><?php _e("How to display User feeds", 'instagram-feed' ); ?></a>
                                    <div class="sbi_tooltip"><?php _e("<p><b>Displaying Posts from Your User Account</b><br />Simply connect an account using the button above.</p><p style='padding-top:8px;'><b>Displaying Posts from Other Instagram Accounts</b><br />Due to recent changes in the Instagram API it is no longer possible to display photos from other Instagram accounts which you do not have access to. You can only display the user feed of an account which you connect above. You can connect as many account as you like by logging in using the button above, or manually copy/pasting an Access Token by selecting the 'Manually Connect an Account' option.</p><p style='padding-top:10px;'><b>Multiple Acounts</b><br />It is only possible to display feeds from Instagram accounts which you own. In order to display feeds from multiple accounts, first connect them above and then use the buttons to add the account either to your primary feed or to another feed on your site.</p>", 'instagram-feed'); ?></div><br />
                                </div>

                            </div>
                            
                            <div class="sbi_pro sbi_row">
                                <div class="sbi_col sbi_one">
                                    <input disabled type="radio" name="sb_instagram_type" id="sb_instagram_type_hashtag" value="hashtag" <?php if($sb_instagram_type == "hashtag") echo "checked"; ?> />
                                    <label class="sbi_radio_label" for="sb_instagram_type_hashtag"><?php _e( 'Hashtag:', 'instagram-feed' ); ?></label>
                                </div>
                                <div class="sbi_col sbi_two">

                                    <p class="sbi_pro_tooltip"><?php _e( 'Upgrade to the Pro version to display hashtag feeds', 'instagram-feed' ); ?><i class="fa fa-caret-down" aria-hidden="true"></i></p>
                                    <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank" class="sbi_lock"><i class="fa fa-rocket"></i>Pro</a>

                                    <input readonly type="text" size="25" style="height: 32px; top: -2px; position: relative; box-shadow: none;" />
                                    &nbsp;<a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);"><?php _e( 'What is this?', 'instagram-feed' ); ?></a>

                                    <p class="sbi_tooltip"><?php _e( 'Display posts from a specific hashtag instead of from a user', 'instagram-feed' ); ?></p>
                                </div>
                            </div>

                            <div class="sbi_row sbi_pro">
                             <br>
                                <a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);" style="margin-left: 0;"><i class="fa fa-question-circle" aria-hidden="true" style="margin-right: 6px;"></i><?php _e('Combine multiple feed types into a single feed', 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip">
                                    <b><?php _e( 'Please note: this is only available in the <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">Pro version</a>', 'instagram-feed' ); ?>.</b><br />
                                    <?php echo sprintf( __('To display multiple feed types in a single feed, use %s in your shortcode and then add each user name or hashtag of each feed into the shortcode, like so: %s. This will combine a user feed and a hashtag feed into the same feed.', 'instagram-feed'), 'type="mixed"', '<code>[instagram-feed type="mixed" user="smashballoon" hashtag="#awesomeplugins"]</code>' ); ?>
                                </p>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <th class="bump-left"><label for="sb_instagram_preserve_settings" class="bump-left"><?php _e("Preserve settings when plugin is removed", 'instagram-feed'); ?></label></th>
                        <td>
                            <input name="sb_instagram_preserve_settings" type="checkbox" id="sb_instagram_preserve_settings" <?php if($sb_instagram_preserve_settings == true) echo "checked"; ?> />
                            <label for="sb_instagram_preserve_settings"><?php _e('Yes', 'instagram-feed'); ?></label>
                            <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e('When removing the plugin your settings are automatically erased. Checking this box will prevent any settings from being deleted. This means that you can uninstall and reinstall the plugin without losing your settings.', 'instagram-feed'); ?></p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label><?php _e('Check for new posts every', 'instagram-feed'); ?></label></th>
                        <td>
                            <input name="sb_instagram_cache_time" type="text" value="<?php esc_attr_e( $sb_instagram_cache_time ); ?>" size="4" />
                            <select name="sb_instagram_cache_time_unit">
                                <option value="minutes" <?php if($sb_instagram_cache_time_unit == "minutes") echo 'selected="selected"' ?> ><?php _e('Minutes', 'instagram-feed'); ?></option>
                                <option value="hours" <?php if($sb_instagram_cache_time_unit == "hours") echo 'selected="selected"' ?> ><?php _e('Hours', 'instagram-feed'); ?></option>
                                <option value="days" <?php if($sb_instagram_cache_time_unit == "days") echo 'selected="selected"' ?> ><?php _e('Days', 'instagram-feed'); ?></option>
                            </select>
                            <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e('Your Instagram posts are temporarily cached by the plugin in your WordPress database. You can choose how long the posts should be cached for. If you set the time to 1 hour then the plugin will clear the cache after that length of time and check Instagram for posts again.', 'instagram-feed'); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php submit_button(); ?>
        </form>

        <p><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp; <?php _e('Next Step: <a href="?page=sb-instagram-feed&tab=customize">Customize your Feed</a>', 'instagram-feed'); ?></p>

        <p><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp; <?php _e('Need help setting up the plugin? Check out our <a href="https://smashballoon.com/instagram-feed/free/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">setup directions</a>', 'instagram-feed'); ?></p>


    <?php } // End Configure tab ?>



    <?php if( $sbi_active_tab == 'customize' ) { //Start Configure tab ?>

    <p class="sb_instagram_contents_links" id="general">
        <span><?php _e( 'Quick links:', 'instagram-feed' ); ?> </span>
        <a href="#general"><?php _e( 'General', 'instagram-feed' ); ?></a>
        <a href="#layout"><?php _e( 'Layout', 'instagram-feed' ); ?></a>
        <a href="#photos"><?php _e( 'Photos', 'instagram-feed' ); ?></a>
        <a href="#headeroptions"><?php _e( 'Header', 'instagram-feed' ); ?></a>
        <a href="#loadmore"><?php _e( "'Load More' Button", 'instagram-feed' ); ?></a>
        <a href="#follow"><?php _e( "'Follow' Button", 'instagram-feed' ); ?></a>
        <a href="#customcss"><?php _e( 'Custom CSS', 'instagram-feed' ); ?></a>
        <a href="#customjs"><?php _e( 'Custom JavaScript', 'instagram-feed' ); ?></a>
    </p>

    <input type="hidden" name="<?php echo $sb_instagram_customize_hidden_field; ?>" value="Y">

        <h3><?php _e( 'General', 'instagram-feed' ); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Width of Feed', 'instagram-feed'); ?></label><code class="sbi_shortcode"> width  widthunit
                        Eg: width=50 widthunit=%</code></th>
                    <td>
                        <input name="sb_instagram_width" type="text" value="<?php echo esc_attr( $sb_instagram_width ); ?>" id="sb_instagram_width" size="4" maxlength="4" />
                        <select name="sb_instagram_width_unit" id="sb_instagram_width_unit">
                            <option value="px" <?php if($sb_instagram_width_unit == "px") echo 'selected="selected"' ?> ><?php _e('px', 'instagram-feed'); ?></option>
                            <option value="%" <?php if($sb_instagram_width_unit == "%") echo 'selected="selected"' ?> ><?php _e('%', 'instagram-feed'); ?></option>
                        </select>
                        <div id="sb_instagram_width_options">
                            <input name="sb_instagram_feed_width_resp" type="checkbox" id="sb_instagram_feed_width_resp" <?php if($sb_instagram_feed_width_resp == true) echo "checked"; ?> /><label for="sb_instagram_feed_width_resp"><?php _e('Set to be 100% width on mobile?', 'instagram-feed'); ?></label>
                            <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e( 'What does this mean?', 'instagram-feed' ); ?></a>
                            <p class="sbi_tooltip"><?php _e("If you set a width on the feed then this will be used on mobile as well as desktop. Check this setting to set the feed width to be 100% on mobile so that it is responsive.", 'instagram-feed'); ?></p>
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Height of Feed', 'instagram-feed'); ?></label><code class="sbi_shortcode"> height  heightunit
                        Eg: height=500 heightunit=px</code></th>
                    <td>
                        <input name="sb_instagram_height" type="text" value="<?php echo esc_attr( $sb_instagram_height ); ?>" size="4" maxlength="4" />
                        <select name="sb_instagram_height_unit">
                            <option value="px" <?php if($sb_instagram_height_unit == "px") echo 'selected="selected"' ?> ><?php _e('px', 'instagram-feed'); ?></option>
                            <option value="%" <?php if($sb_instagram_height_unit == "%") echo 'selected="selected"' ?> ><?php _e('%', 'instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Background Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> background
                        Eg: background=d89531</code></th>
                    <td>
                        <input name="sb_instagram_background" type="text" value="<?php echo esc_attr( $sb_instagram_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr id="layout" />
        <h3><?php _e('Layout', 'instagram-feed'); ?></h3>

        <table class="form-table">
            <tbody>
            <?php
            $selected_type = isset( $sb_instagram_layout_type ) ? $sb_instagram_layout_type : 'grid';
            $layout_types = array(
	            'grid' => __( 'Grid', 'instagram-feed' ),
	            'carousel' => __( 'Carousel', 'instagram-feed' ),
	            'masonry' => __( 'Masonry', 'instagram-feed' ),
	            'highlight' => __( 'Highlight', 'instagram-feed' )
            );
            $layout_images = array(
	            'grid' => plugins_url( 'img/grid.png' , __FILE__ ),
	            'carousel' => plugins_url( 'img/carousel.png' , __FILE__ ),
	            'masonry' => plugins_url( 'img/masonry.png' , __FILE__ ),
	            'highlight' => plugins_url( 'img/highlight.png' , __FILE__ )
            );
            ?>
            <tr valign="top">
                <th scope="row" class="sbi_pro"><label title="Click for shortcode option">Layout Type</label><br /><span class="sbi_note" style="margin: 5px 0 0 0; font-weight: normal;"><?php _e('Select a layout to see associated<br />options', 'instagram-feed'); ?></span></th>
                <td>
                    <div class="sbi_layouts">
    	                <?php foreach( $layout_types as $layout_type => $label ) : ?>
                            <div class="sbi_layout_cell sbi_pro">
                                <input class="sb_layout_type" id="sb_layout_type_<?php esc_attr_e( $layout_type ); ?>" name="sb_instagram_layout_type" type="radio" value="<?php esc_attr_e( $layout_type ); ?>" <?php if ( $selected_type === $layout_type ) echo 'checked'; ?>/><label for="sb_layout_type_<?php esc_attr_e( $layout_type ); ?>"><span class="sbi_label"><?php echo esc_html( $label ); ?></span><img src="<?php echo $layout_images[ $layout_type ]; ?>" /></label>
                            </div>
    	                <?php endforeach; ?>
                        
                        <p class="sbi_pro_tooltip"><?php _e('Upgrade to the Pro version to unlock these layouts', 'instagram-feed'); ?><i class="fa fa-caret-down" aria-hidden="true"></i></p>
                        <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank" class="sbi_lock"><i class="fa fa-rocket"></i><?php _e('Pro', 'instagram-feed'); ?></a>

                    </div>
                    <div class="sb_layout_options_wrap sbi_pro">
                        <a href="JavaScript:void(0);" class="sbi_close_options"><i class="fa fa-close"></i></a>
                        <div class="sb_instagram_layout_settings sbi_layout_type_grid">
                            <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 8px;"></i><span class="sbi_note" style="margin-left: 0;"><?php _e('A uniform grid of square-cropped images.', 'instagram-feed'); ?></span>
                        </div>
                        <div class="sb_instagram_layout_settings sbi_layout_type_masonry">
                            <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 8px;"></i><span class="sbi_note" style="margin-left: 0;"><?php _e('Images in their original aspect ratios with no vertical space between posts.', 'instagram-feed'); ?></span>
                        </div>
                        <div class="sb_instagram_layout_settings sbi_layout_type_carousel">
                            <div class="sb_instagram_layout_setting">
                                <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 8px;"></i><span class="sbi_note" style="margin-left: 0;"><?php _e('Posts are displayed in a slideshow carousel.', 'instagram-feed'); ?></span>
                            </div>
                            <div class="sb_instagram_layout_setting">

                                <label><?php _e('Number of Rows', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouselrows
                                    Eg: carouselrows=2</code>
                                <br>
                                <span class="sbi_note" style="margin: -5px 0 -10px 0; display: block;"><?php _e('Use the "Number of Columns" setting below this section to set how many posts are visible in the carousel at a given time.', 'instagram-feed'); ?></span>
                                <br>
                                <select name="sb_instagram_carousel_rows" id="sb_instagram_carousel_rows">
                                    <option value="1">1</option>
                                    <option value="2" selected="selected">2</option>
                                </select>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <label><?php _e('Loop Type', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouselloop
                                    Eg: carouselloop=rewind
                                    carouselloop=infinity</code>
                                <br>
                                <select name="sb_instagram_carousel_loop" id="sb_instagram_carousel_loop">
                                    <option value="rewind"><?php _e('Rewind', 'instagram-feed'); ?></option>
                                    <option value="infinity" selected="selected"><?php _e('Infinity', 'instagram-feed'); ?></option>
                                </select>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <input type="checkbox" name="sb_instagram_carousel_arrows" id="sb_instagram_carousel_arrows" checked="checked">
                                <label><?php _e('Show Navigation Arrows', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouselarrows
                                    Eg: carouselarrows=true</code>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <input type="checkbox" name="sb_instagram_carousel_pag" id="sb_instagram_carousel_pag">
                                <label><?php _e('Show Pagination', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouselpag
                                    Eg: carouselpag=true</code>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <input type="checkbox" name="sb_instagram_carousel_autoplay" id="sb_instagram_carousel_autoplay">
                                <label><?php _e('Enable Autoplay', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouselautoplay
                                    Eg: carouselautoplay=true</code>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <label><?php _e('Interval Time', 'instagram-feed'); ?></label><code class="sbi_shortcode"> carouseltime
                                    Eg: carouseltime=8000</code>
                                <br>
                                <input name="sb_instagram_carousel_interval" type="text" value="5000" size="6">miliseconds                                </div>
                        </div>

                        <div class="sb_instagram_layout_settings sbi_layout_type_highlight">
                            <div class="sb_instagram_layout_setting">
                                <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 8px;"></i><span class="sbi_note" style="margin-left: 0;"><?php _e('Masonry style, square-cropped, image only (no captions or likes/comments below image). "Highlighted" posts are twice as large.', 'instagram-feed'); ?></span>
                            </div>
                            <div class="sb_instagram_layout_setting">
                                <label title="Click for shortcode option"><?php _e('Highlighting Type', 'instagram-feed'); ?></label><code class="sbi_shortcode"> highlighttype
                                    Eg: highlighttype=pattern</code>
                                <br>
                                <select name="sb_instagram_highlight_type" id="sb_instagram_highlight_type">
                                    <option value="pattern" selected="selected"><?php _e('Pattern', 'instagram-feed'); ?></option>
                                    <option value="id"><?php _e('Post ID', 'instagram-feed'); ?></option>
                                    <option value="hashtag"><?php _e('Hashtag', 'instagram-feed'); ?></option>
                                </select>
                            </div>
                            <div class="sb_instagram_highlight_sub_options sb_instagram_highlight_pattern sb_instagram_layout_setting" style="display: block;">
                                <label></label><code class="sbi_shortcode"> highlightoffset
                                    Eg: highlightoffset=2</code>
                                <br>
                                <input name="sb_instagram_highlight_offset" type="number" min="0" value="0" style="width: 50px;">
                            </div>
                            <div class="sb_instagram_highlight_sub_options sb_instagram_highlight_pattern sb_instagram_layout_setting" style="display: block;">
                                <label><?php _e('Pattern', 'instagram-feed'); ?></label><code class="sbi_shortcode"> highlightpattern
                                    Eg: highlightpattern=3</code>
                                <br>
                                <span><?php _e('Highlight every', 'instagram-feed'); ?></span><input name="sb_instagram_highlight_factor" type="number" min="2" value="6" style="width: 50px;"><span><?php _e('posts', 'instagram-feed'); ?></span>
                            </div>
                            <div class="sb_instagram_highlight_sub_options sb_instagram_highlight_hashtag sb_instagram_layout_setting" style="display: none;">
                                <label><?php _e('Highlight Posts with these Hashtags', 'instagram-feed'); ?></label>
                                <input name="sb_instagram_highlight_hashtag" id="sb_instagram_highlight_hashtag" type="text" size="40" value="#fishing">&nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What is this?', 'instagram-feed'); ?></a>
                                <br>
                                <span class="sbi_note" style="margin-left: 0;"><?php _e('Separate multiple hashtags using commas', 'instagram-feed'); ?></span>


                                <p class="sbi_tooltip"><?php _e('You can use this setting to highlight posts by a hashtag. Use a specified hashtag in your posts and they will be automatically highlighted in your feed.', 'instagram-feed'); ?></p>
                            </div>
                            <div class="sb_instagram_highlight_sub_options sb_instagram_highlight_ids sb_instagram_layout_setting" style="display: none;">
                                <label><?php _e('Highlight Posts by ID', 'instagram-feed'); ?></label>
                                <textarea name="sb_instagram_highlight_ids" id="sb_instagram_highlight_ids" style="width: 100%;" rows="3">sbi_1852317219231323590_3269008872</textarea>
                                <br>
                                <span class="sbi_note" style="margin-left: 0;"><?php _e('Separate IDs using commas', 'instagram-feed'); ?></span>

                                &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What is this?', 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip"><?php _e('You can use this setting to highlight posts by their ID. Enable and use "moderation mode", check the box to show post IDs underneath posts, then copy and paste IDs into this text box.', 'instagram-feed'); ?></p>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Number of Photos', 'instagram-feed'); ?></label><code class="sbi_shortcode"> num
                        Eg: num=6</code></th>
                    <td>
                        <input name="sb_instagram_num" type="text" value="<?php echo esc_attr( $sb_instagram_num ); ?>" size="4" maxlength="4" />
                        <span class="sbi_note"><?php _e('Number of photos to show initially. Maximum of 33.', 'instagram-feed'); ?></span>
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("Using multiple IDs or hashtags?", 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e("If you're displaying photos from multiple User IDs or hashtags then this is the number of photos which will be displayed from each.", 'instagram-feed'); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Number of Columns', 'instagram-feed'); ?></label><code class="sbi_shortcode"> cols
                        Eg: cols=3</code></th>
                    <td>
                        <select name="sb_instagram_cols">
                            <option value="1" <?php if($sb_instagram_cols == "1") echo 'selected="selected"' ?> ><?php _e('1', 'instagram-feed'); ?></option>
                            <option value="2" <?php if($sb_instagram_cols == "2") echo 'selected="selected"' ?> ><?php _e('2', 'instagram-feed'); ?></option>
                            <option value="3" <?php if($sb_instagram_cols == "3") echo 'selected="selected"' ?> ><?php _e('3', 'instagram-feed'); ?></option>
                            <option value="4" <?php if($sb_instagram_cols == "4") echo 'selected="selected"' ?> ><?php _e('4', 'instagram-feed'); ?></option>
                            <option value="5" <?php if($sb_instagram_cols == "5") echo 'selected="selected"' ?> ><?php _e('5', 'instagram-feed'); ?></option>
                            <option value="6" <?php if($sb_instagram_cols == "6") echo 'selected="selected"' ?> ><?php _e('6', 'instagram-feed'); ?></option>
                            <option value="7" <?php if($sb_instagram_cols == "7") echo 'selected="selected"' ?> ><?php _e('7', 'instagram-feed'); ?></option>
                            <option value="8" <?php if($sb_instagram_cols == "8") echo 'selected="selected"' ?> ><?php _e('8', 'instagram-feed'); ?></option>
                            <option value="9" <?php if($sb_instagram_cols == "9") echo 'selected="selected"' ?> ><?php _e('9', 'instagram-feed'); ?></option>
                            <option value="10" <?php if($sb_instagram_cols == "10") echo 'selected="selected"' ?> ><?php _e('10', 'instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Padding around Images', 'instagram-feed'); ?></label><code class="sbi_shortcode"> imagepadding  imagepaddingunit</code></th>
                    <td>
                        <input name="sb_instagram_image_padding" type="text" value="<?php echo esc_attr( $sb_instagram_image_padding ); ?>" size="4" maxlength="4" />
                        <select name="sb_instagram_image_padding_unit">
                            <option value="px" <?php if($sb_instagram_image_padding_unit == "px") echo 'selected="selected"' ?> ><?php _e('px', 'instagram-feed'); ?></option>
                            <option value="%" <?php if($sb_instagram_image_padding_unit == "%") echo 'selected="selected"' ?> ><?php _e('%', 'instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Disable mobile layout", 'instagram-feed'); ?></label><code class="sbi_shortcode"> disablemobile
                        Eg: disablemobile=true</code></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_disable_mobile" id="sb_instagram_disable_mobile" <?php if($sb_instagram_disable_mobile == true) echo 'checked="checked"' ?> />
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e( 'What does this mean?', 'instagram-feed' ); ?></a>
                            <p class="sbi_tooltip"><?php _e("By default on mobile devices the layout automatically changes to use fewer columns. Checking this setting disables the mobile layout.", 'instagram-feed'); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

        <hr id="photos" />
        <h3><?php _e('Photos', 'instagram-feed'); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Sort Photos By', 'instagram-feed'); ?></label><code class="sbi_shortcode"> sortby
                        Eg: sortby=random</code></th>
                    <td>
                        <select name="sb_instagram_sort">
                            <option value="none" <?php if($sb_instagram_sort == "none") echo 'selected="selected"' ?> ><?php _e('Newest to oldest', 'instagram-feed'); ?></option>
                            <option value="random" <?php if($sb_instagram_sort == "random") echo 'selected="selected"' ?> ><?php _e('Random', 'instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>                
                <tr valign="top">
                    <th scope="row"><label><?php _e('Image Resolution', 'instagram-feed'); ?></label><code class="sbi_shortcode"> imageres
                        Eg: imageres=thumb</code></th>
                    <td>

                        <select name="sb_instagram_image_res">
                            <option value="auto" <?php if($sb_instagram_image_res == "auto") echo 'selected="selected"' ?> ><?php _e('Auto-detect (recommended)', 'instagram-feed'); ?></option>
                            <option value="thumb" <?php if($sb_instagram_image_res == "thumb") echo 'selected="selected"' ?> ><?php _e('Thumbnail (150x150)', 'instagram-feed'); ?></option>
                            <option value="medium" <?php if($sb_instagram_image_res == "medium") echo 'selected="selected"' ?> ><?php _e('Medium (306x306)', 'instagram-feed'); ?></option>
                            <option value="full" <?php if($sb_instagram_image_res == "full") echo 'selected="selected"' ?> ><?php _e('Full size (640x640)', 'instagram-feed'); ?></option>
                        </select>

                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e( 'What does Auto-detect mean?', 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e("Auto-detect means that the plugin automatically sets the image resolution based on the size of your feed.", 'instagram-feed'); ?></p>

                    </td>
                </tr>
            </tbody>
        </table>

        <span><a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?></a></span>

        <div class="sbi-pro-options">
            <p class="sbi-upgrade-link">
                <i class="fa fa-rocket" aria-hidden="true"></i>&nbsp; <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable these settings', 'instagram-feed'); ?></a>
            </p>
            <table class="form-table">
                <tbody>
                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e('Media Type to Display','instagram-feed'); ?></label></th>
                    <td>
                        <select name="sb_instagram_media_type" disabled>
                            <option value="all"><?php _e('All','instagram-feed'); ?></option>
                            <option value="photos"><?php _e('Photos only','instagram-feed'); ?></option>
                            <option value="videos"><?php _e('Videos only','instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>

                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e("Enable Pop-up Lightbox", 'instagram-feed'); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_captionlinks" id="sb_instagram_captionlinks" disabled />
                    </td>
                </tr>

                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e("Link Posts to URL in Caption (Shoppable feed)",'instagram-feed'); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_captionlinks" id="sb_instagram_captionlinks" disabled />
                        &nbsp;<a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);"><?php _e("What will this do?",'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e("Checking this box will change the link for each post to any url included in the caption for that Instagram post. The lightbox will be disabled. Visit <a href='https://smashballoon.com/make-a-shoppable-feed?utm_source=plugin-free&utm_campaign=sbi'>this link</a> to learn how this works.",'instagram-feed'); ?></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <hr />
        <h3><?php _e('Photo Hover Style','instagram-feed'); ?></h3>

        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable Photo Hover styles','instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options','instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Hover Background Color', 'instagram-feed'); ?></label></th>
                        <td>
                            <input name="sb_hover_background" type="text" disabled class="sbi_colorpick" />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Hover Text Color', 'instagram-feed'); ?></label></th>
                        <td>
                            <input name="sb_hover_text" type="text" disabled class="sbi_colorpick" />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Information to display', 'instagram-feed'); ?></label></th>
                        <td>
                            <div>
                                <input name="sbi_hover_inc_username" type="checkbox" disabled />
                                <label for="sbi_hover_inc_username"><?php _e('Username', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_icon" type="checkbox" disabled />
                                <label for="sbi_hover_inc_icon"><?php _e('Expand Icon', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_date" type="checkbox" disabled />
                                <label for="sbi_hover_inc_date"><?php _e('Date', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_instagram" type="checkbox" disabled />
                                <label for="sbi_hover_inc_instagram"><?php _e('Instagram Icon/Link', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_location" type="checkbox" disabled />
                                <label for="sbi_hover_inc_location"><?php _e('Location', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_caption" type="checkbox" disabled />
                                <label for="sbi_hover_inc_caption"><?php _e('Caption', 'instagram-feed'); ?></label>
                            </div>
                            <div>
                                <input name="sbi_hover_inc_likes" type="checkbox" disabled />
                                <label for="sbi_hover_inc_likes"><?php _e('Like/Comment Icons', 'instagram-feed'); ?></label>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>


        <hr />
        <h3><?php _e( 'Carousel', 'instagram-feed' ); ?></h3>
        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable Carousels', 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Enable Carousel"); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                            &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?", 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip"><?php _e("Enable this setting to create a carousel slider out of your photos.", 'instagram-feed'); ?></p>
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Show Navigation Arrows", 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Show Pagination", 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Enable Autoplay", 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Interval Time", 'instagram-feed'); ?></label></th>
                        <td>
                            <input name="sb_instagram_carousel_interval" type="text" disabled size="6" /><?php _e("miliseconds", 'instagram-feed'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



        <hr id="headeroptions" />
        <h3><?php _e("Header", 'instagram-feed'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show Feed Header", 'instagram-feed'); ?></label><code class="sbi_shortcode"> showheader
                        Eg: showheader=false</code></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_header" id="sb_instagram_show_header" <?php if($sb_instagram_show_header == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Header Size', 'instagram-feed'); ?></label><code class="sbi_shortcode"> headersize
                            Eg: headersize=medium</code></th>
                    <td>
                        <select name="sb_instagram_header_size" id="sb_instagram_header_size" style="float: left;">
                            <option value="small" <?php if($sb_instagram_header_size == "small") echo 'selected="selected"' ?> ><?php _e('Small', 'instagram-feed'); ?></option>
                            <option value="medium" <?php if($sb_instagram_header_size == "medium") echo 'selected="selected"' ?> ><?php _e('Medium', 'instagram-feed'); ?></option>
                            <option value="large" <?php if($sb_instagram_header_size == "large") echo 'selected="selected"' ?> ><?php _e('Large', 'instagram-feed'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show Bio Text", 'instagram-feed'); ?></label><code class="sbi_shortcode"> showbio
                        Eg: showbio=false</code></th>
                    <td>
                        <?php $sb_instagram_show_bio = isset( $sb_instagram_show_bio ) ? $sb_instagram_show_bio  : true; ?>
                        <input type="checkbox" name="sb_instagram_show_bio" id="sb_instagram_show_bio" <?php if($sb_instagram_show_bio == true) echo 'checked="checked"' ?> />
                        <span class="sbi_note"><?php _e("Only applies for Instagram accounts with bios", 'instagram-feed'); ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Header Text Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> headercolor
                        Eg: headercolor=fff</code></th>
                    <td>
                        <input name="sb_instagram_header_color" type="text" value="<?php echo esc_attr( $sb_instagram_header_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
            </tbody>
        </table>

        <span><a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?></a></span>

        <div class="sbi-pro-options">
            <p class="sbi-upgrade-link">
                <i class="fa fa-rocket" aria-hidden="true"></i>&nbsp; <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable these settings', 'instagram-feed'); ?></a>
            </p>
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Header Style','instagram-feed'); ?></label></th>
                        <td>
                            <select name="sb_instagram_header_style" style="float: left;">
                                <option value="circle"><?php _e('Standard','instagram-feed'); ?></option>
                                <option value="boxed"><?php _e('Boxed','instagram-feed'); ?></option>
                                <option value="centered"><?php _e('Centered','instagram-feed'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Show Number of Followers",'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                            <span class="sbi_note"><?php _e("This only applies when displaying photos from a User ID",'instagram-feed'); ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php submit_button(); ?>


        <hr />
        <h3><?php _e("Caption", 'instagram-feed'); ?></h3>
        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e("Upgrade to Pro to enable Photo Captions", 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e("Show Pro Options", 'instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Show Caption", 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Maximum Text Length", 'instagram-feed'); ?></label></th>
                        <td>
                            <input disabled size="4" />Characters
                            &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?", 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip"><?php _e("The number of characters of text to display in the caption. An elipsis link will be added to allow the user to reveal more text if desired.", 'instagram-feed'); ?></p>
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Text Color', 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="text" disabled class="sbi_colorpick" />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Text Size', 'instagram-feed'); ?></label></th>
                        <td>
                            <select name="sb_instagram_caption_size" style="width: 180px;" disabled>
                                <option value="inherit"  ><?php _e('Inherit from theme', 'instagram-feed'); ?></option>
                                <option value="10" >10px</option>
                                <option value="11" >11px</option>
                                <option value="12" >12px</option>
                                <option value="13" >13px</option>
                                <option value="14" >14px</option>
                                <option value="16" >16px</option>
                                <option value="18" >18px</option>
                                <option value="20" >20px</option>
                                <option value="24" >24px</option>
                                <option value="28" >28px</option>
                                <option value="32" >32px</option>
                                <option value="36" >36px</option>
                                <option value="40" >40px</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <hr />
        <h3><?php _e("Likes &amp; Comments", 'instagram-feed'); ?></h3>
        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e("Upgrade to Pro to enable Likes &amp; Comments", 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e("Show Pro Options", 'instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e("Show Icons", 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="checkbox" disabled />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Icon Color', 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="text" disabled class="sbi_colorpick" />
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Icon Size', 'instagram-feed'); ?></label></th>
                        <td>
                            <select disabled name="sb_instagram_meta_size" style="width: 180px;">
                                <option value="inherit"><?php _e('Inherit from theme', 'instagram-feed'); ?></option>
                                <option value="10" >10px</option>
                                <option value="11" >11px</option>
                                <option value="12" >12px</option>
                                <option value="13" >13px</option>
                                <option value="14" >14px</option>
                                <option value="16" >16px</option>
                                <option value="18" >18px</option>
                                <option value="20" >20px</option>
                                <option value="24" >24px</option>
                                <option value="28" >28px</option>
                                <option value="32" >32px</option>
                                <option value="36" >36px</option>
                                <option value="40" >40px</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <hr />
        <h3><?php _e('Lightbox Comments', 'instagram-feed'); ?></h3>

        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable Comments', 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>

                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e('Show Comments in Lightbox', 'instagram-feed'); ?></label></th>
                    <td style="padding: 5px 10px 0 10px;">
                        <input type="checkbox" disabled style="margin-right: 15px;" />
                        <input class="button-secondary" style="margin-top: -5px;" disabled value="<?php esc_attr_e( 'Clear Comment Cache', 'instagram-feed' ); ?>" />
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?", 'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e("This will remove the cached comments saved in the database", 'instagram-feed'); ?></p>
                    </td>
                </tr>
                <tr valign="top" class="sbi_pro">
                    <th scope="row"><label><?php _e('Number of Comments', 'instagram-feed'); ?></label></th>
                    <td>
                        <input name="sb_instagram_num_comments" type="text" disabled size="4" />
                        <span class="sbi_note"><?php _e('Max number of latest comments.', 'instagram-feed'); ?></span>
                        &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?", 'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e("This is the maximum number of comments that will be shown in the lightbox. If there are more comments available than the number set, only the latest comments will be shown", 'instagram-feed'); ?></p>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>


        <hr id="loadmore" />
        <h3><?php _e("'Load More' Button", 'instagram-feed'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show the 'Load More' button", 'instagram-feed'); ?></label><code class="sbi_shortcode"> showbutton
                        Eg: showbutton=false</code></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_btn" id="sb_instagram_show_btn" <?php if($sb_instagram_show_btn == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Background Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> buttoncolor
                        Eg: buttoncolor=8224e3</code></th>
                    <td>
                        <input name="sb_instagram_btn_background" type="text" value="<?php echo esc_attr( $sb_instagram_btn_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> buttontextcolor
                        Eg: buttontextcolor=eeee22</code></th>
                    <td>
                        <input name="sb_instagram_btn_text_color" type="text" value="<?php echo esc_attr( $sb_instagram_btn_text_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text', 'instagram-feed'); ?></label><code class="sbi_shortcode"> buttontext
                        Eg: buttontext="Show more.."</code></th>
                    <td>
                        <input name="sb_instagram_btn_text" type="text" value="<?php echo esc_attr( stripslashes( $sb_instagram_btn_text ) ); ?>" size="20" />
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

        <hr id="follow" />
        <h3><?php _e("'Follow' Button", 'instagram-feed'); ?></h3>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Show the Follow button", 'instagram-feed'); ?></label><code class="sbi_shortcode"> showfollow
                        Eg: showfollow=true</code></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_show_follow_btn" id="sb_instagram_show_follow_btn" <?php if($sb_instagram_show_follow_btn == true) echo 'checked="checked"' ?> />
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Background Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> followcolor
                        Eg: followcolor=28a1bf</code></th>
                    <td>
                        <input name="sb_instagram_folow_btn_background" type="text" value="<?php echo esc_attr( $sb_instagram_folow_btn_background ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text Color', 'instagram-feed'); ?></label><code class="sbi_shortcode"> followtextcolor
                        Eg: followtextcolor=000</code></th>
                    <td>
                        <input name="sb_instagram_follow_btn_text_color" type="text" value="<?php echo esc_attr( $sb_instagram_follow_btn_text_color ); ?>" class="sbi_colorpick" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Button Text', 'instagram-feed'); ?></label><code class="sbi_shortcode"> followtext
                        Eg: followtext="Follow me"</code></th>
                    <td>
                        <input name="sb_instagram_follow_btn_text" type="text" value="<?php echo esc_attr( stripslashes( $sb_instagram_follow_btn_text ) ); ?>" size="30" />
                    </td>
                </tr>
            </tbody>
        </table>

        <hr id="filtering" />
        <h3><?php _e('Post Filtering', 'instagram-feed'); ?></h3>

        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable Post Filtering options', 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?></a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">

            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Remove photos containing these words or hashtags', 'instagram-feed'); ?></label></th>
                        <td>
                            <div class="sb_instagram_apply_labels">
                                <p><?php _e('Apply to:', 'instagram-feed'); ?></p>
                                <input class="sb_instagram_incex_one_all" type="radio" value="all" disabled /><label><?php _e('All feeds', 'instagram-feed'); ?></label>
                                <input class="sb_instagram_incex_one_all" type="radio" value="one" disabled /><label><?php _e('One feed', 'instagram-feed'); ?></label>
                            </div>

                           <input disabled name="sb_instagram_exclude_words" id="sb_instagram_exclude_words" type="text" style="width: 70%;" value="" />
                            <br />
                            <span class="sbi_note" style="margin-left: 0;"><?php _e('Separate words/hashtags using commas', 'instagram-feed'); ?></span>
                            &nbsp;<a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);"><?php _e( 'What is this?', 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip"><?php _e("You can use this setting to remove photos which contain certain words or hashtags in the caption. Separate multiple words or hashtags using commas.", 'instagram-feed'); ?></p>
                        </td>
                    </tr>

                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Show photos containing these words or hashtags', 'instagram-feed'); ?></label></th>
                        <td>
                            <div class="sb_instagram_apply_labels">
                                <p><?php _e('Apply to:', 'instagram-feed'); ?></p>
                                <input class="sb_instagram_incex_one_all" type="radio" value="all" disabled /><label><?php _e('All feeds', 'instagram-feed'); ?></label>
                                <input class="sb_instagram_incex_one_all" type="radio" value="one" disabled /><label><?php _e('One feed', 'instagram-feed'); ?></label>
                            </div>

                            <input disabled name="sb_instagram_include_words" id="sb_instagram_include_words" type="text" style="width: 70%;" value="" />
                            <br />
                            <span class="sbi_note" style="margin-left: 0;"><?php _e('Separate words/hashtags using commas', 'instagram-feed'); ?></span>
                            &nbsp;<a class="sbi_tooltip_link sbi_pro" href="JavaScript:void(0);"><?php _e( 'What is this?', 'instagram-feed'); ?></a>
                                <p class="sbi_tooltip"><?php _e("You can use this setting to only show photos which contain certain words or hashtags in the caption. For example, adding <code>sheep, cow, dog</code> will show any photos which contain either the word sheep, cow, or dog. Separate multiple words or hashtags using commas.", 'instagram-feed'); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <hr id="moderation" />
        <h3><?php _e('Moderation', 'instagram-feed'); ?></h3>

        <p style="padding-bottom: 18px;">
            <a href="https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e('Upgrade to Pro to enable Moderation options', 'instagram-feed'); ?></a><br />
            <a href="javascript:void(0);" class="button button-secondary sbi-show-pro"><b>+</b> <?php _e('Show Pro Options', 'instagram-feed'); ?>Show Pro Options</a>
        </p>

        <div class="sbi-pro-options" style="margin-top: -15px;">
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Moderation Type', 'instagram-feed'); ?></label></th>
                        <td>
                            <input class="sb_instagram_moderation_mode" checked="checked" disabled type="radio" value="visual" style="margin-top: 0;" /><label><?php _e('Visual', 'instagram-feed'); ?></label>
                            <input class="sb_instagram_moderation_mode" disabled type="radio" value="manual" style="margin-top: 0; margin-left: 10px;"/><label><?php _e('Manual', 'instagram-feed'); ?></label>

                            <p class="sbi_tooltip" style="display: block;"><?php _e("<b>Visual Moderation Mode</b><br />This adds a button to each feed that will allow you to hide posts, block users, and create white lists from the front end using a visual interface. Visit <a href='https://smashballoon.com/guide-to-moderation-mode/?utm_source=plugin-free&utm_campaign=sbi' target='_blank'>this page</a> for details", 'instagram-feed'); ?></p>

                        </td>
                    </tr>

                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('Only show posts by these users', 'instagram-feed'); ?></label></th>
                        <td>
                            <input type="text" style="width: 70%;" disabled /><br />
                            <span class="sbi_note" style="margin-left: 0;"><?php _e('Separate usernames using commas', 'instagram-feed'); ?></span>

                            &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e("What is this?", 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e("You can use this setting to show photos only from certain users in your feed. Just enter the usernames here which you want to show. Separate multiple usernames using commas.", 'instagram-feed'); ?></p>
                        </td>
                    </tr>
                    <tr valign="top" class="sbi_pro">
                        <th scope="row"><label><?php _e('White lists', 'instagram-feed'); ?></label></th>
                        <td>
                            <div class="sbi_white_list_names_wrapper">
                                <?php _e("No white lists currently created", 'instagram-feed'); ?>
                            </div>
                            
                            <input disabled class="button-secondary" type="submit" value="<?php esc_attr_e( 'Clear White Lists', 'instagram-feed' ); ?>" />
                            &nbsp;<a class="sbi_tooltip_link" href="JavaScript:void(0);" style="display: inline-block; margin-top: 5px;"><?php _e("What is this?", 'instagram-feed'); ?></a>
                            <p class="sbi_tooltip"><?php _e("This will remove all of the white lists from the database", 'instagram-feed'); ?></p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>



        <hr id="customcss" />
        <h3><?php _e('Misc', 'instagram-feed'); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <td style="padding-bottom: 0;">
                    <?php _e('<strong style="font-size: 15px;">Custom CSS</strong><br />Enter your own custom CSS in the box below', 'instagram-feed'); ?>
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <textarea name="sb_instagram_custom_css" id="sb_instagram_custom_css" style="width: 70%;" rows="7"><?php echo esc_textarea( stripslashes($sb_instagram_custom_css), 'instagram-feed' ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top" id="customjs">
                    <td style="padding-bottom: 0;">
                    <?php _e('<strong style="font-size: 15px;">Custom JavaScript</strong><br />Enter your own custom JavaScript/jQuery in the box below', 'instagram-feed'); ?>
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <textarea name="sb_instagram_custom_js" id="sb_instagram_custom_js" style="width: 70%;" rows="7"><?php echo esc_textarea( stripslashes($sb_instagram_custom_js), 'instagram-feed' ); ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table">
            <tbody>

            <tr valign="top">
                <th scope="row"><label for="sb_instagram_ajax_theme" class="bump-left"><?php _e("Are you using an Ajax powered theme?", 'instagram-feed'); ?></label></th>
                <td>
                    <input name="sb_instagram_ajax_theme" type="checkbox" id="sb_instagram_ajax_theme" <?php if($sb_instagram_ajax_theme == true) echo "checked"; ?> />
                    <label for="sb_instagram_ajax_theme"><?php _e('Yes', 'instagram-feed'); ?></label>
                    <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                    <p class="sbi_tooltip"><?php _e("When navigating your site, if your theme uses Ajax to load content into your pages (meaning your page doesn't refresh) then check this setting. If you're not sure then please check with the theme author.", 'instagram-feed'); ?></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><label><?php _e('Cache error API recheck', 'instagram-feed'); ?></label></th>
                <td>
                    <input type="checkbox" name="check_api" id="sb_instagram_check_api" <?php if($check_api == true) echo 'checked="checked"' ?> />
                    <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?'); ?></a>
                    <p class="sbi_tooltip"><?php _e("If your site uses caching, minification, or JavaScript concatenation, this option can help prevent missing cache problems with the feed.", 'instagram-feed'); ?></p>
                </td>
            </tr>
                <tr valign="top">
                    <th><label><?php _e("Enable Backup Caching", 'instagram-feed'); ?></label></th>
                    <td class="sbi-customize-tab-opt">
                        <input name="sb_instagram_backup" type="checkbox" id="sb_instagram_backup" <?php if($sb_instagram_backup == true) echo "checked"; ?> />
                        <input id="sbi_clear_backups" class="button-secondary" type="submit" style="position: relative; top: -4px;" value="<?php esc_attr_e( 'Clear Backup Cache', 'instagram-feed' ); ?>" />
                        <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e('Every feed will save a duplicate version of itself in the database to be used if the normal cache is not available.', 'instagram-feed'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th class="bump-left">
                        <label for="sb_instagram_cron" class="bump-left"><?php _e("Force cache to clear on interval", 'instagram-feed'); ?></label>
                    </th>
                    <td>
                        <select name="sb_instagram_cron">
                            <option value="unset" <?php if($sb_instagram_cron == "unset") echo 'selected="selected"' ?> > - </option>
                            <option value="yes" <?php if($sb_instagram_cron == "yes") echo 'selected="selected"' ?> ><?php _e('Yes', 'instagram-feed'); ?></option>
                            <option value="no" <?php if($sb_instagram_cron == "no") echo 'selected="selected"' ?> ><?php _e('No', 'instagram-feed'); ?></option>
                        </select>

                        <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e("If you're experiencing an issue with the plugin not auto-updating then you can set this to 'Yes' to run a scheduled event behind the scenes which forces the plugin cache to clear on a regular basis and retrieve new data from Instagram.", 'instagram-feed'); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e("Disable Icon Font", 'instagram-feed'); ?></label></th>
                    <td>
                        <input type="checkbox" name="sb_instagram_disable_awesome" id="sb_instagram_disable_awesome" <?php if($sb_instagram_disable_awesome == true) echo 'checked="checked"' ?> /> <?php _e( 'Yes', 'instagram-feed' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="sbi_font_method"><?php _e("Icon Method", 'instagram-feed'); ?></label></th>
                    <td>
                        <select name="sbi_font_method" id="sbi_font_method" class="default-text">
                            <option value="svg" id="sbi-font_method" class="default-text" <?php if($sbi_font_method == 'svg') echo 'selected="selected"' ?>>SVG</option>
                            <option value="fontfile" id="sbi-font_method" class="default-text" <?php if($sbi_font_method == 'fontfile') echo 'selected="selected"' ?>><?php _e("Font File", 'instagram-feed'); ?></option>
                        </select>
                        <a class="sbi_tooltip_link" href="JavaScript:void(0);"><?php _e('What does this mean?', 'instagram-feed'); ?></a>
                        <p class="sbi_tooltip"><?php _e("This plugin uses SVGs for all icons in the feed. Use this setting to switch to font icons.", 'instagram-feed'); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>

    </form>

    <p><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp; <?php _e('Next Step: <a href="?page=sb-instagram-feed&tab=display">Display your Feed</a>', 'instagram-feed'); ?></p>

    <p><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp; <?php _e('Need help setting up the plugin? Check out our <a href="https://smashballoon.com/instagram-feed/free/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">setup directions</a>', 'instagram-feed'); ?></p>


    <?php } //End Customize tab ?>



    <?php if( $sbi_active_tab == 'display' ) { //Start Display tab ?>

        <h3><?php _e('Display your Feed', 'instagram-feed'); ?></h3>
        <p><?php _e("Copy and paste the following shortcode directly into the page, post or widget where you'd like the feed to show up:", 'instagram-feed'); ?></p>
        <input type="text" value="[instagram-feed]" size="16" readonly="readonly" style="text-align: center;" onclick="this.focus();this.select()" title="<?php _e('To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac).', 'instagram-feed'); ?>" />

        <h3 style="padding-top: 10px;"><?php _e( 'Multiple Feeds', 'instagram-feed' ); ?></h3>
        <p><?php _e("If you'd like to display multiple feeds then you can set different settings directly in the shortcode like so:", 'instagram-feed'); ?>
        <code>[instagram-feed num=9 cols=3]</code></p>
        <p><?php _e( 'You can display as many different feeds as you like, on either the same page or on different pages, by just using the shortcode options below. For example:', 'instagram-feed' ); ?><br />
        <code>[instagram-feed]</code><br />
        <code>[instagram-feed num=4 cols=4 showfollow=false]</code><br />
        <code>[instagram-feed accesstoken="ANOTHER_ACCESS_TOKEN"]</code>
        </p>
        <p><?php _e("See the table below for a full list of available shortcode options:", 'instagram-feed'); ?></p>

        <p><span class="sbi_table_key"></span><?php _e('Pro version only', 'instagram-feed'); ?></p>

        <table class="sbi_shortcode_table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><?php _e('Shortcode option', 'instagram-feed'); ?></th>
                    <th scope="row"><?php _e('Description', 'instagram-feed'); ?></th>
                    <th scope="row"><?php _e('Example', 'instagram-feed'); ?></th>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Configure Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>type</td>
                    <td><?php _e("Display photos from a User ID (user)<br />Display posts from a Hashtag (hashtag)", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed type=user]</code><br /><code>[instagram-feed type=hashtag]</code></td>
                </tr>
                <tr>
                    <td>id</td>
                    <td><?php _e('Your Instagram User ID. This must be the ID associated with your Access Token.', 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed id="1234567"]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>hashtag</td>
                    <td><?php _e('Any hashtag. Separate multiple IDs by commas.', 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed hashtag="#awesome"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Customize Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>width</td>
                    <td><?php _e("The width of your feed. Any number.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed width=50]</code></td>
                </tr>
                <tr>
                    <td>widthunit</td>
                    <td><?php _e("The unit of the width. 'px' or '%'", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed widthunit=%]</code></td>
                </tr>
                <tr>
                    <td>height</td>
                    <td><?php _e("The height of your feed. Any number.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed height=250]</code></td>
                </tr>
                <tr>
                    <td>heightunit</td>
                    <td><?php _e("The unit of the height. 'px' or '%'", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed heightunit=px]</code></td>
                </tr>
                <tr>
                    <td>background</td>
                    <td><?php _e("The background color of the feed. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed background=#ffff00]</code></td>
                </tr>
                <tr>
                    <td>class</td>
                    <td><?php _e("Add a CSS class to the feed container", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed class=feedOne]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Layout Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>layout</td>
                    <td><?php _e("How posts are arranged visually in the feed.", 'instagram-feed' ); ?> 'grid', 'carousel', 'masonry', or 'highlight'</td>
                    <td><code>[instagram-feed layout=grid]</code></td>
                </tr>
                <tr>
                    <td>num</td>
                    <td><?php _e("The number of photos to display initially. Maximum is 33.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed num=10]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>nummobile</td>
                    <td><?php _e("The number of photos to display initially for mobile screens (smaller than 480 pixels).", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed nummobile=6]</code></td>
                </tr>
                <tr>
                    <td>cols</td>
                    <td><?php _e("The number of columns in your feed. 1 - 10.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed cols=5]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>colsmobile</td>
                    <td><?php _e("The number of columns in your feed for mobile screens (smaller than 480 pixels).", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed colsmobile=2]</code></td>
                </tr>
                <tr>
                    <td>imagepadding</td>
                    <td><?php _e("The spacing around your photos", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed imagepadding=10]</code></td>
                </tr>
                <tr>
                    <td>imagepaddingunit</td>
                    <td><?php _e("The unit of the padding. 'px' or '%'", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed imagepaddingunit=px]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Carousel Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>carouselrows</td>
                    <td><?php _e("Choose 1 or 2 rows of posts in the carousel", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouselrows=1]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>carouselloop</td>
                    <td><?php _e("Infinitely loop through posts or rewind", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouselloop=rewind]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>carouselarrows</td>
                    <td><?php _e("Display directional arrows on the carousel", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouselarrows=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>carouselpag</td>
                    <td><?php _e("Display pagination links below the carousel", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouselpag=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>carouselautoplay</td>
                    <td><?php _e("Make the carousel autoplay", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouselautoplay=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>carouseltime</td>
                    <td><?php _e("The interval time between slides for autoplay. Time in miliseconds.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed carouseltime=8000]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Highlight Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>highlighttype</td>
                    <td><?php _e("Choose from 3 different ways of highlighting posts.", 'instagram-feed'); ?> 'pattern', 'hashtag', 'id'.</td>
                    <td><code>[instagram-feed highlighttype=hashtag]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>highlightpattern</td>
                    <td><?php _e("How often a post is highlighted.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed highlightpattern=7]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>highlightoffset</td>
                    <td><?php _e("When to start the highlight pattern.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed highlightoffset=3]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>highlighthashtag</td>
                    <td><?php _e("Highlight posts with these hashtags.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed highlighthashtag=best]</code></td>
                </tr>





                <tr class="sbi_table_header"><td colspan=3><?php _e("Photos Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>sortby</td>
                    <td><?php _e("Sort the posts by Newest to Oldest (none) or Random (random)", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed sortby=random]</code></td>
                </tr>
                <tr>
                    <td>imageres</td>
                    <td><?php _e("The resolution/size of the photos. 'auto', full', 'medium' or 'thumb'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed imageres=full]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>media</td>
                    <td><?php _e("Display all media, only photos, or only videos", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed media=photos]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>disablelightbox</td>
                    <td><?php _e("Whether to disable the photo Lightbox. It is enabled by default.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed disablelightbox=true]</code></td>
                </tr>
                <tr>
                    <td>disablemobile</td>
                    <td><?php _e("Disable the mobile layout. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed disablemobile=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captionlinks</td>
                    <td><?php _e("Whether to use urls in captions for the photo's link instead of linking to instagram.com.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed captionlinks=true]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Lightbox Comments Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>lightboxcomments</td>
                    <td><?php _e("Whether to show comments in the lightbox for this feed.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed lightboxcomments=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>numcomments</td>
                    <td><?php _e("Number of comments to show starting from the most recent.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed numcomments=10]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Photos Hover Style Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>hovercolor</td>
                    <td><?php _e("The background color when hovering over a photo. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed hovercolor=#ff0000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>hovertextcolor</td>
                    <td><?php _e("The text/icon color when hovering over a photo. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed hovertextcolor=#fff]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>hoverdisplay</td>
                    <td><?php _e("The info to display when hovering over the photo. Available options:", 'instagram-feed'); ?><br />username, date, instagram, location, caption, likes</td>
                    <td><code>[instagram-feed hoverdisplay="date, location, likes"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Header Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>showheader</td>
                    <td><?php _e("Whether to show the feed Header. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed showheader=false]</code></td>
                </tr>
                <tr>
                    <td>showbio</td>
                    <td><?php _e("Display the bio in the header. 'true' or 'false'."); ?></td>
                    <td><code>[instagram-feed showbio=true]</code></td>
                </tr>
                <tr>
                    <td>headersize</td>
                    <td><?php _e("Size of the header. Choose from small, medium, or large.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed headersize=medium]</code></td>
                </tr>
                <tr>
                    <td>headercolor</td>
                    <td><?php _e("The color of the Header text. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed headercolor=#333]</code></td>
                </tr>
                
                <tr class="sbi_table_header"><td colspan=3><?php _e("'Load More' Button Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>showbutton</td>
                    <td><?php _e("Whether to show the 'Load More' button. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed showbutton=false]</code></td>
                </tr>
                <tr>
                    <td>buttoncolor</td>
                    <td><?php _e("The background color of the button. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed buttoncolor=#000]</code></td>
                </tr>
                <tr>
                    <td>buttontextcolor</td>
                    <td><?php _e("The text color of the button. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed buttontextcolor=#fff]</code></td>
                </tr>
                <tr>
                    <td>buttontext</td>
                    <td><?php _e("The text used for the button.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed buttontext="Load More Photos"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("'Follow on Instagram' Button Options", 'instagram-feed'); ?></td></tr>
                <tr>
                    <td>showfollow</td>
                    <td><?php _e("Whether to show the 'Follow on Instagram' button. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed showfollow=false]</code></td>
                </tr>
                <tr>
                    <td>followcolor</td>
                    <td><?php _e("The background color of the button. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed followcolor=#ff0000]</code></td>
                </tr>
                <tr>
                    <td>followtextcolor</td>
                    <td><?php _e("The text color of the button. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed followtextcolor=#fff]</code></td>
                </tr>
                <tr>
                    <td>followtext</td>
                    <td><?php _e("The text used for the button.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed followtext="Follow me"]</code></td>
                </tr>
                
                <tr class="sbi_table_header"><td colspan=3><?php _e("Caption Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>showcaption</td>
                    <td><?php _e("Whether to show the photo caption. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed showcaption=false]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captionlength</td>
                    <td><?php _e("The number of characters of the caption to display", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed captionlength=50]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captioncolor</td>
                    <td><?php _e("The text color of the caption. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed captioncolor=#000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>captionsize</td>
                    <td><?php _e("The size of the caption text. Any number.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed captionsize=24]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Likes &amp; Comments Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>showlikes</td>
                    <td><?php _e("Whether to show the Likes &amp; Comments. 'true' or 'false'.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed showlikes=false]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>likescolor</td>
                    <td><?php _e("The color of the Likes &amp; Comments. Any hex color code.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed likescolor=#FF0000]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>likessize</td>
                    <td><?php _e("The size of the Likes &amp; Comments. Any number.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed likessize=14]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Post Filtering Options", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>excludewords</td>
                    <td><?php _e("Remove posts which contain certain words or hashtags in the caption.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed excludewords="bad, words"]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>includewords</td>
                    <td><?php _e("Only display posts which contain certain words or hashtags in the caption.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed includewords="sunshine"]</code></td>
                </tr>

                <tr class="sbi_table_header"><td colspan=3><?php _e("Auto Load More on Scroll", 'instagram-feed'); ?></td></tr>
                <tr class="sbi_pro">
                    <td>autoscroll</td>
                    <td><?php _e("Load more posts automatically as the user scrolls down the page.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed autoscroll=true]</code></td>
                </tr>
                <tr class="sbi_pro">
                    <td>autoscrolldistance</td>
                    <td><?php _e("Distance before the end of feed or page that triggers the loading of more posts.", 'instagram-feed'); ?></td>
                    <td><code>[instagram-feed autoscrolldistance=200]</code></td>
                </tr>

            </tbody>
        </table>

        <p><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp; <?php _e('Need help setting up the plugin? Check out our <a href="https://smashballoon.com/instagram-feed/free/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">setup directions</a>', 'instagram-feed'); ?></p>

    <?php } //End Display tab ?>


    <?php if( $sbi_active_tab == 'support' ) { //Start Support tab ?>

	    <div class="sbi_support">

		    <br/>
		    <h3 style="padding-bottom: 10px;"><?php _e("Need help?", 'instagram-feed'); ?></h3>

		    <p>
			    <span class="sbi-support-title"><i class="fa fa-life-ring" aria-hidden="true"></i>&nbsp; <a
					    href="https://smashballoon.com/instagram-feed/free/?utm_source=plugin-free&utm_campaign=sbi"
					    target="_blank"><?php _e( 'Setup Directions' ); ?></a></span>
			    <?php _e( 'A step-by-step guide on how to setup and use the plugin.', 'instagram-feed' ); ?>
		    </p>

		    <p>
			    <span class="sbi-support-title"><i class="fa fa-youtube-play" aria-hidden="true"></i>&nbsp; <a
					    href="https://www.youtube.com/embed/q6ZXVU4g970" target="_blank"
					    id="sbi-play-support-video"><?php _e( 'Watch a Video', 'instagram-feed' ); ?></a></span>
			    <?php _e( "Watch a short video demonstrating how to set up, customize and use the plugin.<br /><b>Please note</b> that the video shows the set up and use of the <b><a href='https://smashballoon.com/instagram-feed/?utm_source=plugin-free&utm_campaign=sbi' target='_blank'>Pro version</a></b> of the plugin, but the process is the same for this free version. The only difference is some of the features available.", 'instagram-feed' ); ?>

			    <iframe id="sbi-support-video"
			            src="//www.youtube.com/embed/q6ZXVU4g970?theme=light&amp;showinfo=0&amp;controls=2" width="960"
			            height="540" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
		    </p>

		    <p>
			    <span class="sbi-support-title"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp; <a
					    href="https://smashballoon.com/instagram-feed/support/faq/?utm_source=plugin-free&utm_campaign=sbi"
					    target="_blank"><?php _e( 'FAQs and Docs', 'instagram-feed' ); ?></a></span>
			    <?php _e( 'View our expansive library of FAQs and documentation to help solve your problem as quickly as possible.', 'instagram-feed' ); ?>
		    </p>

		    <div class="sbi-support-faqs">

			    <ul>
				    <li><b>FAQs</b></li>
                    <li>&bull;&nbsp; <?php _e( '<a href="https://smashballoon.com/my-photos-wont-load/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">My Instagram Feed Won\'t Load</a>', 'instagram-feed' ); ?></li>
				    <li>&bull;&nbsp; <?php _e( '<a href="https://smashballoon.com/my-instagram-access-token-keep-expiring/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">My Access Token Keeps Expiring</a>', 'instagram-feed' ); ?></li>
				    <li style="margin-top: 8px; font-size: 12px;"><a href="https://smashballoon.com/instagram-feed/support/faq/?utm_source=plugin-free&utm_campaign=sbi" target="_blank"><?php _e( 'See All', 'instagram-feed' ); ?><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
			    </ul>

			    <ul>
				    <li><b><?php _e("Documentation", 'instagram-feed'); ?></b></li>
				    <li>&bull;&nbsp; <?php _e( '<a href="https://smashballoon.com/instagram-feed/free?utm_source=plugin-free&utm_campaign=sbi" target="_blank">Installation and Configuration</a>', 'instagram-feed' ); ?></li>
				    <li>&bull;&nbsp; <?php _e( '<a href="https://smashballoon.com/display-multiple-instagram-feeds/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">Displaying multiple feeds</a>', 'instagram-feed' ); ?></li>
				    <li>&bull;&nbsp; <?php _e( '<a href="https://smashballoon.com/instagram-feed-faq/customization/?utm_source=plugin-free&utm_campaign=sbi" target="_blank">Customizing your Feed</a>', 'instagram-feed' ); ?></li>
			    </ul>
		    </div>

		    <p>
			    <span class="sbi-support-title"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; <a
					    href="https://smashballoon.com/instagram-feed/support/?utm_source=plugin-free&utm_campaign=sbi"
					    target="_blank"><?php _e( 'Request Support', 'instagram-feed' ); ?></a></span>
			    <?php _e( 'Still need help? Submit a ticket and one of our support experts will get back to you as soon as possible.<br /><b>Important:</b> Please include your <b>System Info</b> below with all support requests.', 'instagram-feed' ); ?>
		    </p>
	    </div>

	    <hr />

	    <h3><?php _e('System Info &nbsp; <i style="color: #666; font-size: 11px; font-weight: normal;">Click the text below to select all</i>', 'instagram-feed'); ?></h3>




        <?php $sbi_options = get_option('sb_instagram_settings'); ?>
        <textarea readonly="readonly" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)." style="width: 100%; max-width: 960px; height: 500px; white-space: pre; font-family: Menlo,Monaco,monospace;">
## SITE/SERVER INFO: ##
Site URL:                 <?php echo site_url() . "\n"; ?>
Home URL:                 <?php echo home_url() . "\n"; ?>
WordPress Version:        <?php echo get_bloginfo( 'version' ) . "\n"; ?>
PHP Version:              <?php echo PHP_VERSION . "\n"; ?>
Web Server Info:          <?php echo $_SERVER['SERVER_SOFTWARE'] . "\n"; ?>

## ACTIVE PLUGINS: ##
<?php
$plugins = get_plugins();
$active_plugins = get_option( 'active_plugins', array() );

foreach ( $plugins as $plugin_path => $plugin ) {
    // If the plugin isn't active, don't show it.
    if ( ! in_array( $plugin_path, $active_plugins ) )
        continue;

    echo $plugin['Name'] . ': ' . $plugin['Version'] ."\n";
}
?>

## PLUGIN SETTINGS: ##
sb_instagram_plugin_type => Instagram Feed Free
<?php
foreach( $sbi_options as $key => $val ) {
	if ( is_array( $val ) ) {
		foreach ( $val as $item ) {
			if ( is_array( $item ) ) {
				foreach ( $item as $key2 => $val2 ) {
					echo "$key2 => $val2\n";
				}
			} else {
				echo "$key => $item\n";
			}
		}
	} else {
		echo "$key => $val\n";
	}
}
?>

## API RESPONSE: ##
<?php
$con_accounts = isset( $sbi_options['connected_accounts'] ) ? $sbi_options['connected_accounts'] : array();
$first_at = '';
$i = 0;
if ( ! empty( $con_accounts ) ) {
    foreach ( $con_accounts as $account ) {
        if ( $i == 0 ) {
	        $first_at = $account['access_token'];
	        $i++;
        }
    }

}

$url = ! empty( $first_at ) ? 'https://api.instagram.com/v1/users/self/?access_token=' . sbi_maybe_clean( $first_at ) : 'no_at';
if ( $url !== 'no_at' ) {
    $args = array(
        'timeout' => 60,
        'sslverify' => false
    );
    $result = wp_remote_get( $url, $args );

    if ( ! is_wp_error( $result ) ) {
	    $data = json_decode( $result['body'] );

	    if ( isset( $data->data->id ) ) {
		    echo 'id: ' . $data->data->id . "\n";
		    echo 'username: ' . $data->data->username . "\n";
		    echo 'posts: ' . $data->data->counts->media . "\n";

	    } else {
		    echo 'No id returned' . "\n";
		    echo 'code: ' . $data->meta->code . "\n";
		    if ( isset( $data->meta->error_message ) ) {
			    echo 'error_message: ' . $data->meta->error_message . "\n";
		    }
	    }
    } else {
	    var_export( $result );
    }


} else {
    echo 'No Access Token';
}?>

## Invalid Tokens: ##
<?php
$sb_expired_tokens = get_option( 'sb_expired_tokens' );
if (is_array($sb_expired_tokens)){
	$sb_expired_tokens = array_unique($sb_expired_tokens);
}
var_export($sb_expired_tokens);
?>
</textarea>

<?php 
} //End Support tab 
?>


    <div class="sbi_quickstart">
        <h3><i class="fa fa-rocket" aria-hidden="true"></i>&nbsp; Display your feed</h3>
        <p>Copy and paste this shortcode directly into the page, post or widget where you'd like to display the feed:        <input type="text" value="[instagram-feed]" size="15" readonly="readonly" style="text-align: center;" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p>
        <p>Find out how to display <a href="?page=sb-instagram-feed&amp;tab=display">multiple feeds</a>.</p>
    </div>

    <a href="https://smashballoon.com/instagram-feed/demo/?utm_source=plugin-free&utm_campaign=sbi" target="_blank" class="sbi-pro-notice">
        <img src="<?php echo plugins_url( 'img/instagram-pro-promo.png' , __FILE__ ) ?>" alt="<?php esc_attr_e( 'Instagram Feed Pro', 'instagram-feed' ); ?>">
    </a>

    <p class="sbi_plugins_promo dashicons-before dashicons-admin-plugins"> <?php _e('Check out our other free plugins:', 'instagram-feed' ); ?> <a href="https://wordpress.org/plugins/custom-facebook-feed/" target="_blank">Facebook</a> and <a href="https://wordpress.org/plugins/custom-twitter-feeds/" target="_blank">Twitter</a>.</p>

    <div class="sbi_share_plugin">
        <h3><?php _e('Like the plugin? Help spread the word!', 'instagram-feed'); ?></h3>

        <!-- TWITTER -->
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://wordpress.org/plugins/instagram-feed/" data-text="Display beautifully clean, customizable, and responsive feeds from multiple Instagram accounts" data-via="smashballoon" data-dnt="true">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <style type="text/css">
        #twitter-widget-0{ float: left; width: 100px !important; }
        .IN-widget{ margin-right: 20px; }
        </style>

        <!-- FACEBOOK -->
        <div id="fb-root" style="display: none;"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-href="https://wordpress.org/plugins/instagram-feed/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display: block; float: left; margin-right: 20px;"></div>

        <!-- LINKEDIN -->
        <script src="//platform.linkedin.com/in.js" type="text/javascript">
          lang: en_US
        </script>
        <script type="IN/Share" data-url="https://wordpress.org/plugins/instagram-feed/"></script>

        <!-- GOOGLE + -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <div class="g-plusone" data-size="medium" data-href="https://wordpress.org/plugins/instagram-feed/"></div>
    </div>

</div> <!-- end #sbi_admin -->

<?php } //End Settings page

function sb_instagram_admin_style() {
        wp_register_style( 'sb_instagram_admin_css', plugins_url('css/sb-instagram-admin.css', __FILE__), array(), SBIVER );
        wp_enqueue_style( 'sb_instagram_font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
        wp_enqueue_style( 'sb_instagram_admin_css' );
        wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'sb_instagram_admin_style' );

function sb_instagram_admin_scripts() {
    wp_enqueue_script( 'sb_instagram_admin_js', plugins_url( 'js/sb-instagram-admin.js' , __FILE__ ), array(), SBIVER );
    wp_localize_script( 'sb_instagram_admin_js', 'sbiA', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'sbi_nonce' => wp_create_nonce( 'sbi-smash-balloon' )
        )
    );
    if( !wp_script_is('jquery-ui-draggable') ) { 
        wp_enqueue_script(
            array(
            'jquery',
            'jquery-ui-core',
            'jquery-ui-draggable'
            )
        );
    }
    wp_enqueue_script(
        array(
        'hoverIntent',
        'wp-color-picker'
        )
    );
}
add_action( 'admin_enqueue_scripts', 'sb_instagram_admin_scripts' );

// Add a Settings link to the plugin on the Plugins page
$sbi_plugin_file = 'instagram-feed/instagram-feed.php';
add_filter( "plugin_action_links_{$sbi_plugin_file}", 'sbi_add_settings_link', 10, 2 );
 
//modify the link by unshifting the array
function sbi_add_settings_link( $links, $file ) {
    $sbi_settings_link = '<a href="' . admin_url( 'admin.php?page=sb-instagram-feed' ) . '">' . __( 'Settings', 'instagram-feed' ) . '</a>';
    array_unshift( $links, $sbi_settings_link );
 
    return $links;
}


//REVIEW REQUEST NOTICE

// checks $_GET to see if the nag variable is set and what it's value is
function sbi_check_nag_get( $get, $nag, $option, $transient ) {
    if ( isset( $_GET[$nag] ) && $get[$nag] == 1 ) {
        update_option( $option, 'dismissed' );
    } elseif ( isset( $_GET[$nag] ) && $get[$nag] == 'later' ) {
        $time = 2 * WEEK_IN_SECONDS;
        set_transient( $transient, 'waiting', $time );
        update_option( $option, 'pending' );
    }
}

// will set a transient if the notice hasn't been dismissed or hasn't been set yet
function sbi_maybe_set_transient( $transient, $option ) {
    $sbi_rating_notice_waiting = get_transient( $transient );
    $notice_status = get_option( $option, false );

    if ( ! $sbi_rating_notice_waiting && !( $notice_status === 'dismissed' || $notice_status === 'pending' ) ) {
        $time = 2 * WEEK_IN_SECONDS;
        set_transient( $transient, 'waiting', $time );
        update_option( $option, 'pending' );
    }
}

// generates the html for the admin notice
function sbi_rating_notice_html() {

    //Only show to admins
    if ( current_user_can( 'manage_options' ) ){

        global $current_user;
        $user_id = $current_user->ID;

        /* Check that the user hasn't already clicked to ignore the message */
        if ( ! get_user_meta( $user_id, 'sbi_ignore_rating_notice') ) {

            _e("
            <div class='sbi_notice sbi_review_notice'>
                <img src='". plugins_url( 'instagram-feed/img/sbi-icon.png' ) ."' alt='Instagram Feed'>
                <div class='ctf-notice-text'>
                    <p>It's great to see that you've been using the <strong>Instagram Feed</strong> plugin for a while now. Hopefully you're happy with it!&nbsp; If so, would you consider leaving a positive review? It really helps to support the plugin and helps others to discover it too!</p>
                    <p class='links'>
                        <a class='sbi_notice_dismiss' href='https://wordpress.org/support/plugin/instagram-feed/reviews/' target='_blank'>Sure, I'd love to!</a>
                        &middot;
                        <a class='sbi_notice_dismiss' href='" .esc_url( add_query_arg( 'sbi_ignore_rating_notice_nag', '1' ) ). "'>No thanks</a>
                        &middot;
                        <a class='sbi_notice_dismiss' href='" .esc_url( add_query_arg( 'sbi_ignore_rating_notice_nag', '1' ) ). "'>I've already given a review</a>
                        &middot;
                        <a class='sbi_notice_dismiss' href='" .esc_url( add_query_arg( 'sbi_ignore_rating_notice_nag', 'later' ) ). "'>Ask Me Later</a>
                    </p>
                </div>
                <a class='sbi_notice_close' href='" .esc_url( add_query_arg( 'sbi_ignore_rating_notice_nag', '1' ) ). "'><i class='fa fa-close'></i></a>
            </div>
            ");

        }

    }
}
function sb_instagram_clear_page_caches() {
	if ( isset( $GLOBALS['wp_fastest_cache'] ) && method_exists( $GLOBALS['wp_fastest_cache'], 'deleteCache' ) ){
		/* Clear WP fastest cache*/
		$GLOBALS['wp_fastest_cache']->deleteCache();
	}

	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}

	if ( class_exists('W3_Plugin_TotalCacheAdmin') ) {
		$plugin_totalcacheadmin = & w3_instance('W3_Plugin_TotalCacheAdmin');

		$plugin_totalcacheadmin->flush_all();
	}

	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain();
	}

	if ( class_exists( 'autoptimizeCache' ) ) {
		/* Clear autoptimize */
		autoptimizeCache::clearall();
	}
}
/**
 * Called via ajax to automatically save access token and access token secret
 * retrieved with the big blue button
 */
function sbi_auto_save_tokens() {
	if ( current_user_can( 'edit_posts' ) ) {
		wp_cache_delete ( 'alloptions', 'options' );

		$options = get_option( 'sb_instagram_settings', array() );
		$new_access_token = isset( $_POST['access_token'] ) ? sanitize_text_field( $_POST['access_token'] ) : false;
		$split_token = $new_access_token ? explode( '.', $new_access_token ) : array();
		$new_user_id = isset( $split_token[0] ) ? $split_token[0] : '';

		$connected_accounts =  isset( $options['connected_accounts'] ) ? $options['connected_accounts'] : array();
		$test_connection_data = sbi_account_data_for_token( $new_access_token );

		$connected_accounts[ $new_user_id ] = array(
			'access_token' => sbi_get_parts( $new_access_token ),
			'user_id' => $test_connection_data['id'],
			'username' => $test_connection_data['username'],
			'is_valid' => $test_connection_data['is_valid'],
			'last_checked' => $test_connection_data['last_checked'],
			'profile_picture' => $test_connection_data['profile_picture']
		);

		$options['connected_accounts'] = $connected_accounts;

		update_option( 'sb_instagram_settings', $options );

		echo json_encode( $connected_accounts[ $new_user_id ] );
	}
	die();
}
add_action( 'wp_ajax_sbi_auto_save_tokens', 'sbi_auto_save_tokens' );

function sbi_auto_save_id() {
	if ( current_user_can( 'edit_posts' ) && isset( $_POST['id'] ) ) {
		$options = get_option( 'sb_instagram_settings', array() );

		$options['sb_instagram_user_id'] = array( sanitize_text_field( $_POST['id'] ) );

		update_option( 'sb_instagram_settings', $options );
	}
	die();
}
add_action( 'wp_ajax_sbi_auto_save_id', 'sbi_auto_save_id' );

function sbi_test_token() {
	$access_token = isset( $_POST['access_token'] ) ? sanitize_text_field( $_POST['access_token'] ) : false;
	$options = get_option( 'sb_instagram_settings', array() );
	$connected_accounts =  isset( $options['connected_accounts'] ) ? $options['connected_accounts'] : array();

	if ( $access_token ) {
		wp_cache_delete ( 'alloptions', 'options' );

		$split_token = explode( '.', $access_token );
		$new_user_id = isset( $split_token[0] ) ? $split_token[0] : '';

		$test_connection_data = sbi_account_data_for_token( $access_token );

		if ( isset( $test_connection_data['error_message'] ) ) {
			echo $test_connection_data['error_message'];
		} elseif ( $test_connection_data !== false ) {
			$username = $test_connection_data['username'] ? $test_connection_data['username'] : $connected_accounts[ $new_user_id ]['username'];
			$user_id = $test_connection_data['id'] ? $test_connection_data['id'] : $connected_accounts[ $new_user_id ]['user_id'];
			$profile_picture = $test_connection_data['profile_picture'] ? $test_connection_data['profile_picture'] : $connected_accounts[ $new_user_id ]['profile_picture'];

			$connected_accounts[ $new_user_id ] = array(
				'access_token' => sbi_get_parts( $access_token ),
				'user_id' => $user_id,
				'username' => $username,
				'is_valid' => $test_connection_data['is_valid'],
				'last_checked' => $test_connection_data['last_checked'],
				'profile_picture' => $profile_picture
			);

			$options['connected_accounts'] = $connected_accounts;

			update_option( 'sb_instagram_settings', $options );

			$expired = get_option( 'sb_expired_tokens', array() );
			$new_expired = array();
			foreach ( $expired as $expired_token ) {
                $split_token = explode( '.', $expired_token );
				$old_user_id = isset( $split_token[0] ) ? $split_token[0] : '';
				if ( $old_user_id !== $new_user_id ) {
					$new_expired[] = $expired_token;
                }
            }
            update_option( 'sb_expired_tokens', $new_expired );
//Delete all SBI transients
			global $wpdb;
			$table_name = $wpdb->prefix . "options";
			$wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_sbi\_%')
                    " );
			$wpdb->query( "
                    DELETE
                    FROM $table_name
                    WHERE `option_name` LIKE ('%\_transient\_timeout\_sbi\_%')
                    " );
			$wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_&sbi\_%')
			        " );
			$wpdb->query( "
			        DELETE
			        FROM $table_name
			        WHERE `option_name` LIKE ('%\_transient\_timeout\_&sbi\_%')
			        " );

			echo json_encode( $connected_accounts[ $new_user_id ] );
		} else {
			echo 'A successful connection could not be made. Please make sure your Access Token is valid.';
		}

	}

	die();
}
add_action( 'wp_ajax_sbi_test_token', 'sbi_test_token' );

function sbi_delete_account() {
	$access_token = isset( $_POST['access_token'] ) ? sanitize_text_field( $_POST['access_token'] ) : false;
	$options = get_option( 'sb_instagram_settings', array() );
	$connected_accounts =  isset( $options['connected_accounts'] ) ? $options['connected_accounts'] : array();

	if ( $access_token ) {
		wp_cache_delete ( 'alloptions', 'options' );

		$split_token = explode( '.', $access_token );
		$new_user_id = isset( $split_token[0] ) ? $split_token[0] : '';

		unset( $connected_accounts[ $new_user_id ] );

		$options['connected_accounts'] = $connected_accounts;

		update_option( 'sb_instagram_settings', $options );

	}

	die();
}
add_action( 'wp_ajax_sbi_delete_account', 'sbi_delete_account' );

function sbi_account_data_for_token( $access_token ) {
	$return = array(
		'id' => false,
		'username' => false,
		'is_valid' => false,
		'last_checked' => time()
	);
	$url = 'https://api.instagram.com/v1/users/self/?access_token=' . sbi_maybe_clean( $access_token );
	$args = array(
		'timeout' => 60,
		'sslverify' => false
	);
	$result = wp_remote_get( $url, $args );

	if ( ! is_wp_error( $result ) ) {
		$data = json_decode( $result['body'] );
	} else {
	    $data = array();
    }

	if ( isset( $data->data->id ) ) {
		$return['id'] = $data->data->id;
		$return['username'] = $data->data->username;
		$return['is_valid'] = true;
		$return['profile_picture'] = $data->data->profile_picture;

	} elseif ( isset( $data->error_type ) && $data->error_type === 'OAuthRateLimitException' ) {
		$return['error_message'] = 'This account\'s access token is currently over the rate limit. Try removing this access token from all feeds and wait an hour before reconnecting.';
	} else {
		$return = false;

	}

	return $return;
}

function sbi_get_connected_accounts_data( $sb_instagram_at ) {
	$sbi_options = get_option( 'sb_instagram_settings' );
	$return = array();
	$return['connected_accounts'] = isset( $sbi_options['connected_accounts'] ) ? $sbi_options['connected_accounts'] : array();

	if ( empty( $connected_accounts ) && ! empty( $sb_instagram_at ) ) {
		$tokens = explode(',', $sb_instagram_at );
		$user_ids = array();

		foreach ( $tokens as $token ) {
			$account = sbi_account_data_for_token( $token );
			if ( isset( $account['is_valid'] ) ) {
				$split = explode( '.', $token );
				$return['connected_accounts'][ $split[0] ] = array(
					'access_token' => sbi_get_parts( $token ),
					'user_id' => $split[0],
					'username' => '',
					'is_valid' => true,
					'last_checked' => time(),
					'profile_picture' => ''
				);
				$user_ids[] = $split[0];
			}

		}

		$sbi_options['connected_accounts'] = $return['connected_accounts'];
		$sbi_options['sb_instagram_at'] = '';
		$sbi_options['sb_instagram_user_id'] = $user_ids;

		$return['user_ids'] = $user_ids;

		update_option( 'sb_instagram_settings', $sbi_options );
		delete_option( 'sb_expired_tokens' );
	}

	return $return;
}

function sbi_after_connection() {

    if ( isset( $_POST['access_token'] ) ) {
	    $access_token = sanitize_text_field( $_POST['access_token'] );
	    $account_info = 	sbi_account_data_for_token( $access_token );
        echo json_encode( $account_info );
    }

    die();
}
add_action( 'wp_ajax_sbi_after_connection', 'sbi_after_connection' );

// variables to define certain terms
$transient = 'instagram_feed_rating_notice_waiting';
$option = 'sbi_rating_notice';
$nag = 'sbi_ignore_rating_notice_nag';

sbi_check_nag_get( $_GET, $nag, $option, $transient );
sbi_maybe_set_transient( $transient, $option );
$notice_status = get_option( $option, false );

// only display the notice if the time offset has passed and the user hasn't already dismissed it
if ( get_transient( $transient ) !== 'waiting' && $notice_status !== 'dismissed' ) {
    add_action( 'admin_notices', 'sbi_rating_notice_html' );
}