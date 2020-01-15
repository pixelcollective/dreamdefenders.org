import anime from 'animejs'

/**
 * Instagrams module animations
 */
export default config => {
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
}
