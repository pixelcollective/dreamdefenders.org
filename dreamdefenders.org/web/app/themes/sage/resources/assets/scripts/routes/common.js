export default {
  init() {
    window.onscroll = () => {
      const nav = document.querySelector('.site-header')
      window.scrollY <= 10 ? nav.className = 'site-header' : nav.className = 'site-header nav-up'
    }
    $('.hamburger').click(() => {
      event.preventDefault();
      $('.nav-primary ul').toggleClass('is-active');
      ($('html').css('overflow') == 'hidden')
        ? $('html').css('overflow', 'scroll')
        : $('html').css('overflow', 'hidden')
    })
  },
  finalize() {},
};
