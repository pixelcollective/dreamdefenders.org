jQuery(document).ready(function($) {

    var hash = window.location.hash,
        token = hash.substring(14),
        id = token.split('.')[0];

    if (token.length > 40) {

        //https://api.instagram.com/v1/users/self/?access_token=' . sbi_maybe_clean( $access_token )
        $('.sbi_admin_btn').css('opacity','.5').after('<div class="spinner" style="visibility: visible; position: relative;float: left;margin-top: 15px;"></div>');
        var url = 'https://api.instagram.com/v1/users/self/?access_token=' + token;
        jQuery.ajax({
            url: sbiA.ajax_url,
            type: 'post',
            data: {
                action: 'sbi_after_connection',
                access_token: token,
            },
            success: function (data) {
                if (data.indexOf('{') === 0) {
                    var accountInfo = JSON.parse(data);
                    if (typeof accountInfo.error_message === 'undefined') {
                        accountInfo.token = token;

                        $('.sbi_admin_btn').css('opacity','1');
                        $('#sbi_config').find('.spinner').remove();
                        if (!$('.sbi_connected_account ').length) {
                            $('.sbi_no_accounts').remove();
                            sbSaveToken(token,true);
                        } else {
                            var buttonText = 'Connect This Account';
                            // if the account is connected, offer to update in case information has changed.
                            if ($('#sbi_connected_account_'+id).length) {
                                buttonText = 'Update This Account';
                            }
                            $('#sbi_config').append('<div id="sbi_config_info" class="sb_get_token">' +
                                '<div class="sbi_config_modal">' +
                                '<img class="sbi_ca_avatar" src="'+accountInfo.profile_picture+'" />' +
                                '<div class="sbi_ca_username"><strong>'+accountInfo.username+'</strong></div>' +
                                '<p class="sbi_submit"><input type="submit" name="sbi_submit" id="sbi_connect_account" class="button button-primary" value="'+buttonText+'">' +
                                '<a href="JavaScript:void(0);" class="button button-secondary" id="sbi_switch_accounts">Switch Accounts</a></p>' +
                                '<a href="JavaScript:void(0);"><i class="sbi_modal_close fa fa-times"></i></a>' +
                                '</div>' +
                                '</div>');

                            $('#sbi_connect_account').click(function(event) {
                                event.preventDefault();
                                $('#sbi_config_info').fadeOut(200);
                                sbSaveToken(token,false);
                            });

                            sbiSwitchAccounts();
                        }
                    } else {
                        $('.sbi_admin_btn').css('opacity','1');
                        $('#sbi_config').find('.spinner').remove();
                        var message = accountInfo.error_message;

                        $('#sbi_config').append('<div id="sbi_config_info" class="sb_get_token">' +
                            '<div class="sbi_config_modal">' +
                            '<p>'+message+'</p>' +
                            '<p class="sbi_submit"><a href="JavaScript:void(0);" class="button button-secondary" id="sbi_switch_accounts">Switch Accounts</a></p>' +
                            '<a href="JavaScript:void(0);"><i class="sbi_modal_close fa fa-times"></i></a>' +
                            '</div>' +
                            '</div>');

                        sbiSwitchAccounts();
                    }

                } else {
                    $('.sbi_admin_btn').css('opacity','1');
                    $('#sbi_config').find('.spinner').remove();
                    var message = 'There was an error connecting your account';

                    $('#sbi_config').append('<div id="sbi_config_info" class="sb_get_token">' +
                        '<div class="sbi_config_modal">' +
                        '<p>'+message+'</p>' +
                        '<p class="sbi_submit"><a href="JavaScript:void(0);" class="button button-secondary" id="sbi_switch_accounts">Switch Accounts</a></p>' +
                        '<a href="JavaScript:void(0);"><i class="sbi_modal_close fa fa-times"></i></a>' +
                        '</div>' +
                        '</div>');

                    sbiSwitchAccounts();
                }

            }
        });


        function sbiSwitchAccounts(){
            $('#sbi_switch_accounts').on('click', function(){
                //Log user out of Instagram by hitting the logout URL in an iframe
                $('body').append('<iframe style="display: none;" src="https://www.instagram.com/accounts/logout"></iframe>');

                $(this).text('Please wait...').after('<div class="spinner" style="visibility: visible; float: none; margin: -3px 0 0 3px;"></div>');

                //Wait a couple seconds for the logout to occur, then connect a new account
                setTimeout(function(){
                    window.location.href = $('.sbi_admin_btn').attr('href');
                }, 2000);
            });

            $('.sbi_modal_close').on('click', function(){
                $('#sbi_config_info').remove();
            });
        }

        window.location.hash = '';
    }

    function sbiAfterUpdateToken(savedToken,saveID){
        if (saveID) {
            sbSaveID(savedToken.user_id);
            $('.sbi_user_feed_ids_wrap').prepend(
                '<div id="sbi_user_feed_id_'+savedToken.user_id+'" class="sbi_user_feed_account_wrap">'+
                '<strong>'+savedToken.username+'</strong> <span>('+savedToken.user_id+')</span>' +
                '<input type="hidden" name="sb_instagram_user_id[]" value="'+savedToken.user_id+'">' +
                '</div>'
            );
        }
        if ($('#sbi_connected_account_'+savedToken.user_id).length) {
            if (savedToken.is_valid) {
                $('#sbi_connected_account_'+savedToken.user_id).addClass('sbi_account_updated');
            } else {
                $('#sbi_connected_account_'+savedToken.user_id).addClass('sbi_account_invalid');
            }
            $('#sbi_connected_account_'+savedToken.user_id).attr('data-accesstoken',savedToken.access_token);
            $('#sbi_connected_account_'+savedToken.user_id).find('.sbi_ca_accesstoken .sbi_ca_token').text(savedToken.access_token);
            $('#sbi_connected_account_'+savedToken.user_id).find('.sbi_tooltip code').text('[instagram-feed accesstoken="'+savedToken.access_token+'"]');
            $('#sbi_connected_account_'+savedToken.user_id).find('.sbi_ca_at_is_valid span').text('Last Tested: Now');
        } else {
            var removeOrSaveHTML = saveID ? '<a href="JavaScript:void(0);" class="sbi_remove_from_user_feed button-primary"><i class="fa fa-minus-circle" aria-hidden="true"></i>Remove from Primary Feed</a>' : '<a href="JavaScript:void(0);" class="sbi_use_in_user_feed button-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add to Primary Feed</a>',
                statusClass = saveID ? 'sbi_account_active' : 'sbi_account_updated',
                html = '<div class="sbi_connected_account '+statusClass+'" id="sbi_connected_account_'+savedToken.user_id+'" data-accesstoken="'+savedToken.access_token+'" data-userid="'+savedToken.user_id+'" data-username="'+savedToken.username+'">'+
                    '<div class="sbi_ca_info">'+

                    '<div class="sbi_ca_delete">'+
                        '<a href="JavaScript:void(0);" class="sbi_delete_account"><i class="fa fa-times"></i><span class="sbi_remove_text">Remove</span></a>'+
                    '</div>'+

                    '<div class="sbi_ca_username">'+
                        '<img class="sbi_ca_avatar" src="'+savedToken.profile_picture+'" />'+
                        '<strong>'+savedToken.username+'</strong>'+
                    '</div>'+

                    '<div class="sbi_ca_actions">'+
                        removeOrSaveHTML +
                        '<a class="sbi_ca_token_shortcode button-secondary" href="JavaScript:void(0);"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Add to another Feed</a>'+
                        '<p class="sbi_ca_show_token"><input type="checkbox" id="sbi_ca_show_token_'+savedToken.user_id+'" /><label for="sbi_ca_show_token_'+savedToken.user_id+'">Show Access Token</label></p>'+
                    '</div>'+

                    '<div class="sbi_ca_shortcode">'+
                    '<p>Copy and paste this shortcode into your page or widget area:<br>'+
                    '<code>[instagram-feed user="'+savedToken.username+'"]</code>'+
                    '</p>'+
                    '<p>To add multiple users in the same feed, simply separate them using commas:<br>'+
                    '<code>[instagram-feed user="'+savedToken.username+', a_second_user, a_third_user"]</code>'+
                    '<p>Click on the <a href="?page=sb-instagram-feed&tab=display" target="_blank">Display Your Feed</a> tab to learn more about shortcodes</p>'+
                    '</div>'+

                    '<div class="sbi_ca_accesstoken">' +
                    '<span class="sbi_ca_token_label">Access Token:</span><input type="text" class="sbi_ca_token" value="'+savedToken.access_token+'" readonly="readonly" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac).">' +
                    '</div>' +

                    '</div>'+
                    '</div>';
            $('.sbi_connected_accounts_wrap').prepend(html);
        }
    }

    function sbSaveToken(token,saveID) {
        $('.sbi_connected_accounts_wrap').fadeTo("slow" , 0.5);
        jQuery.ajax({
            url: sbiA.ajax_url,
            type: 'post',
            data: {
                action: 'sbi_auto_save_tokens',
                access_token: token,
                just_tokens: true
            },
            success: function (data) {
                var savedToken = JSON.parse(data);
                $('.sbi_connected_accounts_wrap').fadeTo("slow" , 1);
                sbiAfterUpdateToken(savedToken,saveID);
            }
        });
    }

    function sbSaveID(ID) {
        jQuery.ajax({
            url: sbiA.ajax_url,
            type: 'post',
            data: {
                action: 'sbi_auto_save_id',
                id: ID,
                just_tokens: true
            },
            success: function (data) {
            }
        });
    }

    // connect accounts
    $('.sbi_manually_connect_wrap').hide();
    $('.sbi_manually_connect').click(function(event) {
        event.preventDefault();
        if ( $('.sbi_manually_connect_wrap').is(':visible') ) {
            $('.sbi_manually_connect_wrap').slideUp(200);
        } else {
            $('.sbi_manually_connect_wrap').slideDown(200);
            $('#sb_manual_at').focus();
        }
    });
    var $body = $('body');
    $body.on('click', '.sbi_remove_from_user_feed, .sbi_use_in_user_feed, .sbi_test_token, .sbi_delete_account *, .sbi_ca_token_shortcode', function (event) {
        event.preventDefault();
        var $clicked = $(event.target),
            accessToken = $clicked.closest('.sbi_connected_account').attr('data-accesstoken'),
            action = false,
            atParts = accessToken.split('.'),
            username = $clicked.closest('.sbi_connected_account').attr('data-username');

        if ($clicked.hasClass('sbi_remove_from_user_feed')) {
            $clicked.removeClass('sbi_remove_from_user_feed');
            $clicked.addClass('sbi_use_in_user_feed');
            $clicked.closest('.sbi_connected_account').removeClass('sbi_account_active');
            $clicked.html('<i class="fa fa-plus-circle" aria-hidden="true"></i>Add to Primary Feed');
            $('#sbi_user_feed_id_'+atParts[0]).remove();
        } else if ($clicked.hasClass('sbi_use_in_user_feed')) {
            $clicked.removeClass('sbi_use_in_user_feed');
            $clicked.addClass('sbi_remove_from_user_feed');
            $clicked.closest('.sbi_connected_account').removeClass('sbi_account_updated');
            $clicked.closest('.sbi_connected_account').addClass('sbi_account_active');
            $clicked.html('<i class="fa fa-minus-circle" aria-hidden="true" style="margin-right: 5px;"></i>Remove from Primary Feed');
            var name = '<strong>'+atParts[0]+'</strong>';
            if (username !== '') {
                name = '<strong>'+username+'</strong> <span>('+atParts[0]+')</span>';
            }
            $('.sbi_user_feed_ids_wrap').prepend(
                '<div id="sbi_user_feed_id_'+atParts[0]+'" class="sbi_user_feed_account_wrap">'+
                name +
                '<input type="hidden" name="sb_instagram_user_id[]" value="'+atParts[0]+'">' +
                '</div>'
            );
        } else if ($clicked.parent().hasClass('sbi_delete_account')) {
            if (window.confirm("Delete this connected account?")) {
                action = 'sbi_delete_account';
                $('#sbi_user_feed_id_' + atParts[0] + ',#sbi_connected_account_' + atParts[0]).remove();
                jQuery.ajax({
                    url: sbiA.ajax_url,
                    type: 'post',
                    data: {
                        action: action,
                        access_token: accessToken
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        } else if ($clicked.hasClass('sbi_ca_token_shortcode')) {
            jQuery(this).closest('.sbi_ca_info').find('.sbi_ca_shortcode').slideToggle(200);
        } //

    });

    $body.on('change', '.sbi_ca_show_token input[type=checkbox]', function(event) {
        jQuery(this).closest('.sbi_ca_info').find('.sbi_ca_accesstoken').slideToggle(200);
    });


    //If there's a hash then autofill the token and id
    /*
    if(hash && !jQuery('#sbi_just_saved').length){
        //$('#sbi_config').append('<div id="sbi_config_info"><p><b>Access Token: </b><input type="text" size=58 readonly value="'+token+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><b>User ID: </b><input type="text" size=12 readonly value="'+id+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp; <b><span style="color: red;">Important:</span> Copy and paste</b> these into the fields below and click <b>"Save Changes"</b>.</p></div>');
        $('#sbi_config').append('<div id="sbi_config_info"><p class="sb_get_token"><b>Access Token: </b><input type="text" size=58 readonly value="'+token+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><b>User ID: </b><input type="text" size=12 readonly value="'+id+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p></div>');
        if(jQuery('#sb_instagram_at').val() == '' && token.length > 40) {
            jQuery('#sb_instagram_at').val(token);
            sbSaveToken(token);
        } else {
            jQuery('.sb_get_token').append('<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Connect This Account"></p>');
        }

    }

    $('.sb_get_token #submit').click(function(event) {
        event.preventDefault();
        $(this).closest('.submit').fadeOut();
        jQuery('#sb_instagram_at').val(token);
        sbSaveToken(token);
    });
    */

    $('#sbi_manual_submit').click(function(event) {
        event.preventDefault();
        var $self = $(this);
        var accessToken = $('#sb_manual_at').val();
        if (accessToken.length < 15) {
            if (!$('.sbi_manually_connect_wrap').find('.sbi_user_id_error').length) {
                $('.sbi_manually_connect_wrap').show().prepend('<div class="sbi_user_id_error" style="display:block;">Please enter a valid access token</div>');
            }
        } else {
            $(this).attr('disabled',true);
            $(this).closest('.sbi_manually_connect_wrap').fadeOut();
            $('.sbi_connected_accounts_wrap').fadeTo("slow" , 0.5).find('.sbi_user_id_error').remove();

            jQuery.ajax({
                url: sbiA.ajax_url,
                type: 'post',
                data: {
                    action: 'sbi_test_token',
                    access_token: accessToken
                },
                success: function (data) {
                    $('.sbi_connected_accounts_wrap').fadeTo("slow" , 1);
                    $self.removeAttr('disabled');
                    if ( data.indexOf('{') > -1) {
                        var savedToken = JSON.parse(data);
                        $(this).closest('.sbi_manually_connect_wrap').fadeOut();
                        $('#sb_manual_at').val('');
                        sbiAfterUpdateToken(savedToken,false);
                    } else {
                        $('.sbi_manually_connect_wrap').show().prepend('<div class="sbi_user_id_error" style="display:block;">'+data+'</div>');
                    }

                }
            });
        }

    });

    //clear backup caches
    jQuery('#sbi_clear_backups').click(function(event) {
        jQuery('.sbi-success').remove();
        event.preventDefault();
        jQuery.ajax({
            url: sbiA.ajax_url,
            type: 'post',
            data: {
                action: 'sbi_clear_backups',
                access_token: token,
                just_tokens: true
            },
            success: function (data) {
                jQuery('#sbi_clear_backups').after('<span class="sbi-success"><i class="fa fa-check-circle"></i></span>');
            }
        });
    });
	
	//Tooltips
	jQuery('#sbi_admin .sbi_tooltip_link').click(function(){
		jQuery(this).siblings('.sbi_tooltip').slideToggle();
	});

	//Shortcode labels
	jQuery('#sbi_admin label').click(function(){
    var $sbi_shortcode = jQuery(this).siblings('.sbi_shortcode');
    if($sbi_shortcode.is(':visible')){
      jQuery(this).siblings('.sbi_shortcode').css('display','none');
    } else {
      jQuery(this).siblings('.sbi_shortcode').css('display','block');
    }  
  });
  jQuery('#sbi_admin label').hover(function(){
    if( jQuery(this).siblings('.sbi_shortcode').length > 0 ){
      jQuery(this).attr('title', 'Click for shortcode option').append('<code class="sbi_shortcode_symbol">[]</code>');
    }
  }, function(){
    jQuery(this).find('.sbi_shortcode_symbol').remove();
  });


  jQuery('#sbi_admin .sbi_lock').hover(function(){
    jQuery(this).siblings('.sbi_pro_tooltip').show();
  }, function(){
    jQuery('.sbi_pro_tooltip').hide();
  });

  


  //Add the color picker
	if( jQuery('.sbi_colorpick').length > 0 ) jQuery('.sbi_colorpick').wpColorPicker();

	//Check User ID is numeric
	jQuery("#sb_instagram_user_id").change(function() {

		var sbi_user_id = jQuery('#sb_instagram_user_id').val(),
			$sbi_user_id_error = $(this).closest('td').find('.sbi_user_id_error'),
			$sbi_other_user_error = $(this).closest('td').find('.sbi_other_user_error');

		if (sbi_user_id.match(/[^0-9, _.-]/)) {
  			$sbi_user_id_error.fadeIn();
  		} else {
  			$sbi_user_id_error.fadeOut();
  		}

  		//Check whether an ID from another account is being used
  		sbi_check_other_user_id(sbi_user_id, $sbi_other_user_error);

	});
	function sbi_check_other_user_id(sbi_user_id, $sbi_other_user_error){
		if (jQuery('#sb_instagram_at').length && jQuery('#sb_instagram_at').val() !== '' && sbi_user_id.length) {
            if(jQuery('#sb_instagram_at').val().indexOf(sbi_user_id) == -1 ){
                $sbi_other_user_error.fadeIn();
            } else {
                $sbi_other_user_error.fadeOut();
            }
		}
	}
	//Check initially when settings load
	sbi_check_other_user_id( jQuery('#sb_instagram_user_id').val(), $('td').find('.sbi_other_user_error') );

	//Mobile width
	var sb_instagram_feed_width = jQuery('#sbi_admin #sb_instagram_width').val(),
			sb_instagram_width_unit = jQuery('#sbi_admin #sb_instagram_width_unit').val(),
			$sb_instagram_width_options = jQuery('#sbi_admin #sb_instagram_width_options');

	if (typeof sb_instagram_feed_width !== 'undefined') {

		//Show initially if a width is set
		if( (sb_instagram_feed_width.length > 1 && sb_instagram_width_unit == 'px') || (sb_instagram_feed_width !== '100' && sb_instagram_width_unit == '%') ) $sb_instagram_width_options.show();

		jQuery('#sbi_admin #sb_instagram_width, #sbi_admin #sb_instagram_width_unit').change(function(){
			sb_instagram_feed_width = jQuery('#sbi_admin #sb_instagram_width').val();
			sb_instagram_width_unit = jQuery('#sbi_admin #sb_instagram_width_unit').val();

			if( sb_instagram_feed_width.length < 2 || (sb_instagram_feed_width == '100' && sb_instagram_width_unit == '%') ) {
				$sb_instagram_width_options.slideUp();			
			} else {
				$sb_instagram_width_options.slideDown();
			}
		});

	}

	//Scroll to hash for quick links
  jQuery('#sbi_admin a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : this.hash.slice(1);
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });

	//Support tab show video
	jQuery('#sbi-play-support-video').on('click', function(e){
		e.preventDefault();
		jQuery('#sbi-support-video').show().attr('src', jQuery('#sbi-support-video').attr('src')+'&amp;autoplay=1' );
	});

	jQuery('#sbi_admin .sbi-show-pro').on('click', function(){
		jQuery(this).parent().next('.sbi-pro-options').toggle();
	});

	/* Pro 3.0 JS */
    function sbiUpdateLayoutTypeOptionsDisplay() {
        setTimeout(function(){
            jQuery('.sb_instagram_layout_settings').hide();
            jQuery('.sb_instagram_layout_settings.sbi_layout_type_'+jQuery('.sb_layout_type:checked').val()).show();
        }, 1);
    }
    jQuery('.sb_layout_type').change(sbiUpdateLayoutTypeOptionsDisplay);

    jQuery('.sbi_close_options').on('click', function(){
        jQuery('.sb_instagram_layout_settings').hide();
    });

    function sbiUpdateHighlightOptionsDisplay() {
        jQuery('.sb_instagram_highlight_sub_options').hide();
        var selected = jQuery('#sb_instagram_highlight_type').val();

        if (selected === 'pattern') {
            jQuery('.sb_instagram_highlight_pattern').show();
        } else if (selected === 'id') {
            jQuery('.sb_instagram_highlight_ids').show();
        } else {
            jQuery('.sb_instagram_highlight_hashtag').show();
        }

    }
    sbiUpdateHighlightOptionsDisplay();
    jQuery('#sb_instagram_highlight_type').change(sbiUpdateHighlightOptionsDisplay);

    //Open/close the expandable option sections
    jQuery('.sbi-expandable-options').hide();
    jQuery('.sbi-expand-button a').on('click', function(e){
        e.preventDefault();
        var $self = jQuery(this);
        $self.parent().next('.sbi-expandable-options').toggle();
        if( $self.text().indexOf('Show') !== -1 ){
            $self.text( $self.text().replace('Show', 'Hide') );
        } else {
            $self.text( $self.text().replace('Hide', 'Show') );
        }
    });

    //Selecting a post layout
    jQuery('.sbi_layout_cell').click(function(){
        var $self = jQuery(this);
        $('.sb_layout_type').trigger('change');
        $self.addClass('sbi_layout_selected').find('.sb_layout_type').attr('checked', 'checked');
        $self.siblings().removeClass('sbi_layout_selected');
    });

});