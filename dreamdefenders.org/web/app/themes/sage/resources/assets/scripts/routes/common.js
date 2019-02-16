export default {
  init() {

    const hamburger    = jQuery('.hamburger')
    const navMenu      = jQuery('#navigation ul')
    const headerHeight = jQuery('.site-header').outerHeight()
    const menuItem     = jQuery('.menu-item-has-children').children('a, .sub-menu')
    const menuRow      = jQuery('.menu-item-has-children')

    let lastScrollTop = 0
    let triggerPoint = 0
    let didScroll

    (hamburger)
    ? (hamburger.click(() => {

        jQuery('.site-header').hasClass('nav-down')
        jQuery('.hamburger').hasClass('is-active')
        didScroll = (jQuery(window).scrollTop() > triggerPoint)

        jQuery(menuItem).hover(() => {
          menuRow.addClass('mobile-sub')
          this.siblings('ul').addClass('show')
        }, () => {
          menuRow.removeClass('mobile-sub')
          this.siblings('ul').removeClass('show')
        })

        jQuery(this).toggleClass('is-active')
        navMenu.toggleClass('is-active')

        jQuery(window).scroll(() => {
          didScroll = true
        })

        setInterval(() => {
          if (didScroll) {
            scrollHandler()
            didScroll = false
          }},250)
        })

    ) : (null)


    jQuery(window).scroll(() => {
      didScroll = true
    })

    setInterval(function() {
      if (didScroll) {
        scrollHandler()
        didScroll = false
      }
    }, 250)

    function scrollHandler() {
      var windowTop = jQuery(window).scrollTop()

      if (Math.abs(lastScrollTop - windowTop) <= triggerPoint)
        return

      if (windowTop > lastScrollTop && windowTop > headerHeight)
        jQuery('.site-header').removeClass('nav-down').addClass('nav-up')

      lastScrollTop = windowTop

      if(!windowTop)
        jQuery('.site-header').removeClass('nav-up')

    }

    menuItem.hover(function () {
      jQuery(this).siblings('ul').addClass('show')
    }, () => {
      jQuery(this).siblings('ul').removeClass('show')
    })

    menuItem.siblings('ul').hover(() => {
      jQuery(this).addClass('show')
    }, () => {
      jQuery(this).removeClass('show')
    })
  },

  finalize() {
  },
}
