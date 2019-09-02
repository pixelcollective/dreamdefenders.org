// react
import React, { Component } from 'react'

// graphql
import GraphQLProvider from './graph'

// router
import {
  Route,
  Switch,
  BrowserRouter as Router,
} from 'react-router-dom'

// @material-ui
import CssBaseline       from '@material-ui/core/CssBaseline'
import { ThemeProvider } from '@material-ui/styles'

// providers
import { IndexProvider }  from './state'

// theme
import theme from './theme/material'

// components
import TopNavBar      from './components/TopNavBar'
import { Page, Home } from './templates/index'

const App = props => (
  <IndexProvider>
    <ThemeProvider theme={theme}>
      <GraphQLProvider>
        <CssBaseline />
        <Router>
          <TopNavBar appName={`Dream Defenders`} />
          <Switch>
            <Route path="/:slug" component={Page} />
            <Route exact path="/" component={Home} />
          </Switch>
        </Router>
      </GraphQLProvider>
    </ThemeProvider>
  </IndexProvider>
)

export default App
