import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from '@util'

/**
 * Animation: scale and translate
 *
 * @param obj { el, scale, { x, y } }
 */
const popOff = ({ target, scale, translate }) => {
  anime({
    targets: target,
    scale: scale,
    translateX: translate.x,
    translateY: translate.y,
    loop: false,
    duration: 800,
  })
}

/**
 * Logo hover
 */
const hoverPop = hoverPopTargets => {
  hoverPopTargets.map(target => {
    target.addEventListener(`mouseenter`, () => {
      const scale = 1.1
      const translate = { x: '0px', y: '-3px' }

      popOff({target, scale, translate})
    }, false)

    target.addEventListener(`mouseleave`, () => {
      const scale = 1
      const translate = { x: '0px', y: '0px' }

      popOff({target, scale, translate})
    }, false)
  })
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
      backgroundColor: `rgba(${
        sage.isFrontPage ? `0,0,0,0` : `255,255,255,1`
      })`,
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
      translateY: `-${nav.offsetHeight}px`,
    })
  }

  (new Headroom(nav, {
    offset: nav.offsetHeight,
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
  const { sage } = window

  const targets = {
    nav:        document.querySelector(`nav.nav`),
    navOverlay: document.querySelector(`.nav-overlay`),
    navToggle:  document.querySelector(`.nav-toggle`),
    navDisable: document.querySelector(`.nav-disable`),
    navLogo:    document.querySelector(`.nav-logo`),
    navSocial:  document.querySelectorAll(`.nav-social-icon > svg`),
    hoverScaleUp: document.querySelectorAll(`.hover-scale-up`),
  }

  targets.nav.style.backgroundColor = `rgba(${
    sage.isFrontPage ? `0,0,0,0` : `255,255,255,1`
  })`

  hoverPop([targets.navLogo, ...targets.navSocial, ...targets.hoverScaleUp])
  navBarScrollInteractives(targets)
  navOverlay(targets, easing)
}
