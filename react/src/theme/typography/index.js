// @material-ui
import { createMuiTheme } from '@material-ui/core/styles'

// theme object
const material = createMuiTheme()

/**
 * Typographic definitions
 *
 * @package Dream Defenders
 * @subpackage Material UI
 */
const typography = {
  fontFamily: [
    `-apple-system`,
    `BlinkMacSystemFont`,
    `"Segoe UI"`,
    `Roboto`,
    `"Helvetica Neue"`,
    `Arial`,
    `sans-serif`,
    `"Apple Color Emoji"`,
    `"Segoe UI Emoji"`,
    `"Segoe UI Symbol"`,
  ].join(`,`),
  h1: {
    fontSize: `4rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `4rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `4rem`,
    },
  },
  h2: {
    fontSize: `3rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `3rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `3rem`,
    },
  },
  h3: {
    fontSize: `3rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `3rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `3rem`,
    },
  },
  h4: {
    fontSize: `2rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `2rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `2rem`,
    },
  },
  h5: {
    fontSize: `2rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `2rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `2rem`,
    },
  },
  h6: {
    fontSize: `1rem`,
    letterSpacing: `0.3ch`,
    fontWeight: 900,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `1.5rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `1.5rem`,
    },
    [material.breakpoints.up(`lg`)]: {
      fontSize: `2rem`,
    },
    [material.breakpoints.up(`xl`)]: {
      fontSize: `2rem`,
    },
  },
  body: {
    fontSize: `1.5rem`,
    [material.breakpoints.up(`sm`)]: {
      fontSize: `1.8rem`,
    },
  }
}

export default typography
