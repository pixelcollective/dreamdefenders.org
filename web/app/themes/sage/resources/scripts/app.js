import 'alpinejs'

import hoverFx from '@tinypixelco/hoverfx'
import {nav, fadeObserver, twoPathsObserver} from './components'
import './components/performantMedia'

window.requestAnimationFrame(() => {
  const {sage} = window

  const config = {
    easing: 'cubicBezier(0.5, 0.05, 0.1, 0.3)',
  }

  const targets = {
    faded: document.querySelectorAll('[data-faded]'),
    nav: document.querySelector('.nav'),
  }

  sage.isFrontPage && twoPathsObserver()

  fadeObserver({
    targets: targets.faded,
    duration: 1000,
    delay: 0,
    rootMargin: (() => {
      const offset = 50

      const calculateOffset = () =>
        targets.nav ? targets.nav.scrollHeight + offset : offset

      const isNavPinned = () =>
        targets.nav &&
        (targets.nav.classList.contains(`headroom--pinned`) ||
          targets.nav.classList.contains(`headroom--top`))

      const offsetPinned = `${calculateOffset()}px 0px ${calculateOffset()}px 0px`
      const offsetUnpinned = `${offset}px 0px ${offset}px 0px`

      return isNavPinned() ? offsetPinned : offsetUnpinned
    })(),
  }).init()

  nav(config)
  hoverFx(document.querySelectorAll(`[hoverfx]`))
})
