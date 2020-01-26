import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from '@util'

/**
 * Site navigation
 */
export default () => {
  const { sage } = window

  const nav     = document.querySelector(`nav.nav`)
  const toggle  = document.querySelector(`[nav-toggle]`)
  const overlay = document.querySelector(`.${toggle.getAttribute(`toggle-target`)}`)

  nav.style.backgroundColor = `rgba(${
    sage.isFrontPage ? `0,0,0,0.8` : `255,255,255,1`
  })`

  overlay.style.height = 0
  overlay.style.opacity = 0

  toggle.addEventListener(`click`, () => {
    toggleAction(sage, nav, toggle, overlay)
  })

  scroll(nav)
}

/**
 * Toggle overlay menu
 */
const toggleAction = (sage, nav, toggle, overlay) => {
  const toggled = ! isToggled(toggle)

  setToggle(toggle)

  toggled ? disableScroll() : enableScroll()
  toggled ? setIcon('close') : setIcon('open')

  anime({
    targets:  overlay,
    height:   toggled ? [`0`, `100vh`] : [`100vh`, `0`],
    opacity:  toggled ? [0, 100] : [100, 0],
    duration: 300,
    elasticity: 0,
    easing: `easeInOutSine`,
  })

  anime({
    targets:  nav,
    backgroundColor: toggled
      ? [`rgba(0,0,0,1)`]
      : sage.isFrontPage ? [`rgba(0,0,0,0.8)`] : [`rgba(255,255,255,1)`],
    duration: 400,
    easing: `easeInOutSine`,
  })
}

/**
 * Set toggle state
 */
const setToggle = target => {
  const newState = isToggled(target) ? "off" : "on"

  return target.setAttribute(`nav-toggle`, newState)
}

/**
 * Return true if overlay is toggled
 */
const isToggled = target => {
  return target.getAttribute(`nav-toggle`) == "on";
}

/**
 * Animate overlay toggle icon
 */
const setIcon = state => {
  const icons = document.querySelectorAll(`.menu-icon`)
  const newIcon = document.querySelector(`.menu-icon-${state}`)

  anime({
    targets: icons,
    height: 0,
    width: 0,
    opacity: [1, 0.5],
    rotate: '-180deg',
  })

  anime({
    targets: newIcon,
    height: '26',
    width: '26',
    rotate: '-0deg',
    opacity: [0, 1],
  })
}

/**
 * Navbar scroll animation
 */
const scroll = nav => {
  const animateHeadroom = (params) => {
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
