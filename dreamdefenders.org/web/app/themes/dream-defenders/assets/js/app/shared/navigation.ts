import * as jQuery from 'jquery';

export function navigation() {
  const hamburger           = jQuery('.hamburger');
  const navMenu             = jQuery('#navigation ul');
  const headerHeight:number = jQuery('header').outerHeight(); // px
  const menuItem            = jQuery('.menu-item-has-children').children('a, .sub-menu');
  const menuRow             = jQuery('.menu-item-has-children');

  let lastScrollTop:number  = 0;  // px
  let triggerPoint:number   = 0; // px
  let didScroll:boolean;
 
  hamburger.click(function () {
    let navIsDown:boolean = jQuery('header').hasClass('nav-down');
    let hamburgerOpen:boolean = jQuery('.hamburger').hasClass('is-active');
    var notAtTop = (jQuery(window).scrollTop() > triggerPoint);

    menuItem.hover(function () {
      menuRow.addClass('mobile-sub');
    }, function() {
      menuRow.removeClass('mobile-sub');
    });

    // if (navIsDown) {
    //   jQuery('header').removeClass('nav-down');
    // }
    // if (hamburgerOpen && notAtTop) {
    //   jQuery('header').addClass('nav-down');
    // }

    jQuery(this).toggleClass("is-active");
    navMenu.toggleClass("is-active");
  });


  // ---- Hide Header on on scroll down ---- // 
  jQuery(window).scroll(function (event) {
    didScroll = true;
  });

  // debounce scroll event handler
  setInterval(function() {
    if (didScroll) {
      scrollHandler();
      didScroll = false;
    }
  }, 250);
  
  function scrollHandler() {
    var windowTop = jQuery(window).scrollTop();
    
    // wait until user scrolls past delta
    if (Math.abs(lastScrollTop - windowTop) <= triggerPoint)
      return; // do nothing

    // add .nav-up when scrolling past header
    if (windowTop > lastScrollTop && windowTop > headerHeight) {
      // Scroll Down
      jQuery('header').removeClass('nav-down').addClass('nav-up');
    } 
    // else {
      // Scroll Up
      // if (windowTop + jQuery(window).height() < jQuery(document).height()) {
      //   jQuery('header').removeClass('nav-up').addClass('nav-down');
      // }
    // }

    lastScrollTop = windowTop;

    // !windowTop == 0, evaluates false
    if(!windowTop) {
      jQuery('header').removeClass('nav-up');
    }
  }

  menuItem.hover(function () {
    jQuery(this).siblings('ul').addClass('show');
  }, function() {
    jQuery(this).siblings('ul').removeClass('show');
  });

  menuItem.siblings('ul').hover(function () {
    jQuery(this).addClass('show');
  }, function() {
    jQuery(this).removeClass('show');
  });
}
