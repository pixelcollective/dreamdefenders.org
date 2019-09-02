import React from 'react'

import { AnimatePresence, motion } from 'framer-motion'
import styled from 'styled-components'

const Container = styled.div`
  position: relative;
  background: ${props => props.background};
`

const Content = styled.div`
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  padding-top: 2rem;
  padding-bottom: 2rem;
  padding-left: 1rem;
  padding-right: 1rem;
  min-height: 100vh;

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-weight: strong;
  }
`

const PageContent = ({ html, background, color }) => (
  <Container background={background ? background : `white`}>
    <AnimatePresence>
      <motion.div
        initial={{opacity: 0, color: color ? color : `inherit`,}}
        animate={{opacity: 1}}
        transition={{duration: 0.1, delay: 0}}>
        <Content dangerouslySetInnerHTML={{__html: html && html}} />
      </motion.div>
    </AnimatePresence>
  </Container>
)

export default PageContent
