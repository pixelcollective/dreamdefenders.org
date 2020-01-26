import anime from './node_modules/animejs'

/**
 * hoverFx
 */
export default els => {
  els.forEach(target => {
    target.addEventListener(`mouseenter`, () => fx(getAttr(target, `on`)), false)
    target.addEventListener(`mouseleave`, () => fx(getAttr(target, `off`)), false)
  })
}

/**
 * Animation
 */
const fx = params => {
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
  easing: getFx(target, state, `easing`, `easeInOutSine`),
  elasticity: getFx(target, state, `elasticity`, 0),
  scale: getFx(target, state, `scale`, target.style.scale),
  translateX: getFx(target, state, `translate-x`, target.style.translateX),
  translateY: getFx(target, state, `translate-y`, target.style.translateY),
  color: getFx(target, state, `color`, target.style.color),
  duration: getFx(target, state, `duration`, 0),
  backgroundColor: getFx(target, state, `bg-color`, target.style.backgroundColor),
  loop: getFx(target, state, `loop`, false),
})
