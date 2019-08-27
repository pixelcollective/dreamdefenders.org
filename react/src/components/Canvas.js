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

const imageQuery = gql`{
  featuredMediaItems(first: 5) {
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
}`

/**
 * Provides background and scrim wrapper.
 */
const Canvas = props => {
  const { error, data } = useQuery(imageQuery)

  console.log(data)
  const imageCount = data.featuredMediaItems.edges.length

  const bgImage = data.featuredMediaItems.edges[
    Math.floor(Math.random() * imageCount)
  ].node.featuredMedia.image.guid

  const Background = styled(motion.div)`
    background-size: cover;
    height: 100vh;
    cursor: none;
    background-image: url(${props.backgroundLoaded && bgImage});
  `

  const Scrim = styled(motion.div)`
    background: rgba(253,230,83,1);
    height: 100vh;
    width: 100vw;
  `

  const Content = styled(motion.div)`
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    ${props.isInitialLoad && `
      opacity: 0;
      transition: opacity 1s ease-in-out;
    `}
  `

  return (
    <Fragment>
      <BackgroundImageOnLoad
        src={bgImage}
        onLoadBg={props.onBackgroundLoad}
      />
      {props.backgroundLoaded && (
        props.isInitialLoad && <AnimatePresence>
          <Background>
            <Scrim
              animate={props.isInitialLoad && {background: `rgba(253, 230, 83, 0.4)`}}
              transition={props.isInitialLoad && {duration: `1`, delay: `1`}}>
              <Content
                style={{width: `100vw`, height: `100vh`}}
                animate={props.isInitialLoad && { opacity: `1`}}
                transition={props.isInitialLoad && {duration: `5`, delay: `2`}}>
                {props.children}
              </Content>
            </Scrim>
          </Background>
        props.isInitialLoad && </AnimatePresence>
      )}
    </Fragment>
  )
}

export default Canvas
