import React from 'react'
import { default as BottomNav } from '@material-ui/core/BottomNavigation'
import { default as NavAction } from '@material-ui/core/BottomNavigationAction'

const BottomNavigation = props => {
  return (
    <BottomNav value={props.activeComponent} showLabels>
      {props.items.map(action => (
        <NavAction
          className={props.activeComponent == action.url && `Mui-selected`}
          label={action.label}
          onClick={() => props.onComponentSwap(action.url)} />
      ))}
    </BottomNav>
  )
}

export default BottomNavigation
