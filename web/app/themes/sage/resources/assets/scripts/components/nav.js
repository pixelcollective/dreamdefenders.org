import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from '@util'

/**
 * Navbar scroll animation
 */
const navBarScrollInteractives = ({ nav }) => {
  const animateHeadroom = ({ backgroundColor, translateY }) => {
    anime({
      targets: nav,
      backgroundColor,
      translateY,
      duration: 400,
      easing: `easeInQuart`,
      transformOrigin: `top`,
    })
  }

  const onPin = () => {
    animateHeadroom({
      backgroundColor: `rgba(0, 0, 0, 0.8)`,
      translateY: `0px`,
    })
  }

  const onUnpin = () => {
    animateHeadroom({
      backgroundColor: `rgba(0, 0, 0, 0.1)`,
      translateY: `-${nav.offsetHeight}px`,
    })
  }

  (new Headroom(nav, {
    offset: nav.offsetHeight,
    tolerance: 5,
    onPin,
    onUnpin,
  })).init()
}

/**
 * Navigation overlay
 */
const navOverlay = ({ navOverlay, navToggle, navDisable }, easing) => {
  const overlayReady = () => {
    return navToggle && navOverlay
  }

  const toggleNav = ({ classList }) => {
    classList.toggle(`hidden`)
    classList.toggle(`block`)
  }

  /**
   * Navigation overaly
   */
  overlayReady() && (() => {
    navToggle.addEventListener(`click`, () => {
      disableScroll()

      anime({
        targets: navOverlay,
        height: [`0vh`, `100vh`],
        opacity: [0, 100],
        duration: 200,
        position: `relative`,
        easing,
        begin: toggleNav(navOverlay),
      })
    })

    navDisable.addEventListener(`click`, () => {
      enableScroll()

      anime({
        targets: navOverlay,
        height: [`100vh`, `0vh`],
        opacity: [100, 0],
        duration: 300,
        position: `fixed`,
        easing,
        complete: toggleNav(navOverlay),
      })
    })
  })()
}

export default ({ easing }) => {
  const { sage } = window

  const targets = {
    nav:          document.querySelector(`nav.nav`),
    navOverlay:   document.querySelector(`.nav-overlay`),
    navToggle:    document.querySelector(`.nav-toggle`),
    navDisable:   document.querySelector(`.nav-disable`),
    navLogo:      document.querySelector(`.nav-logo`),
    navSocial:    document.querySelectorAll(`.nav-social-icon > svg`),
  }

  targets.nav.style.backgroundColor = `rgba(${
    sage.isFrontPage ? `0,0,0,0.8` : `255,255,255,1`
  })`

  navBarScrollInteractives(targets)
  navOverlay(targets, easing)
}
