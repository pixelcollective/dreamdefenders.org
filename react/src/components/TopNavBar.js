import React, {Fragment} from 'react'

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
import Button from '@material-ui/core/Button'
import useScrollTrigger from '@material-ui/core/useScrollTrigger';
import Slide from '@material-ui/core/Slide'

// routing
import { Link } from 'react-router-dom'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

const HideOnScroll = props => {
  const { children, window } = props;
  const trigger = useScrollTrigger({ target: window ? window() : undefined });

  return (
    <Slide appear={false} direction="down" in={!trigger}>
      {children}
    </Slide>
  );
}


const TopNavBar = ({height, appName}, ...props) => {
  const theme = useTheme()
  const [open, setOpen] = React.useState(false)
  const { data } = useQuery(gql`{
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
    <Fragment>
      <HideOnScroll>
        <AppBar elevation={0}>
          <Toolbar>
            <IconButton
              edge="start"
              color="inherit"
              aria-label="open drawer"
              onClick={handleDrawerOpen}>
              <MenuIcon />
            </IconButton>
            <Typography variant="h6">
              DD
            </Typography>
            {data.menus.edges[0].node.menuItems.edges.map(({node: { url, id, label}}) => (
              <Button color="inherit">
                <Link style={{color: `black`, textDecoration: `none`}} to={url} key={id}>
                  {label}
                </Link>
              </Button>
              ))}
          </Toolbar>
        </AppBar>
      </HideOnScroll>
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
    </Fragment>
  ) : <div>Loading...</div>
}

export default TopNavBar
