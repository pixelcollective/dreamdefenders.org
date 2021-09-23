import React from 'react'
import ReactDOM from 'react-dom'
import {Modal} from './Modal'

const init = () => {
  const el = document.getElementById('tinymodal')

  return el
    ? ReactDOM.render(<Modal />, el)
    : requestAnimationFrame(init)
}

requestAnimationFrame(init)
