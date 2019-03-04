export default {
  init() {
    window.onscroll = () => {
      const nav = document.querySelector('.site-header')
      window.scrollY <= 10 ? nav.className = 'site-header' : nav.className = 'site-header nav-up'
    }
    /* jQuery('.hamburger').click(() => {
      event.preventDefault();
      jQuery('.nav-primary ul').toggleClass('is-active');
      (jQuery('html').css('overflow') == 'hidden')
        ? jQuery('html').css('overflow', 'scroll')
        : jQuery('html').css('overflow', 'hidden')
    }) */
  },
  finalize() {},
};
