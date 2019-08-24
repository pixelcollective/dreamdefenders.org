import React, { useState } from 'react'
import { default as BottomNav } from '@material-ui/core/BottomNavigation'
import { default as NavAction } from '@material-ui/core/BottomNavigationAction'

const BottomNavigation = props => {
  const [value, setValue] = useState(0)

  const onChange = (event, newValue) => setValue(newValue)

  return (
    <BottomNav
      value={value}
      onChange={onChange}
      showLabels>
      {props.items.map(action => (
        <NavAction
          label={action.label}
          onClick={() => window.location = action.url} />
      ))}
    </BottomNav>
  )
}

export default BottomNavigation
