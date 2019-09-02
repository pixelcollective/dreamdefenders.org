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
    height: 100vh;
    width: 100vw;
    zIndex: -10;
    object-fit: cover;
    background-size: cover;
    min-width: 100vw;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(${bgImage});
    background-attachment: fixed;
  `

  const Scrim = styled(motion.div)`
    background: rgba(253, 230, 83, 1);
    min-height: 100vh;
    min-width: 100vw;
    position: relative;
    top: 0;
    left: 0;
    z-index: 10;
  `

  const Content = styled(motion.div)`
    ${props.init && `
      opacity: 0;
      transition: all 1s ease-in-out;
    `}
  `

  return (
    <Fragment>
      <BackgroundImageOnLoad src={bgImage} />
      <AnimatePresence>
        <Background
          initial={{scale: 1}}
          animate={{scale: 1.2}}
          transition={{duration: 60}} />
        <Scrim
          animate={{background: `rgba(253, 230, 83, 0.4)`}}
          transition={{duration: `1`, delay: `1`}}>
          <Content
            animate={{opacity: `1`}}
            transition={{duration: `5`, delay: `2`}}>
            {props.children}
          </Content>
        </Scrim>
      </AnimatePresence>
    </Fragment>
  )
}

export default SplashScreen
