/** emotion */
import { injectGlobal } from 'emotion'

/**
 * Global styles
 */
export default () => injectGlobal`
  #adminmenumain {
    width: 0 !important;
    display: none !important;
  }

  #wpcontent,
  #wpfooter {
    margin-left: 0 !important;
  }

  .editor-post-title__block {
    font-family: Roboto Condensed,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
  }


  .wp-block {
    max-width: none !important;
  }

  .auto-fold .block-editor-editor-skeleton {
    display: flex !important;
    flex-direction: column !important;
    height: auto !important;
    max-height: 100% !important;
    position: fixed !important;
    top: 48px !important;
    right: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
  }

  @media (min-width: 782px) {
    .auto-fold .block-editor-editor-skeleton {
      top: 32px !important;
      left: 0 !important;
    }
  }

  @media (min-width: 782px) {
    .auto-fold .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (min-width: 961px) {
    .auto-fold .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (max-width: 782px) {
    .auto-fold .wp-responsive-open .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (max-width: 600) {
    .auto-fold .wp-responsive-open .block-editor-editor-skeleton {
      margin-left: -18px !important;
    }
  }

  .folded .block-editor-editor-skeleton {
    left: 0
  }

  @media (min-width: 782px) {
    .folded .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }
`