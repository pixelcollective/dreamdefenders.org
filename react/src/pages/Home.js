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
        {`Dream Defenders`}
      </Typography>
    </motion.div>
  )
}

/**
 * Main app.
 */
const Home = () => (
  <Fragment>
    <Grid
      container
      xs={4}
      alignContent={`space-around`}
      justify={`space-around`}
      style={{
        marginLeft: `auto`,
        marginRight: `auto`,
      }}>
      <AnimatePresence>
        <Brand />
        <SocialNetworks size={`4x`} />
      </AnimatePresence>
    </Grid>
  </Fragment>
)

export default Home
