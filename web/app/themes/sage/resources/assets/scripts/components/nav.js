import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from '@util'

/**
* Logo hover
*/
const logoHover = ({ navLogo }) => {
  const hoverScale = (scale, { x, y }) => {
    anime({
      targets: navLogo,
      loop: false,
      duration: 800,
      scaleX: scale,
      scaleY: scale,
      translateX: x,
      translateY: y,
    })
  }

  const hoverOn = () => {
    hoverScale(1.1, {
      x: 0,
      y: `-3px`,
    })
  }

  const hoverOff = () => {
    hoverScale(1, {
      x: 0,
      y: 0,
    })
  }

  navLogo.addEventListener(`mouseenter`, hoverOn, false)
  navLogo.addEventListener(`mouseleave`, hoverOff, false)
}

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

  const onTop = () => {
    animateHeadroom({
      backgroundColor: `rgba(0, 0, 0, 0)`,
      translateY: `0px`,
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
      translateY: `-87px`,
    })
  }

  (new Headroom(nav, {
    offset: 87,
    tolerance: 5,
    onTop,
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
  const targets = {
    nav:        document.querySelector(`nav.nav`),
    navOverlay: document.querySelector(`.nav-overlay`),
    navToggle:  document.querySelector(`.nav-toggle`),
    navDisable: document.querySelector(`.nav-disable`),
    navLogo:    document.querySelector(`.nav-logo`),
  }

  logoHover(targets)

  navBarScrollInteractives(targets)

  navOverlay(targets, easing)
}
