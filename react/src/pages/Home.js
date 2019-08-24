// react
import React, { Fragment } from 'react'

// @material-ui
import Typography        from '@material-ui/core/Typography'
import Grid              from '@material-ui/core/Grid'

// framer-motion
import { motion, AnimatePresence } from 'framer-motion'

// Components
import SocialNetworks from './../components/Social'

/**
 * Mock data.
 * @todo application-level gql queries
 */
const app = {
  name: `Dream Defenders`,
  bottomNavOptions: [
    { label: `Item One`,   url: `#1` },
    { label: `Item Two`,   url: `#2` },
    { label: `Item Three`, url: `#3` },
    { label: `Item Four`,  url: `#4` },
  ],
}

/**
 * Primary branding area.
 */
const Brand = ({onClick}) => {
  return (
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
        {app.name}
      </Typography>
    </motion.div>
  )
}

/**
 * Main app.
 */
const Home = () => (
  <Fragment>
    <AnimatePresence>
      <Grid container justify={`center`}>
        <Brand />
      </Grid>
    </AnimatePresence>
    <Grid
      container
      xs={4}
      alignContent={`space-around`}
      justify={`space-around`}
      style={{marginLeft: `auto`, marginRight: `auto`}}>
      <SocialNetworks size={`4x`} />
    </Grid>
  </Fragment>
)

export default Home
