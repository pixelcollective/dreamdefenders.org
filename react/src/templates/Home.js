// react
import React, { useState } from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// functional
import { content } from './../graph/fragments'

// styled
import styled, { css } from 'styled-components'

// rebass
import { Box, Heading as H } from 'rebass/styled-components'

// framer-motion
import { motion, AnimatePresence } from 'framer-motion'

// theme
import theme from './../theme/material'

// Components
import Error from './../components/Error'
import SocialNetworks from './../components/Social'
import SplashScreen from '../components/SplashScreen'


const Container = props => (
  <Box
    sx={{
      maxWidth: 722,
      mx: 'auto',
      px: 1,
    }}>
    {props.children}
  </Box>
)

const Heading = styled(H)(css`
  color: white;
  text-transform: uppercase;
  font-weight: 900;
  line-height: 1em;
  padding-top: 2em;
`)

const Content = styled.div`
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-weight: strong;
  }
`

/**
 * Main app.
 */
const Home = () => {
  let {init}   = useState(true)
  const {data} = useQuery(gql`${content.page} {
    pages(where: {name: "dream-defenders"}) {
      edges {
        node {
          featuredImage {
            altText
            title
            guid
            srcSet
          }
          ...PageParts
        }
      }
    }
  }`)

  const page = data.pages && data.pages.edges[0].node ? data.pages.edges[0].node : null

  return data && data.pages && data.pages.edges <= 0 ? <Error /> : (
    <SplashScreen init={init}>
      <AnimatePresence>
        <Container>
          <Box
            fontSize={[2, 6, 8]}
            mb={[3]}
            pt={[6]}>
            <motion.div
              style={{
                radialGradient: `rgba(0, 0, 0, 50%), rgba(0, 0, 0, 0)`
              }}
              transition={{
                yoyo: Infinity,
                duration: 30,
                type: `spring`,
              }}
              whileHover={{
                scale: 1.1,
                cursor: `pointer`,
              }}>
              <Heading
                fontSize={[6, 8, 8]}
                fontFamily={[`sans-serif`]}
                color={[`white`]}>
                {`Dream Defenders`}
              </Heading>
            </motion.div>
          </Box>
          <Box py={[4]}>
            <SocialNetworks size={`4x`} />
          </Box>
        </Container>
      </AnimatePresence>
      <Box
        backgroundColor={[theme.palette.secondary[`900`]]}
        py={[4]}>
        <Container>
          <AnimatePresence>
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{
                duration: 0.1,
                delay: 0,
              }}>
              <Content dangerouslySetInnerHTML={{
                __html: page.content && page.content
              }} />
            </motion.div>
          </AnimatePresence>
        </Container>
      </Box>
    </SplashScreen>
  )
}

export default Home
