// react
import React, { Component } from 'react'

// graphql
import GraphQLProvider from './graph'

// @material-ui
import CssBaseline       from '@material-ui/core/CssBaseline'
import { ThemeProvider } from '@material-ui/styles'

// providers
import { IndexProvider }  from './state'
import { CursorProvider } from './state/cursor'

// theme
import theme from './theme/material'

// pages
import Home          from './pages/Home'
import ThisYear      from './pages/ThisYear'
import FreedomPapers from './pages/FreedomPapers'

// components
import TopNavBar    from './components/TopNavBar'
import Canvas       from './components/Canvas'
import Cursor       from './components/cursor'
import BottomNavBar from './components/BottomNavBar'

/**
 * Mock data.
 */
const app = {
  name: `Dream Defenders`,
  bottomNavOptions: [
    { label: `Home`, url: `home` },
    { label: `Freedom Papers`, url: `freedom-papers` },
    { label: `This Year`, url: `this-year` },
  ],
}

class App extends Component {
  constructor() {
    super()

    this.state = {
      backgroundLoaded: false,
      component: `home`,
      init: true,
    }

    this.onBackgroundLoad = this.onBackgroundLoad.bind(this)
    this.onComponentSwap  = this.onComponentSwap.bind(this)
  }

  onBackgroundLoad() {
    this.setState({
      backgroundLoaded: true,
    })
  }

  onComponentSwap(component) {
    this.setState({ component: component, })
  }

  render() {
    const {
      component,
      init,
      backgroundLoaded,
    } = this.state

    return (
      <CursorProvider>
        <IndexProvider>
          <ThemeProvider theme={theme}>
            <GraphQLProvider>
              <CssBaseline/>
              <Cursor />
              <TopNavBar appName={`Dream Defenders`} />
              <Canvas
                isInitialLoad={init}
                backgroundLoaded={backgroundLoaded}
                onBackgroundLoad={this.onBackgroundLoad}
                onComponentSwap={this.onComponentSwap}
                activeComponent={component}>
                {component === `home` ? <Home />
                :component === `freedom-papers` ? <FreedomPapers />
                :component === `this-year` ? <ThisYear />
                : null}
              </Canvas>
              <BottomNavBar
                items={app.bottomNavOptions}
                onComponentSwap={this.onComponentSwap}
                activeComponent={component}
              />
            </GraphQLProvider>
          </ThemeProvider>
        </IndexProvider>
      </CursorProvider>
    )
  }
}

export default App
