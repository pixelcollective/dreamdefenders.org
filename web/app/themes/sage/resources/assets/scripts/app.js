import domReady from '@wordpress/dom-ready'
import {
  hoverFx,
  instagram,
  nav,
  fadeObserver,
  twoPathsObserver,
}  from '@components'

domReady(() => {
  const config = {
    easing: `cubicBezier(.5, .05, .1, .3)`,
  }

  const targets = {
    faded: document.querySelectorAll(`[data-faded]`),
    nav: document.querySelector(`nav.nav`),
  }

  /**
   * Hover animations
   */
  hoverFx(document.querySelectorAll(`[hoverfx]`))

  /**
   * 👀 Observers
   */
  twoPathsObserver()

  fadeObserver({
    targets: targets.faded,
    duration: 1000,
    delay: 0,
    rootMargin: (() => {
      const offset = 50

      const calculateOffset = () => targets.nav
        ? targets.nav.scrollHeight + offset
        : offset

      const navPinned = () => targets.nav && (
        targets.nav.classList.contains(`headroom--pinned`)
        || targets.nav.classList.contains(`headroom--top`)
      )

      const offsetPinned = `${calculateOffset()}px 0px ${calculateOffset()}px 0px`
      const offsetUnpinned = `${offset}px 0px ${offset}px 0px`

      return navPinned() ? offsetPinned : offsetUnpinned
    })(),
  }).init()

  /**
   * 🧩 Components
   */
  nav(config);
  instagram(config);
})
