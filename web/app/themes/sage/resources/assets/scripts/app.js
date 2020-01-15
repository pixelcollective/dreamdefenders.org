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
  nav(config);

  /**
   * Organize component
   */
  (() => {
    const organize  = document.querySelectorAll(`.bg-organize`)

    organize && organize.forEach(target => {
      anime({
        targets:  target,
        opacity:  [0, 100],
        duration: 50000,
        maxWidth: [`100%`, `100%`],
        easing: config.easing,
      })
    })
  })();

  /**
   * Instagrams
   */
  (() => {
    const grams = document.querySelectorAll(`a[data-grow]`)

    grams && grams.forEach(gram => {
      const defaultOverlay = `rgba(0, 0, 0, 0.3)`
      gram.querySelector(`div.overlay`).style.backgroundColor = defaultOverlay

      const hoverScale = (scale, overlayColor) => {
        anime({
          targets: gram.querySelector(`img`),
          easing: config.easing,
          loop: false,
          duration: 200,
          scaleX: scale,
          scaleY: scale,
        })

        anime({
          targets: gram.querySelector(`div.overlay`),
          easing: config.easing,
          loop: false,
          duration: 200,
          backgroundColor: overlayColor,
        })
      }

      const bgFade = color => {
        anime({
          targets: gram,
          easing: config.easing,
          loop: false,
          backgroundColor: color,
          duration: 300,
        })
      }

      const hoverOn = () => {
        hoverScale(0.9, `rgba(0, 0, 0, 0)`)
        bgFade(`rgb(255, 255, 255)`)
      }

      const hoverOff = () => {
        hoverScale(1, defaultOverlay)
        bgFade(`rgb(0, 0, 0)`)
      }

      gram.addEventListener(`mouseenter`, hoverOn, false)
      gram.addEventListener(`mouseleave`, hoverOff, false)
    })
  })();
})
