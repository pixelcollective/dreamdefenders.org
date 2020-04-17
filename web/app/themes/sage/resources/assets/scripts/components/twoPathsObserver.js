import anime from 'animejs'

/**
 * "Two paths" front page section animation
 */
export default () => {
  const observerOptions = {
    rootMargin: `-40% 0px -40% 0px`,
  }

  const animeOptions = {
    easing: `easeInSine`,
    loop: false,
    delay: 2000,
    duration: 1600,
  }

  const hasNotFired = target => {
    return ! target.classList.contains(`is-animating`)
  }

  const animate = (targets, params) => {
    targets.classList.add(`is-animating`)
    anime({ targets, ...animeOptions, ...params })
  }

  const observer = new IntersectionObserver(els => {
    const cross     = document.querySelector(`.exOut`)
    const badThings = document.querySelector(`.two-paths-left`)
    const badText   = document.querySelector(`.two-paths-left h2`)
    const dividerOr = document.querySelector(`.divider-or`)
    const riseOverlay = document.querySelector(`.two-paths-right .we-rise-bg-container`)
    const riseText  = document.querySelector(`.two-paths-right h2`)

    els.forEach(({ target, intersectionRatio }) => {
      intersectionRatio > 0 && (() => {
        cross && animate(cross, {
          width: `100%`,
        })

        badThings && animate(badThings, { width: 0, opacity: 0 })
        badText && animate(badText, { opacity: 0, duration: 1000 })
        dividerOr && animate(dividerOr, {
          opacity: 0,
          height: 0,
          duration: 300,
        })

        target && (() => {
          animate(target, {
            width: `100vw`,
          })
        })()

        /**
         * Rise background image
         */
        riseOverlay && (() => {
          animate(riseOverlay, {
            opacity: [1, 0.1],
            duration: 1400,
            complete: () => {
              const img = riseOverlay.querySelector(`img`)
              animate(img, {
                opacity: [0, 1],
                delay: 2000,
                duration: 1400,
              })
            },
          })
        })()

        /**
         * Rise text
         */
        riseText && (() => animate(riseText, {
          fontSize: `4rem`,
        }))()
      })()
    })
  }, observerOptions)

  const target = document.querySelector(`.two-paths-right`)

  target
    && hasNotFired(target)
    && (() => observer.observe(target))()
}
