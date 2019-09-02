// react
import React, { Component } from 'react'

// @material-ui
import Typography from '@material-ui/core/Typography'
import Grid       from '@material-ui/core/Grid'

// framer-motion
import {
  motion,
  AnimatePresence,
} from 'framer-motion'

// Components
import Page from './page/Page'
import SocialNetworks from './../components/Social'
import SplashScreen from '../components/SplashScreen'

/**
 * Primary branding area.
 */
const Brand = ({onClick}) => (
  <motion.div
    transition={{
      yoyo: Infinity,
      duration: 30,
      type: `spring`,
    }}
    whileHover={{
      scale: 1.1,
      cursor: `pointer`,
    }}
    style={{
      paddingTop: `5rem`,
      paddingBottom: `5rem`,
      width: `100%`,
    }}>
    <Typography
      variant={`h1`}
      component={`h1`}
      onClick={onClick}
      style={{
        color: `white`,
        textAlign: `center`,
        letterSpacing: `0.1ch`,
        textTransform: `uppercase`,
        fontWeight: 900,
      }}>
      {`Dream Defenders`}
    </Typography>
  </motion.div>
)

/**
 * Main app.
 */
class Home extends Component {
  constructor() {
    super()

    this.state = {
      backgroundLoaded: false,
      init: true,
    }

    this.onBackgroundLoad = this.onBackgroundLoad.bind(this)
    this.onComponentSwap = this.onComponentSwap.bind(this)
  }

  onBackgroundLoad() {
    this.setState({
      backgroundLoaded: true,
    })
  }

  onComponentSwap(component) {
    this.setState({ component })
  }

  render() {
    const {
      component,
      init,
      backgroundLoaded,
    } = this.state

    return (
      <SplashScreen
        isInitialLoad={init}
        backgroundLoaded={backgroundLoaded}
        onBackgroundLoad={this.onBackgroundLoad}
        onComponentSwap={this.onComponentSwap}
        activeComponent={component}>
        <Grid
          container
          xs={8}
          alignContent={`space-around`}
          justify={`space-around`}
          style={{
            padding: `30vh 0 30vh 0`,
            height: `100vh`,
            width: `100vw`,
            marginLeft: `auto`,
            marginRight: `auto`,
          }}>
          <AnimatePresence>
            <Brand />
            <SocialNetworks size={`4x`} />
          </AnimatePresence>
        </Grid>
        <Grid
          justify={`space-around`}
          style={{
            marginLeft: `auto`,
            marginRight: `auto`,
            backgroundRepeat: `repeat`,
          }}>
          <Grid
            container
            justify={`space-around`}
            style={{
              padding: `2rem`,
              color: `white`,
              fontSize: `1.5rem`,
              background: `linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3) 30%, rgb(0, 0, 0, 1) 90%)`,
            }}>
            <Page match={{ params: { slug: `dream-defenders` } }} />
          </Grid>
        </Grid>
      </SplashScreen>
    )
  }
}

export default Home
