// BEGIN SMARTSCROLL (unless menu or search open)
var didScroll;
var lastScrollTop = 0;
var delta = 50;
var navbarHeight = jQuery('.taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper, .taptap-header').outerHeight();

jQuery(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 50);

function hasScrolled() {
    if(jQuery('.taptap-background-color').hasClass('taptap-background-color-active') || jQuery('.taptap-search-wrapper').hasClass('taptap-search-wrapper-active') ) { } else {        
        var st = jQuery(this).scrollTop();
        
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            jQuery('.taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper, .taptap-header').addClass('taptap-smart-header-hide');
        } else {
            // Scroll Up
            if(st + jQuery(window).height() < jQuery(document).height()) {
                jQuery('.taptap-menu-button-wrapper, .taptap-search-button-wrapper, .taptap-logo-wrapper, .taptap-header').removeClass('taptap-smart-header-hide');
            }
        }
        
        lastScrollTop = st;
    }
}
// END SMARTSCROLL (unless menu or search open)