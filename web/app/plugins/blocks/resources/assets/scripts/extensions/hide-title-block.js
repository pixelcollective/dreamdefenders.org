import domReady from '@wordpress/dom-ready'
import { injectGlobal } from 'emotion'

domReady(() => injectGlobal`
  .editor-post-title {
    display: none;
  }
`)
