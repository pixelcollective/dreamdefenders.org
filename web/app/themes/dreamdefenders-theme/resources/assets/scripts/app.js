import domReady from '@wordpress/dom-ready'
import anime    from 'animejs/lib/anime.es.js'
import { nav }  from '@components'

domReady(() => {
  /**
   * Anime definitions
   */
  const config = {
    easing: `cubicBezier(.5, .05, .1, .3)`,
  }

  /**
   * Handle nav
   */
  nav(config)

  /**
   * Selectors
   */
  const targets = {
    organize:   document.querySelectorAll(`.bg-organize`),
    organizeContainer: document.querySelectorAll(`.bg-organize-container`),
  }

  /**
   * Organize section
   */
  targets.organize
    && targets.organize.forEach(target => {
      anime({
        targets:  target,
        opacity:  [0, 100],
        duration: 50000,
        maxWidth: [`100%`, `100%`],
        easing: config.easing,
      })
    })
})
