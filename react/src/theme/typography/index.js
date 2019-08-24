// @material-ui
import { createMuiTheme } from '@material-ui/core/styles'

const material = createMuiTheme()

// typography
const typography = {
  // Fonts
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
  // Headings
  h1: {
    fontSize: `4rem`,
    [`@media (min-width:600px)`]: {
      fontSize: `4rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `4rem`,
    },
  },
  h2: {
    fontSize: `3rem`,
    [`@media (min-width:600px)`]: {
      fontSize: `3rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `3rem`,
    },
  },
  h3: {
    fontSize: `3rem`,
    [`@media (min-width:600px)`]: {
      fontSize: `3rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `3rem`,
    },
  },
  h4: {
    fontSize: `2rem`,
    [`@media (min-width:600px)`]: {
      fontSize: `2rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `2rem`,
    },
  },
  h5: {
    fontSize: `2rem`,
    [`@media (min-width:600px)`]: {
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
  // Body
  body: {
    fontSize: `1.5rem`,
    [`@media (min-width:600px)`]: {
      fontSize: `1.5rem`,
    },
    [material.breakpoints.up(`md`)]: {
      fontSize: `1.5rem`,
    },
  }
}

export default typography
