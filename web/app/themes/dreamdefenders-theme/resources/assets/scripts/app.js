import domReady from '@wordpress/dom-ready'
import anime    from 'animejs/lib/anime.es.js'
import isEmpty  from 'lodash/isempty'

domReady(() => {
  /**
   * Dream Defenders animation definitions
   */
  const easing = `cubicBezier(.5, .05, .1, .3)`

  /**
   * Util
   */
  const disableScrollEvent = () => window.scrollTo(0, 0)
  const disableScroll      = () => window.addEventListener(`scroll`, disableScrollEvent)
  const enableScroll       = () => window.removeEventListener(`scroll`, disableScrollEvent)

  /**
   * Selectors
   */
  const targets = {
    navOverlay: document.querySelector(`.nav-overlay`),
    navToggle:  document.querySelector(`.nav-toggle`),
    navDisable: document.querySelector(`.nav-disable`),
    organize:   document.querySelectorAll(`.bg-organize`),
    organizeContainer: document.querySelectorAll(`.bg-organize-container`),
  }

  /**
   * Navigation
   */
  const navAvailable = () => targets.navToggle && targets.navOverlay
  const toggleNav = () => {
    targets.navOverlay.classList.toggle(`hidden`)
    targets.navOverlay.classList.toggle(`block`)
  }

  navAvailable() && (() => {
    /**
     * Enable overlay
     */
    targets.navToggle.addEventListener(`click`, () => {
      disableScroll()

      anime({
        targets: targets.navOverlay,
        height: [`0vh`, `100vh`],
        opacity: [0, 100],
        duration: 200,
        easing,
        begin: toggleNav,
      })
    })

    /**
     * Disable overlay
     */
    targets.navDisable.addEventListener(`click`, () => {
      enableScroll()

      anime({
        targets: targets.navOverlay,
        height: [`100vh`, `0vh`],
        opacity: [100, 0],
        duration: 300,
        easing,
        complete: toggleNav,
      })
    })
  })()

  /**
   * ORGANIZE text background
   */
  targets.organize
    && targets.organize.forEach(target => {
      anime({
        targets:  target,
        opacity:  [0, 100],
        duration: 50000,
        maxWidth: [`100%`, `100%`],
        easing,
      })
    })
})
