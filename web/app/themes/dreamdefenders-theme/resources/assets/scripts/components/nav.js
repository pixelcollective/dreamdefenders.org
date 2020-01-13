/**
 * Navigation
 */

import anime from 'animejs'

import {
  enableScroll,
  disableScroll,
} from '@util'

const targets = {
  navOverlay: document.querySelector(`.nav-overlay`),
  navToggle:  document.querySelector(`.nav-toggle`),
  navDisable: document.querySelector(`.nav-disable`),
}

const navAvailable = () => {
  return targets.navToggle && targets.navOverlay
}

const toggleNav = () => {
  targets.navOverlay.classList.toggle(`hidden`)
  targets.navOverlay.classList.toggle(`block`)
}

export default ({ easing }) => {
  navAvailable() && (() => {
    /** Disable overlay */
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

    /** Enable overlay */
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
}