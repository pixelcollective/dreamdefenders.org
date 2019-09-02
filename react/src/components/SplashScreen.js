// react
import React, { Fragment } from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// styled-components
import styled from 'styled-components'

// framer
import { motion, AnimatePresence } from 'framer-motion'

// vendors
import BackgroundImageOnLoad from 'background-image-on-load'

const SplashScreen = props => {
  const { data } = useQuery(gql`
    {
      featuredMediaItems(first: 10) {
        edges {
          node {
            id
            featuredMedia {
              image {
                guid
                sourceUrl(size: LARGE)
              }
            }
          }
        }
      }
    }
  `)

  const imageCount = data.featuredMediaItems && data.featuredMediaItems.edges.length

  const bgImage = data.featuredMediaItems && data.featuredMediaItems.edges[
    Math.floor(Math.random() * imageCount)
  ].node.featuredMedia.image.guid

  const Background = styled(motion.div)`
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100vw;
    min-height: 100vh;
    zIndex: -10;
    object-fit: cover;
    background-size: cover;
    min-width: 100vw;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(${props.backgroundLoaded && bgImage});
    background-attachment: fixed;
  `

  const Scrim = styled(motion.div)`
    background: rgba(253,230,83,1);
    min-height: 100vh;
    min-width: 100vw;
    position: relative;
    top: 0;
    left: 0;
    z-index: 10;
  `

  const Content = styled(motion.div)`
    ${props.isInitialLoad && `
      opacity: 0;
      transition: all 1s ease-in-out;
    `}
  `

  return (
    <Fragment>
      <BackgroundImageOnLoad src={bgImage} onLoadBg={props.onBackgroundLoad} />
      {props.backgroundLoaded && (
        props.isInitialLoad && <AnimatePresence>
          <Background initial={{scale: 1}} animate={{scale: 1.2}} transition={{duration: 60}} />
          <Scrim
            animate={props.isInitialLoad && {background: `rgba(253, 230, 83, 0.4)`}}
            transition={props.isInitialLoad && {duration: `1`, delay: `1`}}>
            <Content
              animate={props.isInitialLoad && {opacity: `1`}}
              transition={props.isInitialLoad && {duration: `5`, delay: `2`}}>
              {props.children}
            </Content>
          </Scrim>
        props.isInitialLoad && </AnimatePresence>
      )}
    </Fragment>
  )
}

export default SplashScreen
