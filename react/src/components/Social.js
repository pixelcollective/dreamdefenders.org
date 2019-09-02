// react
import React, { Fragment } from 'react'

// styled-components
import styled from 'styled-components'

// rebass
import {
  Box,
} from 'rebass'

// framer-motion
import { motion } from 'framer-motion'

// font-awesome
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'

// icons
import {
  twitter,
  facebook,
  instagram
} from './../icons'

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

const Grid = props => (
  <Box {...props} sx={{
    display: 'grid',
    gridGap: [1],
    gridTemplateColumns: `repeat(auto-fit, minmax(128px, 1fr))`,
  }}>
    {props.children}
  </Box>
)


/**
 * Bubblegum social network icons.
 */
const NetworkPop = props => {
  return (
    <Box p={[4]} display={[`inline-block`]}>
      <motion.div
        style={{
          fillColor: `white`,
          padding: `${props.p}em`,
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
    </Box>
  )
}

/**
 * Social network iconset.
 */
const SocialNetworks = props => {
  const Icon = styled(FontAwesomeIcon)`
    padding: ${props => props.p};

    svg {
      color: white;
      fill: white;
    }
  `

  return (
    <Grid pt={[0]} mt={[0]}>
      <Box mt={[0]}>
        <NetworkPop p={[1]} color={6} bg={5}>
          <Icon icon={facebook} {...props} />
        </NetworkPop>
      </Box>
      <Box>
        <NetworkPop p={[1]} color={2} bg={3}>
          <Icon icon={twitter} {...props} />
        </NetworkPop>
      </Box>
      <Box>
        <NetworkPop p={[1]} color={4} bg={1}>
          <Icon icon={instagram} {...props} />
        </NetworkPop>
      </Box>
    </Grid>
  )
}

export default SocialNetworks
