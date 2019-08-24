// react
import React, { Component } from 'react'

// graphql
import GraphQLProvider from './graph'

// @material-ui
import CssBaseline       from '@material-ui/core/CssBaseline'
import Container         from '@material-ui/core/Container'
import { ThemeProvider } from '@material-ui/styles'

// providers
import { IndexProvider } from './state'
import { CursorProvider } from './state/cursor'

// theme
import theme from './theme/material'

// pages
import Home from './pages/Home'
import ThisYear from './pages/ThisYear'
import FreedomPapers from './pages/FreedomPapers'

// components
import TopNavBar from './components/TopNavBar'
import Canvas    from './components/Canvas'
import Cursor    from './components/cursor'

/**
 * Mock data.
 */
const app = {
  name: `Dream Defenders`,
  bottomNavOptions: [
    { label: `Item One`,   url: `#1` },
    { label: `Item Two`,   url: `#2` },
    { label: `Item Three`, url: `#3` },
    { label: `Item Four`,  url: `#4` },
  ],
}

/**
 * Main app.
 */
class App extends Component {
  constructor() {
    super()

    this.state = {
      backgroundLoaded: false,
    }

    this.onBackgroundLoad = this.onBackgroundLoad.bind(this)
  }

  onBackgroundLoad() {
    this.setState({ backgroundLoaded: true })
  }

  render() {
    return (
      <CursorProvider>
        <IndexProvider>
          <ThemeProvider theme={theme}>
            <GraphQLProvider>
              <CssBaseline/>
              <Cursor />
              <Canvas
                backgroundLoaded={this.state.backgroundLoaded}
                onBackgroundLoad={this.onBackgroundLoad}>
                <TopNavBar appName={app.name} />
                <FreedomPapers />
              </Canvas>
            </GraphQLProvider>
          </ThemeProvider>
        </IndexProvider>
      </CursorProvider>
    )
  }
}

export default App
