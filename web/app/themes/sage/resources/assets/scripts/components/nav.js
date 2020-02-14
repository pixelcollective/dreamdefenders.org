import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from '@util'

/**
 * Site navigation
 */
export default () => {
  const { sage }  = window,
        navEl     = document.querySelector(`nav.nav`),
        toggleEl  = document.querySelector(`[nav-toggle]`),
        overlayEl = document.querySelector(`.${toggleEl.getAttribute(`toggle-target`)}`)

  navEl.style.backgroundColor = `rgba(${ sage.isPage
    ? `0,0,0,0`
    : `255,255,255,1`
  })`

  overlayEl.style.height = 0;
  overlayEl.style.opacity = 0;

  toggleEl.addEventListener(`click`, () => {
    toggleAction(sage, navEl, toggleEl, overlayEl)
  })

  scroll(navEl)
}

/**
 * Set toggle state
 */
const setToggle = target =>
  target.setAttribute(`nav-toggle`, isToggled(target) ? `off` : `on`)

/**
 * Return true if overlay is toggled
 */
const isToggled = target =>
  target.getAttribute(`nav-toggle`) == `on`

/**
 * Toggle overlay menu
 */
const toggleAction = (sage, navEl, toggleEl, overlayEl) => {
  setToggle(toggleEl)

  const toggled = isToggled(toggleEl)

  toggled ? disableScroll() : enableScroll()
  toggled ? setIcon('close') : setIcon('open')

  anime({
    targets:  overlayEl,
    height:   toggled ? [`0`, `100vh`] : [`100vh`, `0`],
    opacity:  toggled ? [0, 100] : [100, 0],
    duration: 300,
    elasticity: 0,
    easing: `easeInOutSine`,
  })

  anime({
    targets:  navEl,
    backgroundColor: [
      toggled ? `rgba(0,0,0,1)`
        : sage.isPage ? `rgba(0,0,0,0)`
          : `rgba(255,255,255,1)`,
    ],
    duration: 400,
    easing: `easeInOutSine`,
    elasticity: 0,
  })
}

/**
 * Animate overlay toggle icon
 */
const setIcon = state => {
  const icons   = document.querySelectorAll(`.menu-icon`),
        newIcon = document.querySelector(`.menu-icon-${state}`)

  anime({
    targets: icons,
    height: 0,
    width: 0,
    opacity: [1, 0.5],
    rotate: '-180deg',
    easing: `easeInOutSine`,
    duration: 300,
    elasticity: 0,
  })

  anime({
    targets: newIcon,
    height: '26',
    width: '26',
    rotate: '-0deg',
    opacity: [0, 1],
    easing: `easeInOutSine`,
    duration: 300,
    elasticity: 0,
  })
}

/**
 * Navbar scroll animation
 */
const scroll = nav => {
  const animateHeadroom = params => {
    anime({
      targets: nav,
      duration: 400,
      easing: `easeInQuart`,
      transformOrigin: `top`,
      ...params,
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
