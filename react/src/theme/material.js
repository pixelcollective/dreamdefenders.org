// @material-ui
import { createMuiTheme } from '@material-ui/core/styles'

// theme variables
import palette    from './colors'
import typography from './typography'
import overrides  from './overrides'

/**
 * Exports
 */
const theme = createMuiTheme({
  palette,
  typography,
  overrides,
})

export default theme
