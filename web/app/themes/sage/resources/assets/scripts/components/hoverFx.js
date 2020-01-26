import anime from 'animejs'

/**
 * hoverFx
 */
export default els => els.forEach(target => {
  target.addEventListener(`mouseenter`, () => fx(getAttr(target, `on`)), false)
  target.addEventListener(`mouseleave`, () => fx(getAttr(target, `off`)), false)
})

/**
 * Animation
 */
const fx = params => {
  console.log(params)
  anime({
    targets: params.target,
    scale: params.scale,
    translateX: params.translateX,
    translateY: params.translateY,
    backgroundColor: params.backgroundColor,
    color: params.color,
    loop: params.loop,
    duration: params.duration,
    ease: params.easing,
    elasticity: params.elasticity,
  })
}

/**
 * Get single data attr
 */
const getFx = (target, state, attr, defaultVal) => {
  return target.getAttribute(`fx-${attr}`)
    ? target.getAttribute(`fx-${attr}`)
    : target.getAttribute(`fx-${state}-${attr}`)
      ? target.getAttribute(`fx-${state}-${attr}`)
      : defaultVal
}

/**
 * Collect data attr
 */
const getAttr = (target, state) => ({
  target,
  easing: getFx(target, state, `e`, `easeInOut`),
  elasticity: getFx(target, state, `el`, 0),
  scale: getFx(target, state, `s`, target.style.scale),
  translateX: getFx(target, state, `t-x`, target.style.translateX),
  translateY: getFx(target, state, `t-y`, target.style.translateY),
  color: getFx(target, state, `c`, target.style.color),
  duration: getFx(target, state, `d`, 0),
  backgroundColor: getFx(target, state, `bg`, target.style.backgroundColor),
  loop: getFx(target, state, `l`, false),
})
