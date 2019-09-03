// react
import React from 'react'

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

import { Box } from 'rebass'

// rebass
import { ThemeProvider as Styled } from 'styled-components'

// theme
import theme from './theme/material'
import rebassTheme from './theme/styled'

// components
import AppScrollbar   from './components/AppScrollbar'
import TopNavBar      from './components/TopNavBar'
import {
  Page,
  Home,
  Campaign,
  Campaigns,
  FreedomPaper,
} from './templates'

const App = props => (
  <ThemeProvider theme={theme}>
    <Styled theme={rebassTheme}>
      <GraphQLProvider>
        <CssBaseline />
        <Router>
          <Box
            maxWidth={[`100vw`]}
            overflow={`hidden`}>
            <TopNavBar appName={`Dream Defenders`} />
            <AppScrollbar
              trackColor={`white`}
              thumbColor={theme.palette.primary[`400`]}>
              <Switch>
                <Route exact path="/campaigns" component={Campaigns} />
                <Route path="/campaigns/:slug" component={Campaign} />
                <Route path="/freedom-papers/:slug" component={FreedomPaper} />
                <Route path="/:slug" component={Page} />
                <Route exact path="/" component={Home} />
              </Switch>
            </AppScrollbar>
          </Box>
        </Router>
      </GraphQLProvider>
    </Styled>
  </ThemeProvider>
)

export default App
