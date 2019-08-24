import palette from './../colors'

// ⚛️ MuiBottomNavigationAction
export default {
  root: {
    color: 'white',
    fontSize: `3rem`,
    textTransform: `uppercase`,
    letterSpacing: `0.1ch`,
    fontWeight: 700,
    // 💅🏽 MuiBottomNavigationAction.Mui-selected
    [`&.Mui-selected`]: {
      background: palette.secondary[700],
      color: `white`,
      fontSize: `3rem`,
      fontWeight: 900,
    },
  },
}
