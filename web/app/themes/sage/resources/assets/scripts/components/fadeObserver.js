import anime from 'animejs'

/**
 * Faded
 */
export default ({
  targets,
  rootMargin,
  easing,
  delay,
  duration,
  color,
  opacityFrom,
  opacityTo,
}) => {
  const animate = (targets, opacity) => anime({
    targets,
    opacity,
    color: color ? color : null,
    easing: easing ? easing : `easeInOutSine`,
    duration: duration ? duration : 800,
    loop: false,
    delay: delay ? delay : 0,
    begin:  function() {
      targets.classList.add(`faded-animating`)
    },
    complete: function() {
      targets.classList.remove(`faded-animating`)
    },
  })

  const scrollObserver = new IntersectionObserver(target => {
    target.forEach(({ target, intersectionRatio }) => {
      intersectionRatio > 0
        ? animate(target, opacityTo ? opacityTo : 1)
        : animate(target, opacityFrom ? opacityFrom : 0.1)
    })
  }, { rootMargin })

  /**
   * Init
   */
  return {
    init: () => targets && targets.forEach(el => {
      el.style.opacity = 0.1
      scrollObserver.observe(el)
    }),
  }
}
