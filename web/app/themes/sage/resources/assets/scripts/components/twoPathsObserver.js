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

  const animate = (targets, width) => {
    targets.classList.add(`is-animating`)

    anime({ targets, width, ...animeOptions })
  }

  const observer = new IntersectionObserver(els => {
    els.forEach(({ target, intersectionRatio }) => {
      intersectionRatio > 0 && animate(target, `100%`)
    })
  }, observerOptions)

  const target = document.querySelector(`.two-paths-left`)
  target && hasNotFired(target) && observer.observe(target)
}
