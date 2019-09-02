import React from 'react';
import ReactDOM from 'react-dom'
import App from './App'

import {
  library,
  facebook,
  twitter,
  instagram
} from  './icons'

library.add(twitter, instagram, facebook)

ReactDOM.render(<App />, document.getElementById('root'));
