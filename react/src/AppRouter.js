import React from 'react'
import {
  Route,
  Switch,
  BrowserRouter,
} from 'react-router-dom'

import { Page, Home } from './templates/index'

const AppRouter = props => (
  <BrowserRouter>
    <Switch>
      <Route path="/:slug" component={Page} />
      <Route path="/" component={Home} />
    </Switch>
  </BrowserRouter>
)

export default AppRouter
