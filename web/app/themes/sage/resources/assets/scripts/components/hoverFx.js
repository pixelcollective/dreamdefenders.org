import anime from 'animejs'

/**
 * Animation
 */
const fx = params => {
  anime({
    targets: params.target,
    scale: params.scale,
    translateX: params.translate.x,
    translateY: params.translate.y,
    backgroundColor: params.backgroundColor,
    color: params.color,
    loop: false,
    duration: 800,
  })
}

/**
 * hoverFx
 */
export default hoverTargets => {
  hoverTargets.forEach(target => {
    target.addEventListener(`mouseenter`, () => {
      const color = target.getAttribute(`on-color`) ? target.getAttribute(`on-color`) : null
      const backgroundColor = target.getAttribute(`on-bg-color`) ? target.getAttribute(`on-bg-color`) : null
      const scale = target.getAttribute(`on-s`) ? target.getAttribute(`on-s`) : 1
      const translate = {
        x: target.getAttribute(`on-t-x`) ? target.getAttribute(`on-t-x`) : 0,
        y: target.getAttribute(`on-t-y`) ? target.getAttribute(`on-t-y`) : 0,
      }

      fx({ target, scale, translate, backgroundColor, color })
    }, false)

    target.addEventListener(`mouseleave`, () => {
      const color = target.getAttribute(`off-color`) ? target.getAttribute(`off-color`) : null
      const backgroundColor = target.getAttribute(`off-bg-color`) ? target.getAttribute(`off-bg-color`) : null
      const scale = target.getAttribute(`off-s`) ? target.getAttribute(`off-s`) : 1
      const translate = {
        x: target.getAttribute(`off-t-x`) ? target.getAttribute(`off-t-x`) : 0,
        y: target.getAttribute(`off-t-y`) ? target.getAttribute(`off-t-y`) : 0,
      }

      fx({ target, scale, translate, backgroundColor, color })
    }, false)
  })
}
