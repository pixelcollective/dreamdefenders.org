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
   * Organize component
   */
  const organize  = document.querySelectorAll(`.bg-organize`)
  const container = document.querySelectorAll(`.bg-organize-container`)

  organize && organize.forEach(target => {
      anime({
        targets:  target,
        opacity:  [0, 100],
        duration: 50000,
        maxWidth: [`100%`, `100%`],
        easing: config.easing,
      })
    })

  /**
   * Instagrams
   */
  const grams = document.querySelectorAll(`a[data-grow]`)

  grams && grams.forEach(gram => {
    const img = gram.querySelector(`
      img[gram="${gram.getAttribute(`data-grow`)}"]
    `)

    gram.style.backgroundColor = `rgba(0, 0, 0, 1)`
    img.scaleX = 1
    img.scaleY = 1

    gram.addEventListener(`mouseover`, () => {
      anime({
        targets: img,
        easing: config.easing,
        loop: false,
        backgroundColor: [gram.style.backgroundColor, `rgba(1, 1, 1, 1)`],
        duration: 200,
        scaleX: [img.scaleX, 0.9],
        scaleY: [img.scaleY, 0.9],
      })
    })

    gram.addEventListener(`mouseleave`, () => {
      anime({
        targets: img,
        easing: config.easing,
        loop: false,
        backgroundColor: [gram.style.backgroundColor, `rgba(0, 0, 0, 1)`],
        duration: 200,
        scaleX: [img.scaleX, 1],
        scaleY: [img.scaleY, 1],
      })
    })
  })
})
