import anime from 'animejs'
import Headroom from 'headroom.js'

import { disableScroll, enableScroll } from './../util'

/**
 * Navbar scroll animation
 */
const doHeadroom = nav => {
  const animateHeadroom = params => {
    anime({
      targets: nav,
      duration: 400,
      easing: 'easeInQuart',
      transformOrigin: 'top',
      ...params,
    })
  }

  const onPin = () => {
    animateHeadroom({
      backgroundColor: 'rgba(0, 0, 0, 0.8)',
      translateY: '0px',
    })
  }

  const onUnpin = () => {
    animateHeadroom({
      backgroundColor: 'rgba(0, 0, 0, 0.1)',
      translateY: `-${nav.offsetHeight}px`,
    })
  }

  const headroom = new Headroom(nav, {
    offset: nav.offsetHeight,
    tolerance: 5,
    onPin,
    onUnpin,
  })

  headroom.init()
}

/**
 * Navigation
 */
export default () => {
  const { sage }  = window
  const navEl     = document.querySelector('.nav')
  const underNav = document.querySelector('.lower-nav')
  const overlay = document.querySelector('.nav-overlay')
  const overlayNavEls = document.querySelectorAll('.nav-overlay .nav-item')

  /** Headroom */
  navEl && doHeadroom(navEl)

  /** Bounce early if no overlay */
  if (! overlay) return

  /** Set initial state. */
  overlay.style.height = 0
  overlay.style.opacity = 0

  /** Set initialk overlay nav item state */
  overlayNavEls.forEach(el => {
    el.style.opacity = 0;
    el.style.transform = 'translateY(50px)';
  })

  /** Overlay toggles */
  const toggles = [
    ...document.querySelectorAll('[nav-toggle="open"]'),
    ...document.querySelectorAll('[nav-toggle="close"]'),
  ]

  /** Handle all the toggles */
  toggles && toggles.forEach(toggle => {
    toggle.hasAttribute('nav-toggle') &&
    toggle.addEventListener('click', () => {
      toggle.getAttribute('nav-toggle') == 'open'
        ? openOverlay({toggles})
        : closeOverlay({toggles})
    })
  })

  /**
   * Open overlay
   */
  const openOverlay = ({toggles}) => {
    disableScroll()

    toggles.forEach(toggle => toggle.setAttribute('nav-toggle', 'close'))
    anime({
      targets: underNav,
      opacity: 0,
      duration: 300,
      delay: anime.stagger(30, { start: 20 }),
    })

    anime({
      targets: overlay,
      height: ['0', '100vh'],
      opacity: [0, 100],
      duration: 300,
      elasticity: 0,
      easing: 'easeInOutSine',
      complete: () => {
        anime({
          targets: overlayNavEls,
          easing: 'easeOutQuint',
          translateY: 0,
          opacity: 1,
          delay: anime.stagger(30, { start: 20 }),
        })
      },
    })

    anime({
      targets: navEl,
      backgroundColor: ['rgba(0,0,0,1)'],
      duration: 400,
      easing: 'easeInOutSine',
      elasticity: 0,
    })
  }

  /**
   * Close overlay
   */
  const closeOverlay = ({toggles}) => {
    enableScroll()

    toggles.forEach(toggle => toggle.setAttribute('nav-toggle', 'open'))

    anime({
      targets: underNav,
      opacity: 100,
      duration: 300,
      delay: anime.stagger(30, { start: 20 }),
    })

    anime({
      targets: overlay,
      height: ['100vh', '0'],
      opacity: [100, 0],
      duration: 300,
      elasticity: 0,
      easing: 'easeInOutSine',
      complete: () => {
        anime({
          targets: overlayNavEls,
          easing: 'easeOutQuint',
          translateY: 50,
          opacity: 0,
          delay: anime.stagger(30, { start: 20 }),
        })
      },
    })

    anime({
      targets: navEl,
      backgroundColor: ['rgba(0,0,0,1)'],
      duration: 400,
      easing: 'easeInOutSine',
      elasticity: 0,
    })
  }
}
