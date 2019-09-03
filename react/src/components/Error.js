// react
import React from 'react'
import { Link } from 'react-router-dom'

const Error = props => (
  <div className="graph-error">
    <h1>404</h1>
    <div>Somewhere in the distance, the sound of nerds frantically rushing to fix this...</div>
    <div>You might also have just been given a bad link. Return to <Link to="/">Home</Link>?</div>
  </div>
)

export default Error
