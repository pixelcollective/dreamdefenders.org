import anime from 'animejs'

/**
 * "Two paths" front page section animation
 */
export default () => {
  const observerOptions = {
    rootMargin: `-40% 0px -40% 0px`,
  }

  const animeOptions = {
    easing: `easeInOutSine`,
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
    const cross = document.querySelector(`.exOut`)
    const badThings = document.querySelector(`.two-paths-left`)
    const badText = document.querySelector(`.two-paths-left h2`)
    const dividerOr = document.querySelector(`.divider-or`)
    const riseBg = document.querySelector(`.two-paths-right .we-rise-bg-container`)
    const riseImage = document.querySelector(`.two-paths-right .we-rise-bg-container .we-rise-bg`)
    const riseText = document.querySelector(`.two-paths-right h2`)

    const minHeight = badThings && badThings.clientHeight;

    els.forEach(({ target, intersectionRatio }) => {
      intersectionRatio > 0 && (() => {
        cross && animate(cross, {
          width: `100%`,
        })

        badThings && animate(badThings, {
          width: `0em`,
          opacity: 0,
          height: 0,
        })

        badText && animate(badText, {
          opacity: 0,
          duration: 1000,
        })

        dividerOr && animate(dividerOr, {
          opacity: 0,
          height: 0,
          rotateX: `280deg`,
          rotateZ: `180deg`,
          duration: 300,
        })

        target && (() => {
          animate(target, {
            width: `100vw`,
            height: minHeight,
          })
        })()

        /**
         * Rise background
         */
        riseBg && (() => {
          animate(riseBg, {
            opacity: 1,
            duration: 1000,
          })
        })()

        /**
         * Rise background image
         */
        riseImage && (() => {
          animate(riseImage, {
            opacity: 1,
            duration: 6000,
            width: `100vw`,
            height: minHeight,
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

  target && hasNotFired(target) && observer.observe(target)

  const rise = document.querySelector(`.two-paths-right`)
  const riseHighlight = document.querySelector(`.two-paths-right .rise-highlight`)
  const riseText = document.querySelector(`.two-paths-right h2`)

  rise.addEventListener(`mouseover`, () => {
    anime({
      targets: [riseText],
      left: `1rem`,
      easing: `easeInOutSine`,
      duration: 800,
    })

    anime({
      targets: [riseHighlight],
      color: `rgba(253, 225, 53, 1)`,
      duration: 800,
      easing: `easeInOutSine`,
    })
  })

  rise.addEventListener(`mouseout`, () => {
    anime({
      targets: [riseText],
      left: `0rem`,
      easing: `easeInOutSine`,
      duration: 800,
    })

    anime({
      targets: [riseHighlight],
      color: `rgba(0, 0, 0, 1)`,
      duration: 800,
      easing: `easeInOutSine`,
    })
  })
}
