import domReady from '@wordpress/dom-ready'
import {
  instagram,
  nav,
  fadeObserver,
  twoPathsObserver,
}  from '@components'

domReady(() => {
  const config = {
    easing: `cubicBezier(.5, .05, .1, .3)`,
  }

  /**
   * 👀 Observers
   */
  twoPathsObserver()

  fadeObserver({
    targets: document.querySelectorAll(`[data-faded]`),
    duration: 1000,
    delay: 0,
    rootMargin: (() => {
      const offset = 50

      const nav = document.querySelector(`nav.nav`)

      const calculateOffset = () => nav
        ? nav.scrollHeight + offset
        : offset

      const navPinned = () => nav && (
        nav.classList.contains(`headroom--pinned`)
        || nav.classList.contains(`headroom--top`)
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
