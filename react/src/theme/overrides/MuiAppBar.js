// ⚛️ MuiAppBar
import { createMuiTheme } from '@material-ui/core/styles'

import typography from './../typography'
import palette    from './../colors'

const material = createMuiTheme()

const drawerWidth = 240

export default {
  root: {
    display: 'flex',
    color: `white`,
    backgroundColor: palette.secondary[500],
    fontFamily: typography.fontFamily,
    textTransform: `uppercase`,
    letterSpacing: `0.1ch`,
    fontWeight: 900,
  },
  appBar: {
    transition: material.transitions.create(['margin', 'width'], {
      easing: material.transitions.easing.sharp,
      duration: material.transitions.duration.leavingScreen,
    }),
  },
  appBarShift: {
    width: `calc(100% - ${drawerWidth}px)`,
    marginLeft: drawerWidth,
    transition: material.transitions.create(['margin', 'width'], {
      easing: material.transitions.easing.easeOut,
      duration: material.transitions.duration.enteringScreen,
    }),
  },
  menuButton: {
    marginRight: material.spacing(2),
  },
  hide: {
    display: 'none',
  },
}
