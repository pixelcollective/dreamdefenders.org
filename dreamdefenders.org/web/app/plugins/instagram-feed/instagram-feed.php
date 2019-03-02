<?php 
/*
Plugin Name: Instagram Feed
Plugin URI: https://smashballoon.com/instagram-feed
Description: Display beautifully clean, customizable, and responsive Instagram feeds
Version: 1.11.2
Author: Smash Balloon
Author URI: https://smashballoon.com/
License: GPLv2 or later
Text Domain: instagram-feed

Copyright 2019  Smash Balloon LLC (email : hey@smashballoon.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'SBIVER', '1.11.2' );

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Include admin
if ( is_admin() ) include dirname( __FILE__ ) .'/instagram-feed-admin.php';

// Add shortcodes
add_shortcode('instagram-feed', 'display_instagram');
function display_instagram($atts, $content = null) {

    /******************* SHORTCODE OPTIONS ********************/

    $options = get_option('sb_instagram_settings');
    
    //Pass in shortcode attrbutes
    $atts = shortcode_atts(
    array(
        'id' => isset($options[ 'sb_instagram_user_id' ]) ? $options[ 'sb_instagram_user_id' ] : '',
        'width' => isset($options[ 'sb_instagram_width' ]) ? $options[ 'sb_instagram_width' ] : '',
        'widthunit' => isset($options[ 'sb_instagram_width_unit' ]) ? $options[ 'sb_instagram_width_unit' ] : '',
        'widthresp' => isset($options[ 'sb_instagram_feed_width_resp' ]) ? $options[ 'sb_instagram_feed_width_resp' ] : '',
        'height' => isset($options[ 'sb_instagram_height' ]) ? $options[ 'sb_instagram_height' ] : '',
        'heightunit' => isset($options[ 'sb_instagram_height_unit' ]) ? $options[ 'sb_instagram_height_unit' ] : '',
        'sortby' => isset($options[ 'sb_instagram_sort' ]) ? $options[ 'sb_instagram_sort' ] : '',
        'num' => isset($options[ 'sb_instagram_num' ]) ? $options[ 'sb_instagram_num' ] : '',
        'cols' => isset($options[ 'sb_instagram_cols' ]) ? $options[ 'sb_instagram_cols' ] : '',
        'disablemobile' => isset($options[ 'sb_instagram_disable_mobile' ]) ? $options[ 'sb_instagram_disable_mobile' ] : '',
        'imagepadding' => isset($options[ 'sb_instagram_image_padding' ]) ? $options[ 'sb_instagram_image_padding' ] : '',
        'imagepaddingunit' => isset($options[ 'sb_instagram_image_padding_unit' ]) ? $options[ 'sb_instagram_image_padding_unit' ] : '',
        'background' => isset($options[ 'sb_instagram_background' ]) ? $options[ 'sb_instagram_background' ] : '',
        'showbutton' => isset($options[ 'sb_instagram_show_btn' ]) ? $options[ 'sb_instagram_show_btn' ] : '',
        'buttoncolor' => isset($options[ 'sb_instagram_btn_background' ]) ? $options[ 'sb_instagram_btn_background' ] : '',
        'buttontextcolor' => isset($options[ 'sb_instagram_btn_text_color' ]) ? $options[ 'sb_instagram_btn_text_color' ] : '',
        'buttontext' => isset($options[ 'sb_instagram_btn_text' ]) ? $options[ 'sb_instagram_btn_text' ] : '',
        'imageres' => isset($options[ 'sb_instagram_image_res' ]) ? $options[ 'sb_instagram_image_res' ] : '',
        'showfollow' => isset($options[ 'sb_instagram_show_follow_btn' ]) ? $options[ 'sb_instagram_show_follow_btn' ] : '',
        'followcolor' => isset($options[ 'sb_instagram_folow_btn_background' ]) ? $options[ 'sb_instagram_folow_btn_background' ] : '',
        'followtextcolor' => isset($options[ 'sb_instagram_follow_btn_text_color' ]) ? $options[ 'sb_instagram_follow_btn_text_color' ] : '',
        'followtext' => isset($options[ 'sb_instagram_follow_btn_text' ]) ? $options[ 'sb_instagram_follow_btn_text' ] : '',
        'showheader' => isset($options[ 'sb_instagram_show_header' ]) ? $options[ 'sb_instagram_show_header' ] : '',
        'headersize' => isset($options[ 'sb_instagram_header_size' ]) ? $options[ 'sb_instagram_header_size' ] : '',
        'showbio' => isset($options[ 'sb_instagram_show_bio' ]) ? $options[ 'sb_instagram_show_bio' ] : '',
        'headercolor' => isset($options[ 'sb_instagram_header_color' ]) ? $options[ 'sb_instagram_header_color' ] : '',
        'class' => '',
        'ajaxtheme' => isset($options[ 'sb_instagram_ajax_theme' ]) ? $options[ 'sb_instagram_ajax_theme' ] : '',
        'cachetime' => isset($options[ 'sb_instagram_cache_time' ]) ? $options[ 'sb_instagram_cache_time' ] : '',
        'media' => isset($options[ 'sb_instagram_media_type' ]) ? $options[ 'sb_instagram_media_type' ] : '',
        'accesstoken' => '',
        'user' => isset($options[ 'sb_instagram_user' ]) ? $options[ 'sb_instagram_user' ] : false,
	    ), $atts);


    /******************* VARS ********************/

	$sb_instagram_user_id = is_array( $atts['id'] ) ? implode( ',', $atts['id'] ) : trim($atts['id'], " ,");
	$sb_instagram_users = !empty($atts['user']) ? explode( ',', trim( $atts['user'] ) ) : false;

	// Access Token
	$at_front_string = '';
	$at_middle_string = '';
	$at_back_string = '';

	//$db_access_token = isset( $options['sb_instagram_at'] ) ? trim( $options['sb_instagram_at'] ) : '';
	$existing_shortcode_tokens = ! empty( $atts['accesstoken'] ) ? explode(',', str_replace(' ', '', $atts['accesstoken'] ) ) : '';
	$existing_shortcode_tokens = apply_filters( 'sbi_access_tokens', $existing_shortcode_tokens );

	$usable_tokens = array();
	$all_valid_tokens = array();


	if ( ! empty ( $existing_shortcode_tokens ) ) {
		foreach ( $existing_shortcode_tokens as $existing_shortcode_token ) {
			if ( ! empty( $existing_shortcode_token ) ) {
				$usable_tokens[] =  $existing_shortcode_token;
				$all_valid_tokens[] = $existing_shortcode_tokens;
			}

		}
	}
	if ( $sb_instagram_users !== false && ! empty ( $options[ 'connected_accounts' ] ) ) {
		foreach ( $options[ 'connected_accounts' ] as $connected_account ) {
			if ( in_array( $connected_account['username'], $sb_instagram_users ) ) {
				$usable_tokens[] = sbi_get_parts( $connected_account['access_token'] );
			}
			if ( ! in_array( sbi_get_parts( $connected_account['access_token'] ), $all_valid_tokens ) && ! in_array( sbi_maybe_clean( $connected_account['access_token'] ), $all_valid_tokens ) ) {
				$all_valid_tokens[] = sbi_get_parts( $connected_account['access_token'] );
			}
		}

	}
	if ( empty( $usable_tokens ) && ! empty( $options[ 'connected_accounts' ] ) ) {
		$feed_id_array = is_array( $sb_instagram_user_id ) ? $sb_instagram_user_id : explode( ',', $sb_instagram_user_id );
		if ( ! empty( $feed_id_array ) && ! empty( $feed_id_array[0] ) ) {
			foreach ( $options[ 'connected_accounts' ] as $connected_account ) {
				if ( isset( $connected_account['access_token'] ) && in_array( $connected_account['user_id'], $feed_id_array, true ) ) {
					$usable_tokens[] = $connected_account['access_token'];
				} elseif ( isset( $connected_account['access_token'] ) ) {
					if ( ! in_array( sbi_get_parts( $connected_account['access_token'] ), $all_valid_tokens ) && ! in_array( sbi_maybe_clean( $connected_account['access_token'] ), $all_valid_tokens ) ) {
						$all_valid_tokens[] = sbi_get_parts( $connected_account['access_token'] );
					}
				}
			}
		} else {
			foreach ( $options[ 'connected_accounts' ] as $connected_account ) {
				if ( empty( $usable_tokens ) ) {
					$usable_tokens        = array( $connected_account['access_token'] );
					$user_for_token       = explode( '.', $connected_account['access_token'] );
					$sb_instagram_user_id = $user_for_token[0];
				}

				if ( ! in_array( sbi_get_parts( $connected_account['access_token'] ), $all_valid_tokens ) && ! in_array( sbi_maybe_clean( $connected_account['access_token'] ), $all_valid_tokens ) ) {
					$all_valid_tokens[] = sbi_get_parts( $connected_account['access_token'] );
				}
			}
		}

	} elseif ( empty ( $all_valid_tokens ) ) {

		$db_access_tokens = isset( $options['sb_instagram_at'] ) ? explode( ',', trim( $options['sb_instagram_at'] ) ) : array();
		foreach ( $db_access_tokens as $db_access_token ) {
			if ( ! empty( $db_access_token ) ) {
				$usable_tokens[]    = sbi_get_parts( $db_access_token );
				$all_valid_tokens[] = sbi_get_parts( $db_access_token );
			}
		}
	}

	$the_token_array = ! empty( $usable_tokens ) ? $usable_tokens : $all_valid_tokens;
	if ( empty( $the_token_array ) && ! empty( $all_valid_tokens ) ) {
		$the_token_array = $all_valid_tokens;
	}

	if ( ! empty( $the_token_array ) ) {
		$at_front_string = '&quot;feedID&quot;: &quot;';
		$at_middle_string = '&quot;mid&quot;: &quot;';
		$at_back_string = '&quot;callback&quot;: &quot;';
		$sb_instagram_user_id = '';
		foreach ( $usable_tokens as $token ) {
			$parts = explode('.', $token );
			$sb_instagram_user_id .= $parts[0].',';
			$at_front_string .= $parts[0].',';
			$at_middle_string .= $parts[1].',';
			if ( isset( $parts[3] ) ) {
				$at_back_string .= $parts[2].'.'.$parts[3].',';
			} else {
				$at_back_string .= $parts[2].',';
			}
		}
		$sb_instagram_user_id = substr( $sb_instagram_user_id, 0, -1 );
		$at_front_string = substr( $at_front_string, 0, -1 ) . '&quot;,';
		$at_middle_string = substr( $at_middle_string, 0, -1 ) . '&quot;,';
		$at_back_string = substr( $at_back_string, 0, -1 ) . '&quot;,';
		$access_token = $the_token_array[0];
	}

	//Container styles
    $sb_instagram_width = $atts['width'];
    $sb_instagram_width_unit = $atts['widthunit'];
    $sb_instagram_height = $atts['height'];
    $sb_instagram_height_unit = $atts['heightunit'];
    $sb_instagram_image_padding = $atts['imagepadding'];
    $sb_instagram_image_padding_unit = $atts['imagepaddingunit'];
    $sb_instagram_background = $atts['background'];

    //Set to be 100% width on mobile?
    $sb_instagram_width_resp = $atts[ 'widthresp' ];
    ( $sb_instagram_width_resp == 'on' || $sb_instagram_width_resp == 'true' || $sb_instagram_width_resp == true ) ? $sb_instagram_width_resp = true : $sb_instagram_width_resp = false;
    if( $atts[ 'widthresp' ] == 'false' ) $sb_instagram_width_resp = false;

    //Layout options
    $sb_instagram_cols = $atts['cols'];

    $sb_instagram_styles = 'style="';
    if($sb_instagram_cols == 1) $sb_instagram_styles .= 'max-width: 640px; ';
    if ( !empty($sb_instagram_width) ) $sb_instagram_styles .= 'width:' . $sb_instagram_width . $sb_instagram_width_unit .'; ';
    if ( !empty($sb_instagram_height) && $sb_instagram_height != '0' ) $sb_instagram_styles .= 'height:' . $sb_instagram_height . $sb_instagram_height_unit .'; ';
    if ( !empty($sb_instagram_background) ) $sb_instagram_styles .= 'background-color: ' . $sb_instagram_background . '; ';
    if ( !empty($sb_instagram_image_padding) ) $sb_instagram_styles .= 'padding-bottom: ' . (2*intval($sb_instagram_image_padding)).$sb_instagram_image_padding_unit . '; ';
    $sb_instagram_styles .= '"';

    //Header
    $sb_instagram_show_header = $atts['showheader'];
    ( $sb_instagram_show_header == 'on' || $sb_instagram_show_header == 'true' || $sb_instagram_show_header == true ) ? $sb_instagram_show_header = true : $sb_instagram_show_header = false;
    if( $atts[ 'showheader' ] === 'false' ) $sb_instagram_show_header = false;
	$sb_instagram_header_size_class = in_array( strtolower( $atts['headersize'] ), array( 'medium', 'large' ) ) ? ' sbi_'.strtolower( $atts['headersize'] ) : '';
	$sb_instagram_header_color = str_replace('#', '', $atts['headercolor']);

	//As this is a new option in the update then set it to be true if it doesn't exist yet
	if ( !array_key_exists( 'sb_instagram_show_bio', $options ) ) $sb_instagram_show_bio = 'true';

	$sb_instagram_show_bio = $atts['showbio'];
	( $sb_instagram_show_bio == 'on' || $sb_instagram_show_bio == 'true' || $sb_instagram_show_bio ) ? $sb_instagram_show_bio = 'true' : $sb_instagram_show_bio = 'false';
	if( $atts[ 'showbio' ] === 'false' ) $sb_instagram_show_bio = false;

	// button text
	$sb_instagram_follow_btn_text = __( $atts['followtext'], 'instagram-feed' );
	$sb_instagram_load_btn_text = __( $atts['buttontext'], 'instagram-feed' );

    //Load more button
    $sb_instagram_show_btn = $atts['showbutton'];
    ( $sb_instagram_show_btn == 'on' || $sb_instagram_show_btn == 'true' || $sb_instagram_show_btn == true ) ? $sb_instagram_show_btn = true : $sb_instagram_show_btn = false;
    if( $atts[ 'showbutton' ] === 'false' ) $sb_instagram_show_btn = false;
    $sb_instagram_btn_background = str_replace('#', '', $atts['buttoncolor']);
    $sb_instagram_btn_text_color = str_replace('#', '', $atts['buttontextcolor']);
    //Load more button styles
    $sb_instagram_button_styles = 'style="display: none; ';
    if ( !empty($sb_instagram_btn_background) ) $sb_instagram_button_styles .= 'background: #'.$sb_instagram_btn_background.'; ';
    if ( !empty($sb_instagram_btn_text_color) ) $sb_instagram_button_styles .= 'color: #'.$sb_instagram_btn_text_color.';';
    $sb_instagram_button_styles .= '"';

    //Follow button vars
    $sb_instagram_show_follow_btn = $atts['showfollow'];
    ( $sb_instagram_show_follow_btn == 'on' || $sb_instagram_show_follow_btn == 'true' || $sb_instagram_show_follow_btn == true ) ? $sb_instagram_show_follow_btn = true : $sb_instagram_show_follow_btn = false;
    if( $atts[ 'showfollow' ] === 'false' ) $sb_instagram_show_follow_btn = false;
    $sb_instagram_follow_btn_background = str_replace('#', '', $atts['followcolor']);
    $sb_instagram_follow_btn_text_color = str_replace('#', '', $atts['followtextcolor']);
    //Follow button styles
    $sb_instagram_follow_btn_styles = 'style="';
    if ( !empty($sb_instagram_follow_btn_background) ) $sb_instagram_follow_btn_styles .= 'background: #'.$sb_instagram_follow_btn_background.'; ';
    if ( !empty($sb_instagram_follow_btn_text_color) ) $sb_instagram_follow_btn_styles .= 'color: #'.$sb_instagram_follow_btn_text_color.';';
    $sb_instagram_follow_btn_styles .= '"';
    //Follow button HTML
	$sb_instagram_follow_btn_classes = '';
	if( strpos($sb_instagram_follow_btn_styles, 'background') !== false ) $sb_instagram_follow_btn_classes = ' sbi_custom';
    $sb_instagram_follow_btn_html = '<span class="sbi_follow_btn'.$sb_instagram_follow_btn_classes.'"><a href="https://www.instagram.com/" '.$sb_instagram_follow_btn_styles.' target="_blank" rel="noopener"><i class="fa fab fa-instagram"></i>'.esc_html( stripslashes( $sb_instagram_follow_btn_text ) ).'</a></span>';

    //Mobile
    $sb_instagram_disable_mobile = $atts['disablemobile'];
    ( $sb_instagram_disable_mobile == 'on' || $sb_instagram_disable_mobile == 'true' || $sb_instagram_disable_mobile == true ) ? $sb_instagram_disable_mobile = ' sbi_disable_mobile' : $sb_instagram_disable_mobile = ' sbi_mob_col_auto';
    if( $atts[ 'disablemobile' ] === 'false' ) $sb_instagram_disable_mobile = ' sbi_mob_col_auto';

    //Caching
	$sb_instagram_cache_time = trim($atts['cachetime']);
	if ( !array_key_exists( 'sb_instagram_cache_time', $options ) || $sb_instagram_cache_time == '' ) $sb_instagram_cache_time = '1';
	($sb_instagram_cache_time == 0 || $sb_instagram_cache_time == '0') ? $sb_instagram_disable_cache = 'true' : $sb_instagram_disable_cache = 'false';
//Figure out how long the first part of the caching string should be
	$sbi_cache_string_include_length = 0;
	$sbi_cache_string_exclude_length = 0;
	$sbi_cache_string_length = 40 - min($sbi_cache_string_include_length + $sbi_cache_string_exclude_length, 20);

	//Create the first part of the caching string
	$sbi_transient_name = 'sbi_';
	$sb_instagram_white_list = '';
	$sb_instagram_show_users = '';
	$sbi_transient_name .= substr( $sb_instagram_white_list, 0, 3 ) . substr( $sb_instagram_show_users, 0, 3 );

	$feed_is_filtered = ($sb_instagram_white_list !== '' || $sb_instagram_show_users !== '');
    //Media type
    $sb_instagram_media_type = $atts['media'];
    if( !isset($sb_instagram_media_type) || empty($sb_instagram_media_type) ) $sb_instagram_media_type = 'all';

	if ( $sb_instagram_media_type !== 'all' ) {
		$sbi_transient_name .= substr( $sb_instagram_media_type, 0, 1 );
	}
	if( true ) $sbi_transient_name .= substr( str_replace(str_split(', '), '', $sb_instagram_user_id), 0, $sbi_cache_string_length); //Remove commas and spaces and limit chars

	//Find the length of the string so far, and then however many chars are left we can use this for filters
	$sbi_cache_string_length = strlen($sbi_transient_name);
	$sbi_cache_string_length = 44 - intval($sbi_cache_string_length);

	//Add both parts of the caching string together and make sure it doesn't exceed 45
	$sbi_transient_name = substr($sbi_transient_name, 0, 45);
	// delete_transient($sbi_transient_name);

	//Check whether the cache transient exists in the database and is available for more than one more minute
	$feed_expires = get_option( '_transient_timeout_'.$sbi_transient_name );
	$sbi_cache_exists = $feed_expires !== false && ($feed_expires - time()) > 60 ? 'true' : 'false';

	$sbiHeaderCache = 'false';
	//If it's a user then add the header cache check to the feed
	$sb_instagram_user_id_arr = explode(',', $sb_instagram_user_id);
	$sbi_header_transient_name = 'sbi_header_' . trim($sb_instagram_user_id_arr[0]);
	$sbi_header_transient_name = substr($sbi_header_transient_name, 0, 45);

	//Check for the header cache
	$header_expires = get_option( '_transient_timeout_'.$sbi_header_transient_name );
	$sbi_header_cache_exists = $header_expires !== false && ($header_expires - time()) > 60 ? 'true' : 'false';
	$sbiHeaderCache = $sbi_header_cache_exists;

	if ( isset( $options['check_api'] ) && ( $options['check_api'] === 'on' || $options['check_api']) && ( !isset( $options['sb_instagram_cache_time'] ) || ( isset( $options['sb_instagram_cache_time'] ) && (int)$options['sb_instagram_cache_time'] > 0 ) ) ) {
		if ( ! get_transient( '&'.$sbi_transient_name, false ) ) {
			$sbi_cache_exists = 'true';
			$sbiHeaderCache = 'true';
		}
	}

	$use_backup_json = '';
	$use_header_backup = false;
	$always_use_backup = isset( $atts['permanent'] ) ? ($atts['permanent'] === 'true') : false;
	$backups_enabled = isset( $options['sb_instagram_backup'] ) ? $options['sb_instagram_backup'] !== '' : true;
	if ( !$always_use_backup ) {
		$always_use_backup = false;
	}
	$still_using_backup = false;
	if ( $sbiHeaderCache == 'false' && true ) {
		$still_using_backup = get_transient( '&'.$sbi_header_transient_name, false );
	}

	if ( ($sbiHeaderCache == 'false' && $still_using_backup) || ($always_use_backup && isset( $sbi_header_transient_name )) ) {
		$use_header_backup = sbi_should_use_backup_cache( $access_token, $sbi_header_transient_name, $feed_is_filtered, $always_use_backup, $sb_instagram_white_list, $backups_enabled);
		if ( $use_header_backup ) {
			$sbiHeaderCache = 'true';
			$use_backup_json = ', &quot;useBackup&quot;: &quot;header&quot;';
		}
	}

	$still_using_backup = false;
	if ( $sbi_cache_exists == 'false' ) {
		$still_using_backup = get_transient( '&'.$sbi_transient_name, false );
	}
	if ( ($sbi_cache_exists == 'false' && $still_using_backup) || $always_use_backup ) {
		$use_feed_backup = sbi_should_use_backup_cache( $access_token, $sbi_transient_name, $feed_is_filtered, $always_use_backup, $sb_instagram_white_list, $backups_enabled );

		if ( $use_feed_backup ) {
			$sbi_cache_exists = 'true';
			if ( $use_header_backup ) {
				$use_backup_json = ', &quot;useBackup&quot;: &quot;header,feed&quot;';
			} else {
				$use_backup_json = ', &quot;useBackup&quot;: &quot;feed&quot;';
			}
		}
	}

	/* END CACHING */
    //Class
    !empty( $atts['class'] ) ? $sbi_class = ' ' . trim($atts['class']) : $sbi_class = '';

    //Ajax theme
    $sb_instagram_ajax_theme = $atts['ajaxtheme'];
    ( $sb_instagram_ajax_theme == 'on' || $sb_instagram_ajax_theme == 'true' || $sb_instagram_ajax_theme == true ) ? $sb_instagram_ajax_theme = true : $sb_instagram_ajax_theme = false;
    if( $atts[ 'disablemobile' ] === 'false' ) $sb_instagram_ajax_theme = false;


    /******************* CONTENT ********************/

    $sb_instagram_content = '<div id="sb_instagram" class="sbi' . $sbi_class . $sb_instagram_disable_mobile;
    if ( !empty($sb_instagram_height) ) $sb_instagram_content .= ' sbi_fixed_height ';
    $sb_instagram_content .= ' sbi_col_' . trim($sb_instagram_cols);
    if ( $sb_instagram_width_resp ) $sb_instagram_content .= ' sbi_width_resp';
    $sb_instagram_content .= '" '.$sb_instagram_styles .' data-id="' . $sb_instagram_user_id . '" data-num="' . trim($atts['num']) . '" data-res="' . trim($atts['imageres']) . '" data-cols="' . trim($sb_instagram_cols) . '" data-options=\'{&quot;sortby&quot;: &quot;'.$atts['sortby'].'&quot;, &quot;showbio&quot;: &quot;'.$sb_instagram_show_bio.'&quot;,'.$at_front_string.' &quot;headercolor&quot;: &quot;'.$sb_instagram_header_color.'&quot;, &quot;imagepadding&quot;: &quot;'.$sb_instagram_image_padding.'&quot;,'.$at_middle_string.' &quot;disablecache&quot;: &quot;'.$sb_instagram_disable_cache.'&quot;, &quot;sbiCacheExists&quot;: &quot;'.$sbi_cache_exists.'&quot;,'.$at_back_string.' &quot;sbiHeaderCache&quot;: &quot;'.$sbiHeaderCache.'&quot;'.$use_backup_json.'}\'>';

    //Header
    if( $sb_instagram_show_header ) $sb_instagram_content .= '<div class="sb_instagram_header'.$sb_instagram_header_size_class.'" style="padding: '.(2*intval($sb_instagram_image_padding)) . $sb_instagram_image_padding_unit .'; padding-bottom: 0;"></div>';

    //Images container
	$padding_style = (int)$sb_instagram_image_padding > 0 ? ' style="padding: '.$sb_instagram_image_padding . $sb_instagram_image_padding_unit . ';"' : '';
	$sb_instagram_content .= '<div id="sbi_images"' . $padding_style .'>';

    //Error messages
    $sb_instagram_error = false;

    if ( empty( $access_token ) ){
        $sb_instagram_content .= '<div class="sb_instagram_error"><p>' . __( 'Please enter an Access Token on the Instagram Feed plugin Settings page.', 'instagram-feed' ) . '</p></div>';
        $sb_instagram_error = true;
    }

    //Loader
    if( !$sb_instagram_error ) $sb_instagram_content .= '<div class="sbi_loader"></div>';

    //Load section
    $sb_instagram_content .= '</div><div id="sbi_load" class="sbi_hidden"';

    if(($sb_instagram_image_padding == 0 || !isset($sb_instagram_image_padding)) && ($sb_instagram_show_btn || $sb_instagram_show_follow_btn)) $sb_instagram_content .= ' style="padding-top: 5px"';
    $sb_instagram_content .= '>';

    //Load More button
    if( $sb_instagram_show_btn && !$sb_instagram_error ) $sb_instagram_content .= '<a class="sbi_load_btn" href="javascript:void(0);" '.$sb_instagram_button_styles.'><span class="sbi_btn_text">' . esc_html( stripslashes( $sb_instagram_load_btn_text ) ).'</span><span class="sbi_loader sbi_hidden"></span></a>';

    //Follow button
    if( $sb_instagram_show_follow_btn && !$sb_instagram_error ) $sb_instagram_content .= $sb_instagram_follow_btn_html;

    $sb_instagram_content .= '</div>'; //End #sbi_load
    
    $sb_instagram_content .= '</div>'; //End #sb_instagram

    //If using an ajax theme then add the JS to the bottom of the feed
	//If using an ajax theme then add the JS to the bottom of the feed
	if($sb_instagram_ajax_theme){
		$font_method = isset( $options['sbi_font_method'] ) ? $options['sbi_font_method'] : 'svg';
		$access_token = isset( $options['sb_instagram_at'] ) ? $options['sb_instagram_at'] : '';

		$sb_instagram_content .= '<script type="text/javascript">var sb_instagram_js_options = {"sb_instagram_at":"'.sbi_get_parts( $access_token ).'", "font_method":"'.$font_method.'"};</script>';
		$sb_instagram_content .= "<script type='text/javascript' src='".plugins_url( '/js/sb-instagram.min.js?ver='.SBIVER , __FILE__ )."'></script>";
	}
 
    //Return our feed HTML to display
    return $sb_instagram_content;

}


#############################

//Allows shortcodes in theme
add_filter('widget_text', 'do_shortcode');

function sbi_should_use_backup_cache( $token, $cache_name, $is_filtered, $always_use_backup = false, $white_list_id = '', $backups_enabled = true ) {
	if ( ! $backups_enabled ) {
		return false;
	}

	$expired_tokens = get_option( 'sb_expired_tokens', array() );
	$still_using_backup = get_transient( '&'.$cache_name, false );
	$backup_cache_exists = get_option( '!' . $cache_name );
	$white_list_updated = get_transient( 'sb_wlupdated_'.$white_list_id );

	if ( $always_use_backup ) {
		if ( !$backup_cache_exists || $white_list_updated ) {
			return false;
		}
		return true;
	} elseif ( $white_list_updated == 'true' ) {
		return false;
	}

	if ( in_array( sbi_maybe_clean( $token ), $expired_tokens, true ) && $backup_cache_exists ) {

		if ( !strpos( $cache_name, '_header' ) ) {
			echo '<div id="sbi_mod_error">';
			echo '<p><b>' . __( 'Error: Access Token is not valid or has expired.', 'instagram-feed' ) . ' ' . __( 'Feed will not update.', 'instagram-feed' ) . '</b><br /><span>' . __(' This error message is only visible to WordPress admins</span>', 'instagram-feed' );
			echo '<p>' . __( 'There\'s an issue with the Instagram Access Token that you are using. Please obtain a new Access Token on the plugin\'s Settings page.<br />If you continue to have an issue with your Access Token then please see <a href="https://smashballoon.com/my-instagram-access-token-keep-expiring/" target="_blank" rel="noopener">this FAQ</a> for more information.', 'instagram-feed' );
			echo '</div>';
		}

		return true;
	} elseif ( $still_using_backup && $backup_cache_exists ) {
		return true;
	}

	return false;
}

function sbi_cache_photos() {
	$sb_instagram_settings = get_option('sb_instagram_settings');

	//If the caching time doesn't exist in the database then set it to be 1 hour
	( !array_key_exists( 'sb_instagram_cache_time', $sb_instagram_settings ) ) ? $sb_instagram_cache_time = 1 : $sb_instagram_cache_time = $sb_instagram_settings['sb_instagram_cache_time'];
	( !array_key_exists( 'sb_instagram_cache_time_unit', $sb_instagram_settings ) ) ? $sb_instagram_cache_time_unit = 'minutes' : $sb_instagram_cache_time_unit = $sb_instagram_settings['sb_instagram_cache_time_unit'];

	//Calculate the cache time in seconds
	if($sb_instagram_cache_time_unit == 'minutes') $sb_instagram_cache_time_unit = 60;
	if($sb_instagram_cache_time_unit == 'hours') $sb_instagram_cache_time_unit = 60*60;
	if($sb_instagram_cache_time_unit == 'days') $sb_instagram_cache_time_unit = 60*60*24;
	$cache_seconds = intval($sb_instagram_cache_time) * intval($sb_instagram_cache_time_unit);

	$transient_name = $_POST['transientName'];
	if ( is_array( $transient_name ) ) {
		$transient_name = isset( $transient_name['feed'] ) ? sanitize_text_field( $transient_name['feed'] ) : 'sbi_other';
	}

	$cache_type = strpos( $transient_name, 'sbi_header_' ) !== 0 ? 'feed' : 'header';
	$num_images = isset( $_POST['num_images'] ) ? (int)$_POST['num_images'] : 33;

	if ( $num_images > 0 ) {
	    $feed_tokens = isset( $_POST['feed_tokens'] ) ? $_POST['feed_tokens'] : array();
	    $new_cache = ! empty( $feed_tokens ) ? sbi_get_post_data_from_tokens( $feed_tokens, $cache_type, $num_images ) : '';
        echo $new_cache;
		set_transient( $transient_name, $new_cache, $cache_seconds );

		$backups_enabled = isset( $sb_instagram_settings['sb_instagram_backup'] ) ? $sb_instagram_settings['sb_instagram_backup'] !== '' : true;

		if ( $backups_enabled ) {
			if ( strlen( $new_cache ) > 1999 && strpos( $transient_name, 'sbi_header_' ) !== 0 ) {
				update_option( '!'.$transient_name, $new_cache, false );
			} elseif ( strpos( $transient_name, 'sbi_header_' ) === 0 ) {
				update_option( '!'.$transient_name, $new_cache, false );
			}
		}

	}

	if ( strlen( $new_cache ) < 2000 && strpos( $transient_name, 'sbi_header_' ) !== 0 && get_option( '!'.$transient_name ) ) {
		echo 'too much filtering';
	}

}
add_action('wp_ajax_cache_photos', 'sbi_cache_photos');
add_action('wp_ajax_nopriv_cache_photos', 'sbi_cache_photos');

function sbi_get_post_data_from_tokens( $access_tokens = array(), $cache_type = 'feed', $num_needed = 33 ) {
    $images = array();
    $num_images_overall = 0;
    $pagination = array(
        'next_url' => array()
    );
    foreach ( $access_tokens as $token ) {
        $clean_token = preg_replace("/[^a-zA-Z0-9\.]+/", "", sbi_maybe_clean( $token ) );
        $split_token = explode( '.', $clean_token );
        $id = $split_token[0];
        if ( $cache_type === 'header' ) {
            $api_call = 'https://api.instagram.com/v1/users/' . $id . '?access_token=' . $clean_token;
        } else {
            $api_call = 'https://api.instagram.com/v1/users/' . $id . '/media/recent?access_token=' . $clean_token . '&count=33';
        }
        $args = array(
            'timeout' => 60,
            'sslverify' => false
        );
        $result = wp_remote_get( $api_call, $args );
        if ( ! is_wp_error( $result ) ) {
            $decoded_results = json_decode( $result['body'], true );
            $num_images_returned = 0;
            if ( is_array( $decoded_results['data'] ) ) {
                $num_images_returned = count( $decoded_results['data'] );
            }
            $num_images_overall += $num_images_returned;
            $images = array_merge( $images, $decoded_results['data'] );
            if ( !empty( $decoded_results['pagination']['next_url'] ) ) {
                $pagination['next_url'][] = $decoded_results['pagination']['next_url'];
            }
        } else {
            // error
            return json_encode( $result );
        }
    }

    if ( $cache_type === 'feed' ) {
        $secondary_requests = 0;

        while ( $num_images_overall < $num_needed && ! empty( $pagination['next_url'] ) && $secondary_requests < 10 ) {
            $secondary_requests++;
            $api_call = array_shift( $pagination['next_url'] );
            $args = array(
                'timeout' => 60,
                'sslverify' => false
            );
            $result = wp_remote_get( $api_call, $args );
            if ( ! is_wp_error( $result ) ) {
                $decoded_results = json_decode( $result['body'], true );
                $num_images_returned = 0;
                if ( is_array( $decoded_results['data'] ) ) {
                    $num_images_returned = count( $decoded_results['data'] );
                }
                $num_images_overall += $num_images_returned;
                $images = array_merge( $images, $decoded_results['data'] );
                if ( !empty( $decoded_results['pagination']['next_url'] ) ) {
                    $pagination['next_url'][] = $decoded_results['pagination']['next_url'];
                }
            } else {
                // error
                return json_encode( $result );
            }

        }
    }

    if ( isset( $images[0]['created_time'] ) ) {
        usort($images, 'sbi_date_sort' );
    }

    $return = array(
        'pagination' => $pagination,
        'data' => $images,
        'meta' => array()
    );

    return json_encode( $return );
}

function sbi_date_sort( $a, $b ) {

    if ( isset( $a['created_time'] ) ) {
        return (int)$b['created_time'] - (int)$a['created_time'];
    } else {
        return rand ( -1, 1 );
    }

}

function sbi_set_expired_token() {
	$access_token = isset( $_POST['access_token'] ) ? sanitize_text_field( $_POST['access_token'] ) : false;

	if ( $access_token !== false ) {
		$expired_tokens = get_option( 'sb_expired_tokens', array() );

		if (! in_array( sbi_maybe_clean( $access_token ), $expired_tokens, true ) ) {
			$expired_tokens[] = sbi_maybe_clean( $access_token );
		}

		update_option( 'sb_expired_tokens', $expired_tokens, false );
	}

	die();
}
add_action('wp_ajax_sbi_set_expired_token', 'sbi_set_expired_token');
add_action('wp_ajax_nopriv_sbi_set_expired_token', 'sbi_set_expired_token');

function sbi_set_use_backup() {
	$sb_instagram_settings = get_option('sb_instagram_settings');
	$backups_enabled = isset( $sb_instagram_settings['sb_instagram_backup'] ) ? $sb_instagram_settings['sb_instagram_backup'] !== '' : true;
	$context = isset( $_POST['context'] ) ? sanitize_text_field( $_POST['context'] ) : 'use_backup';

	if ( $backups_enabled ) {
		$transient_name = $_POST['transientName'];

		if ( is_array( $transient_name ) ) {
			$transient_name = isset( $transient_name['feed'] ) ? sanitize_text_field( $transient_name['feed'] ) : 'sbi_other';
		}
		$backup_exists = get_option( '!' . $transient_name, false );

		if ( ! get_transient( '&' . $transient_name ) && $backup_exists !== false ) {
			set_transient( '&' . $transient_name, $context, 86400 );
		}

	}

	die();
}
add_action('wp_ajax_sbi_set_use_backup', 'sbi_set_use_backup');
add_action('wp_ajax_nopriv_sbi_set_use_backup', 'sbi_set_use_backup');

function sbi_encode_uri( $uri )
{
	$unescaped = array(
		'%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
		'%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
	);
	$reserved = array(
		'%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?','%3A'=>':',
		'%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
	);
	$score = array(
		'%23'=>'#'
	);

	return strtr( rawurlencode( $uri ), array_merge( $reserved,$unescaped,$score ) );
}

function sbi_get_cache() {
	$options = get_option( 'sb_instagram_settings' );

	$transient_names = json_decode(str_replace( array( '\"', "\\'" ), array( '"', "'" ), sanitize_text_field( $_POST['transientName'] ) ), true);
	$header_cache_data_transient_data = get_transient( $transient_names['header'] );
	$should_use_backup_header = isset( $_POST['useBackupHeader'] ) && sanitize_text_field( $_POST['useBackupHeader'] ) == 'true' ? true : false;
	$should_use_backup_feed = isset( $_POST['useBackupFeed'] ) && sanitize_text_field( $_POST['useBackupFeed'] ) == 'true' ? true : false;
	$feed_cache_transient_data = get_transient( $transient_names['feed'] );
	$warning_message_data = '';
	$backups_enabled = isset( $options['sb_instagram_backup'] ) ? $options['sb_instagram_backup'] !== '' : true;

	if ( ! empty( $feed_cache_transient_data ) ) {
		$feed_cache_data = $feed_cache_transient_data;
	} elseif ( ! isset( $options['check_api'] ) || $options['check_api'] === 'on' || $options['check_api'] === true ) {
		$feed_cache_data = '{"error":"tryfetch"}';
	} elseif ( !get_transient( 'sbi_doing_tryfetch_once' ) && $backups_enabled ) {
		set_transient( 'sbi_doing_tryfetch_once', 'true', 60*60 );
		$feed_cache_data = '{"error":"tryfetch"}';
		$warning_message_data = ',"tryfetchonce":{"tryfetchonce":"tryfetchonce"}';
	} else {
		$feed_cache_data = '{"error":"nocache"}';
	}

	if ( $transient_names['comments'] === 'need' ) {
		$comment_cache_data = get_transient( 'sbinst_comment_cache' );
		$comment_cache_data = ! empty( $comment_cache_data ) ? sbi_encode_uri( $comment_cache_data ) : '{"error":"nocache"}';
	} else {
		$comment_cache_data = '{"error":"nocache"}';
	}

	// maybe use backup cache
	$still_using_backup = get_transient( '&'.$transient_names['feed'], false );
	$doing_tryfetch = (isset( $options['check_api'] ) && $options['check_api'] === 'on' || $options['check_api']);
	if ( ! empty( $header_cache_data_transient_data ) ) {
		$header_cache_data = $header_cache_data_transient_data;
	} elseif ( $doing_tryfetch ) {
		$header_cache_data = '{"error":"tryfetch"}';
	} elseif ( !get_transient( 'sbi_doing_tryfetch_once' ) && $backups_enabled ) {
		set_transient( 'sbi_doing_tryfetch_once', 'true', 60*60 );
		$feed_cache_data = '{"error":"tryfetch"}';
		$warning_message_data = ',"tryfetchonce":{"tryfetchonce":"tryfetchonce"}';
	} elseif ( empty( $header_cache_data_transient_data ) || $still_using_backup ) {
		$backup_header_cache = get_option( '!' . $transient_names['header'] );
		$header_cache_data = ! empty( $backup_header_cache ) ? $backup_header_cache : '{"error":"nocache"}';
		if ( $still_using_backup === 'falsecache' ) {
			$warning_message_data = ',"warning":{"warning":"falsecache"}';
		}
	} else {
		$header_cache_data = ! empty( $header_cache_data ) ? $header_cache_data : '{"error":"nocache"}';
	}

	// maybe use backup cache
	if ( (empty( $feed_cache_transient_data ) && $should_use_backup_feed) || $still_using_backup ) {
		$backup_feed_cache = get_option( '!' . $transient_names['feed'] );
		$feed_cache_data = ! empty( $backup_feed_cache ) ? $backup_feed_cache : $feed_cache_data;
		if ( $still_using_backup === 'falsecache' ) {
			$warning_message_data = ',"warning":{"warning":"falsecache"}';
		}
	}

	$data = '{"header":' . $header_cache_data .',"feed":' . $feed_cache_data . ',"comments":' . $comment_cache_data . $warning_message_data . '}';

	echo $data;

	die();
}
add_action('wp_ajax_get_cache', 'sbi_get_cache');
add_action('wp_ajax_nopriv_get_cache', 'sbi_get_cache');

//sbi_clear_backups
function sbi_clear_backups() {
	if ( current_user_can( 'edit_posts' ) ) {
		//Delete all transients
		global $wpdb;
		$table_name = $wpdb->prefix . "options";
		$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%!sbi\_%')
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
	}
	die();
}
add_action( 'wp_ajax_sbi_clear_backups', 'sbi_clear_backups' );

function sbi_maybe_clean( $maybe_dirty ) {
	if ( substr_count ( $maybe_dirty , '.' ) < 3 ) {
		return $maybe_dirty;
	}

	$parts = explode( '.', trim( $maybe_dirty ) );
	$last_part = $parts[2] . $parts[3];
	$cleaned = $parts[0] . '.' . base64_decode( $parts[1] ) . '.' . base64_decode( $last_part );

	return $cleaned;
}
function sbi_get_parts( $whole ) {
	if ( substr_count ( $whole , '.' ) !== 2 ) {
		return $whole;
	}

	$parts = explode( '.', trim( $whole ) );
	$return = $parts[0] . '.' . base64_encode( $parts[1] ). '.' . base64_encode( $parts[2] );

	return substr( $return, 0, 40 ) . '.' . substr( $return, 40, 100 );
}

//Enqueue stylesheet
add_action( 'wp_enqueue_scripts', 'sb_instagram_styles_enqueue' );
function sb_instagram_styles_enqueue() {
    wp_register_style( 'sb_instagram_styles', plugins_url('css/sb-instagram.min.css', __FILE__), array(), SBIVER );
    wp_enqueue_style( 'sb_instagram_styles' );

    $options = get_option('sb_instagram_settings');
    if(isset($options['sb_instagram_disable_awesome'])){
        if( !$options['sb_instagram_disable_awesome'] || !isset($options['sb_instagram_disable_awesome']) ) wp_enqueue_style( 'sb-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
    }
    
}

//Enqueue scripts
add_action( 'wp_enqueue_scripts', 'sb_instagram_scripts_enqueue' );
function sb_instagram_scripts_enqueue() {
    //Register the script to make it available
    wp_register_script( 'sb_instagram_scripts', plugins_url( '/js/sb-instagram.min.js' , __FILE__ ), array('jquery'), SBIVER, true ); //http://www.minifier.org/

    //Options to pass to JS file
    $sb_instagram_settings = get_option('sb_instagram_settings');

    //Access token
	$font_method = isset( $sb_instagram_settings['sbi_font_method'] ) ? $sb_instagram_settings['sbi_font_method'] : 'svg';
	$access_token = isset( $sb_instagram_settings['sb_instagram_at'] ) ? $sb_instagram_settings['sb_instagram_at'] : '';
	$disable_font_awesome = isset($sb_instagram_settings['sb_instagram_disable_awesome']) ? $sb_instagram_settings['sb_instagram_disable_awesome'] : false;

	if ( $font_method === 'fontfile' && ! $disable_font_awesome ) {
		wp_enqueue_style( 'sb-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	}

    isset($sb_instagram_settings[ 'sb_instagram_ajax_theme' ]) ? $sb_instagram_ajax_theme = trim($sb_instagram_settings['sb_instagram_ajax_theme']) : $sb_instagram_ajax_theme = '';
    ( $sb_instagram_ajax_theme == 'on' || $sb_instagram_ajax_theme == 'true' || $sb_instagram_ajax_theme == true ) ? $sb_instagram_ajax_theme = true : $sb_instagram_ajax_theme = false;

    //Enqueue it to load it onto the page
    if( !$sb_instagram_ajax_theme ) wp_enqueue_script('sb_instagram_scripts');

	//Pass option to JS file
	$font_method = isset( $sb_instagram_settings['sbi_font_method'] ) ? $sb_instagram_settings['sbi_font_method'] : 'svg';
	$data = array(
		'sb_instagram_at' => sbi_get_parts( $access_token ),
		'font_method' => $font_method,
	);
	wp_localize_script('sb_instagram_scripts', 'sb_instagram_js_options', $data);
}

//Custom CSS
add_action( 'wp_head', 'sb_instagram_custom_css' );
function sb_instagram_custom_css() {
    $options = get_option('sb_instagram_settings');
    
    isset($options[ 'sb_instagram_custom_css' ]) ? $sb_instagram_custom_css = trim($options['sb_instagram_custom_css']) : $sb_instagram_custom_css = '';

    //Show CSS if an admin (so can see Hide Photos link), if including Custom CSS or if hiding some photos
    ( current_user_can( 'manage_options' ) || !empty($sb_instagram_custom_css) ) ? $sbi_show_css = true : $sbi_show_css = false;

    if( $sbi_show_css ) echo '<!-- Instagram Feed CSS -->';
    if( $sbi_show_css ) echo "\r\n";
    if( $sbi_show_css ) echo '<style type="text/css">';

    if( !empty($sb_instagram_custom_css) ){
        echo "\r\n";
        echo stripslashes($sb_instagram_custom_css);
    }

    if( current_user_can( 'manage_options' ) ){
        echo "\r\n";
        echo "#sbi_mod_error{ display: block !important; }";
    }

    if( $sbi_show_css ) echo "\r\n";
    if( $sbi_show_css ) echo '</style>';
    if( $sbi_show_css ) echo "\r\n";
}


//Custom JS
add_action( 'wp_footer', 'sb_instagram_custom_js' );
function sb_instagram_custom_js() {
	$options = get_option('sb_instagram_settings');
	isset($options[ 'sb_instagram_custom_js' ]) ? $sb_instagram_custom_js = trim($options['sb_instagram_custom_js']) : $sb_instagram_custom_js = '';

	echo '<!-- Instagram Feed JS -->';
	echo "\r\n";
	echo '<script type="text/javascript">';
	echo "\r\n";
	echo 'var sbiajaxurl = "' . admin_url('admin-ajax.php') . '";';

	if( !empty($sb_instagram_custom_js) ) echo "\r\n";
	if( !empty($sb_instagram_custom_js) ) echo "jQuery( document ).ready(function($) {";
	if( !empty($sb_instagram_custom_js) ) echo "\r\n";
	if( !empty($sb_instagram_custom_js) ) echo "window.sbi_custom_js = function(){";
	if( !empty($sb_instagram_custom_js) ) echo "\r\n";
	if( !empty($sb_instagram_custom_js) ) echo stripslashes($sb_instagram_custom_js);
	if( !empty($sb_instagram_custom_js) ) echo "\r\n";
	if( !empty($sb_instagram_custom_js) ) echo "}";
	if( !empty($sb_instagram_custom_js) ) echo "\r\n";
	if( !empty($sb_instagram_custom_js) ) echo "});";

	echo "\r\n";
	echo '</script>';
	echo "\r\n";

}

if ( ! function_exists( 'sb_remove_style_version' ) ) {
	function sb_remove_style_version( $src, $handle ){

		if ( $handle === 'sb-font-awesome' ) {
			$parts = explode( '?ver', $src );
			return $parts[0];
		} else {
			return $src;
		}

	}
	add_filter( 'style_loader_src', 'sb_remove_style_version', 15, 2 );
}

// Load plugin textdomain
add_action( 'init', 'sb_instagram_load_textdomain' );
function sb_instagram_load_textdomain() {
	load_plugin_textdomain('instagram-feed', false, basename( dirname(__FILE__) ) . '/languages');
}

//Run function on plugin activate
function sb_instagram_activate() {
    $options = get_option('sb_instagram_settings');
    $options[ 'sb_instagram_show_btn' ] = true;
    $options[ 'sb_instagram_show_header' ] = true;
	$options[ 'sb_instagram_show_follow_btn' ] = true;
    update_option( 'sb_instagram_settings', $options );
	delete_option( 'sb_expired_tokens' );

	global $wp_roles;
	$wp_roles->add_cap( 'administrator', 'manage_instagram_feed_options' );
}
register_activation_hook( __FILE__, 'sb_instagram_activate' );

//Uninstall
function sb_instagram_uninstall()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;

    //If the user is preserving the settings then don't delete them
    $options = get_option('sb_instagram_settings');
    $sb_instagram_preserve_settings = $options[ 'sb_instagram_preserve_settings' ];
    if($sb_instagram_preserve_settings) return;

    //Settings
    delete_option( 'sb_instagram_settings' );

	global $wpdb;
	$table_name = $wpdb->prefix . "options";
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%!sbi\_%')
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

	global $wp_roles;
	$wp_roles->remove_cap( 'administrator', 'manage_instagram_feed_options' );
}
register_uninstall_hook( __FILE__, 'sb_instagram_uninstall' );
