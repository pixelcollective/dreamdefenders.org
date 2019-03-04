// BEGIN SHOW SEARCH FORM
jQuery('.taptap-search-button-wrapper, .taptap-search-button-wrapper-right').on('click', function(e) {
'use strict';
	e.preventDefault();
		if(jQuery('.taptap-search-wrapper').hasClass('taptap-search-wrapper-active'))
		{
			/* show header + menu/search buttons + logo */
            jQuery('.taptap-header, .taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper').removeClass('taptap-hide-header-elements');
            /* hide search field */
			jQuery('.taptap-search-wrapper, .taptap-search-background').removeClass('taptap-search-wrapper-active');
            /* hide search overlay */
            jQuery('.taptap-search-overlay').removeClass('taptap-search-overlay-active');
			/* un-focus search field */
            jQuery('input.taptap-search-field:').blur();
		} else {
            /* hide header + menu/search buttons + logo */
            jQuery('.taptap-header, .taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper').addClass('taptap-hide-header-elements');
			/* show search field */
			setTimeout(function(){
				jQuery('.taptap-search-wrapper, .taptap-search-background').addClass('taptap-search-wrapper-active');
			},100);
            /* show search overlay */
            jQuery('.taptap-search-overlay').addClass('taptap-search-overlay-active');
			/* focus search field */
			jQuery('input.taptap-search-field').focus();
		}
});
// END SHOW SEARCH FORM

// BEGIN CLOSE SEARCH FORM
jQuery('.taptap-search-close-wrapper, .taptap-search-overlay').on('click', function(e) {
'use strict';
	e.preventDefault();
        /* show header + menu/search buttons + logo */
        jQuery('.taptap-header, .taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper').removeClass('taptap-hide-header-elements');    
		/* hide search field */
		jQuery('.taptap-search-wrapper, .taptap-search-background').removeClass('taptap-search-wrapper-active');
        /* hide search overlay */
        jQuery('.taptap-search-overlay').removeClass('taptap-search-overlay-active');
        /* un-focus search field */
		jQuery('input.taptap-search-field').blur();
});
// END CLOSE SEARCH FORM

// BEGIN CLEAR SEARCH FIELD
jQuery(".taptap-search-clear-wrapper").on('click', function(e) {
'use strict';
    jQuery('input.taptap-search-field').val('').focus();
});
// END CLEAR SEARCH FIELD

// BEGIN REMOVE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED
jQuery(document).ready(function() {
'use strict';
	jQuery('.taptap-menu-item-description:empty').remove();
});
// END REMOVE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED