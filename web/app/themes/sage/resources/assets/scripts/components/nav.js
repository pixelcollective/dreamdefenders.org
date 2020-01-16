/**
 * Navigation
 */
import anime from 'animejs'
import Headroom from 'headroom.js'
import { disableScroll, enableScroll } from '@util'

const targets = {
  navOverlay: document.querySelector(`.nav-overlay`),
  nav:        document.querySelector(`nav.nav`),
  navToggle:  document.querySelector(`.nav-toggle`),
  navDisable: document.querySelector(`.nav-disable`),
  navLogo:    document.querySelector(`.nav-logo`),
}

const overlayReady = () => {
  return targets.navToggle && targets.navOverlay
}

/**
 * Logo hover
 */
const hoverScale = (scale, translate) => {
  anime({
    targets: targets.navLogo,
    loop: false,
    duration: 800,
    scaleX: scale,
    scaleY: scale,
    translateX: translate.x,
    translateY: translate.y,
  })
}

const hoverOn = () => {
  hoverScale(1.1, { x: 0, y: `-3px` })
}

const hoverOff = () => {
  hoverScale(1, { x: 0, y: 0 })
}

targets.navLogo.addEventListener(`mouseenter`, hoverOn, false)
targets.navLogo.addEventListener(`mouseleave`, hoverOff, false)

/**
 * Navbar scroll animation
 */
const animateHeadroom = ({backgroundColor, translateY}) => {
  anime({
    targets: targets.nav,
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

(new Headroom(targets.nav, {
  offset: 87,
  tolerance: 5,
  onTop,
  onPin,
  onUnpin,
})).init()

const toggleNav = () => {
  targets.navOverlay.classList.toggle(`hidden`)
  targets.navOverlay.classList.toggle(`block`)
}

export default ({ easing }) => {
  overlayReady() && (() => {
    /** Disable overlay */
    targets.navToggle.addEventListener(`click`, () => {
      disableScroll()

      anime({
        targets: targets.navOverlay,
        height: [`0vh`, `100vh`],
        opacity: [0, 100],
        duration: 200,
        position: `relative`,
        easing,
        begin: toggleNav,
      })
    })

    /** Enable overlay */
    targets.navDisable.addEventListener(`click`, () => {
      enableScroll()

      anime({
        targets: targets.navOverlay,
        height: [`100vh`, `0vh`],
        opacity: [100, 0],
        duration: 300,
        position: `fixed`,
        easing,
        complete: toggleNav,
      })
    })
  })()
}
