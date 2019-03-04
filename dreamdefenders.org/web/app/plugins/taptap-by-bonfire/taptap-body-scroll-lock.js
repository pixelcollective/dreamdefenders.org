/* when menu button, background overlay or custom activator used */
jQuery('.taptap-by-bonfire ul li a, .taptap-menu-button-wrapper, .taptap-background-overlay, .taptap-custom-activator').on('click', function(e) {
	if(jQuery('.taptap-background-color').hasClass('taptap-background-color-active'))
	{

		/* disable browser scroll */
		var current = jQuery(window).scrollTop();
        jQuery(window).scroll(function() {
            jQuery(window).scrollTop(current);
        });

	} else {

		/* enable browser scroll */
		jQuery(window).off('scroll');

	}
});

/* enable when ESC button pressed */
jQuery(document).keyup(function(e) {
	if (e.keyCode == 27) { 

		/* enable browser scroll */
		jQuery(window).off('scroll');

		return false;

	}
});