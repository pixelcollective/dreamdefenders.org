import React from 'react'

// @material
import { useTheme } from '@material-ui/core/styles'
import AppBar from '@material-ui/core/AppBar'
import Toolbar from '@material-ui/core/Toolbar'
import IconButton from '@material-ui/core/IconButton'
import Typography from '@material-ui/core/Typography'
import MenuIcon from '@material-ui/icons/Menu'
import Drawer from '@material-ui/core/Drawer'
import List from '@material-ui/core/List'
import Divider from '@material-ui/core/Divider'
import ChevronLeftIcon from '@material-ui/icons/ChevronLeft'
import ChevronRightIcon from '@material-ui/icons/ChevronRight'
import ListItem from '@material-ui/core/ListItem'
import ListItemText from '@material-ui/core/ListItemText'

import { Link } from 'react-router-dom'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'


const TopNavBar = ({height, appName}) => {
  const theme = useTheme()
  const [open, setOpen] = React.useState(false)
  const { error, data } = useQuery(gql`{
    menus(where: {location: PRIMARY_NAVIGATION}) {
      edges {
        node {
          menuItems {
            edges {
              node {
                label
                url
              }
            }
          }
        }
      }
    }
  }`)

  function handleDrawerOpen() {
    setOpen(true)
  }

  function handleDrawerClose() {
    setOpen(false)
  }

  return data && data.menus ? (
  <div>
    <AppBar elevation={0}>
      <Toolbar>
        <IconButton
          edge="start"
          color="inherit"
          aria-label="open drawer"
          onClick={handleDrawerOpen}>
          <MenuIcon />
        </IconButton>
          {data.menus.edges[0].node.menuItems.edges.map(({node: { url, id, label}}) => (
            <Link button to={url} key={id}>
              {label}
            </Link>
          ))}
      </Toolbar>
    </AppBar>
    <Drawer
      variant="persistent"
      anchor="left"
      open={open}>
      <div>
        <IconButton onClick={handleDrawerClose}>
          {theme.direction === 'ltr' ? <ChevronLeftIcon /> : <ChevronRightIcon />}
        </IconButton>
      </div>
      <Divider />
      <List>
        {['Section 1', 'Section 2', 'Section 3', 'Section 4'].map((text, index) => (
          <ListItem button key={text}>
            <ListItemText primary={text} />
          </ListItem>
        ))}
      </List>
      <Divider />
      <List>
        {['Donate', 'Twitter', 'Instagram'].map((text, index) => (
          <ListItem button key={text}>
            <ListItemText primary={text} />
          </ListItem>
        ))}
      </List>
    </Drawer>
  </div>
 ) : <div>Loading...</div>
}

export default TopNavBar
