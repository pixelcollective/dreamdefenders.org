import anime from 'animejs'

/**
 * Organize component
 */
export default ({ easing }) => {
  const organize = document.querySelectorAll(`.bg-organize`)

  organize && organize.forEach(target => {
    anime({
      targets: target,
      opacity: [0, 100],
      duration: 50000,
      maxWidth: [`100%`, `100%`],
      easing: easing,
    })
  })
}