import { disableScroll, enableScroll } from './../util'
import anime from 'animejs'

export default () => {
  const triggers = document.querySelectorAll(`[modal='overlay']`)
  const modal = document.querySelector('.overlay-modal')
  const modalContents = document.querySelector('.overlay-content')

  modal && (() => {
    modal.style.opacity = 0;
    modal.setAttribute(`modal-toggle`, `off`);
  })();

  modalContents && (() => {
    modalContents.style.position = `relative`;
    modalContents.style.transform = `translateY(-100vh)`;
  })();

  /**
   * Set toggle state
   */
  const setToggle = modal => {
    const newState = ! isToggled(modal) ? true : false;

    modal.setAttribute(`modal-toggle`, newState ? `on` : `off`);
    newState ? disableScroll() : enableScroll()

    anime({
      targets: modal,
      opacity: newState ? [0, 1] : [1, 0],
      duration: 400,
      easing: `easeInOutSine`,
      elasticity: 0,
      begin: () => {
        newState ? modal.classList.remove(`hidden`) : modal.classList.add(`hidden`)
      },
    })
    anime({
      targets: modalContents,
      translateY: newState ? `0vh` : `-100vh`,
      duration: 800,
      easing: `easeInOutSine`,
      elasticity: 0,
    })
  }

  /**
   * Return true if overlay is toggled
   */
  const isToggled = modal => {
    return modal.getAttribute(`modal-toggle`) == `on`;
  }

  triggers.forEach(trigger => {
    trigger.addEventListener(`click`, e => {
      e.preventDefault();

      setToggle(modal)
    })
  })
}
