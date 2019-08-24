// react
import React, { Fragment } from 'react'

// @material
import Grid from '@material-ui/core/Grid'

// styled-components
import styled from 'styled-components'

// framer-motion
import { motion } from 'framer-motion'

// font-awesome
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'

// icons
import Icons from './../icons'

/**
 * Sunday colors.
 */
const sundayColors = [
  `#E62538`,
  `#2DA7BF`,
  `#FC711F`,
  `#6126E4`,
  `#E874A8`,
  `#C682E8`,
  `#FCE30C`,
]

/**
 * Bubblegum social network icons.
 */
const NetworkPop = props => {
  return (
    <motion.div
      style={{
        width: `auto`,
        padding: `10px`,
        fillColor: `white`,
        marginLeft: `auto`,
        marginRight: `auto`,
        display: `inline-block`,
      }}
      initial={{
        scale: 1,
        color: `#FFFFFF`,
        borderRadius: `0`,
        background: `none`,
      }}
      whileHover={{
        scale: [1.6, 1.2],
        cursor: `pointer`,
        borderRadius: `10px`,
        color: sundayColors[`${props.color}`],
        background: sundayColors[`${props.bg}`],
      }}
      transition={{
        type: `spring`,
        duration: 0.4,
      }}>
      {props.children}
    </motion.div>
  )
}

/**
 * Social network iconset.
 */
const SocialNetworks = props => {
  const Icon = styled(FontAwesomeIcon)`
    svg {
      color: white;
      fill: white;
    }
  `

  return (
    <Fragment>
      <Grid item align={`center`} xs={4}>
        <NetworkPop color={6} bg={5}>
          <Icon icon={Icons.facebook} {...props} />
        </NetworkPop>
      </Grid>
      <Grid item align={`center`} xs={4}>
        <NetworkPop color={2} bg={3}>
          <Icon icon={Icons.twitter} {...props} />
        </NetworkPop>
      </Grid>
      <Grid item align={`center`} xs={4}>
        <NetworkPop color={4} bg={1}>
          <Icon icon={Icons.instagram} {...props} />
        </NetworkPop>
      </Grid>
    </Fragment>
  )
}

export default SocialNetworks
