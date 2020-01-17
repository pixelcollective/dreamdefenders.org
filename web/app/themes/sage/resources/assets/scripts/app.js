import domReady from '@wordpress/dom-ready'
import {
  instagram,
  nav,
  organize,
}  from '@components'

domReady(() => {
  const config = {
    easing: `cubicBezier(.5, .05, .1, .3)`,
  }

  nav(config);

  instagram(config);

  organize(config);
})
