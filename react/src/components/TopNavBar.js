import React, {Fragment} from 'react'

// @material
import { useTheme } from '@material-ui/core/styles'
import AppBar from '@material-ui/core/AppBar'
import Toolbar from '@material-ui/core/Toolbar'
import Button from '@material-ui/core/Button'
import useScrollTrigger from '@material-ui/core/useScrollTrigger';
import Slide from '@material-ui/core/Slide'

// routing
import { Link } from 'react-router-dom'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// vector
import logo from './../svg/blank_shield.svg'

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
            <img
              alt={`Dream Defenders`}
              title={`Dream Defenders`}
              src={logo}
              style={{
                maxHeight: `30px`,
                marginRight: `10px`,
              }}/>
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
    </Fragment>
  ) : <div>Loading...</div>
}

export default TopNavBar
