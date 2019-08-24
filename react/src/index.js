import React from 'react';
import ReactDOM from 'react-dom'

import { library } from '@fortawesome/fontawesome-svg-core'

import Icons from './icons'

import App from './App'

// icon library
library.add(
  Icons.twitter,
  Icons.instagram,
  Icons.facebook,
)

ReactDOM.render(<App />, document.getElementById('root'));
