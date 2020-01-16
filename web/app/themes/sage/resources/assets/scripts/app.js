import domReady from '@wordpress/dom-ready'
import {
  instagram,
  nav,
  organize,
}  from '@components'

domReady(() => {
  /**
   * Configurables
   */
  const config = {
    easing: `cubicBezier(.5, .05, .1, .3)`,
  }

  /**
   * Site Navigation
   */
  nav(config);

  /**
   * Instagram module
   */
  instagram(config);

  /**
   * Organize module
   */
  organize($config);
})
