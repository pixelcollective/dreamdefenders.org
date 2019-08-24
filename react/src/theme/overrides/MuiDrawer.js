import palette from './../colors'

const drawerWidth = 240

// ⚛️ MuiDrawer
export default {
  root: {
    flexGrow: 1,
    // 💅🏽 MuiDrawer.MuiIconButton
    [`& .MuiIconButton-root`]: {
      borderRadius: 0,
      color: `white`,
    },
    // 💅🏽 MuiDrawer.MuiPaper
    [`& .MuiPaper-root`]: {
      background: palette.secondary[800],
      color: `white`,
      width: drawerWidth,
      // 💅🏽 MuiDrawer.MuiPaper.MuiListItemIcon
      [`& .MuiListItemIcon-root`]: {
        color: palette.primary[50],
      },
    },
    title: {
      flexGrow: 1,
    },
  },
}
