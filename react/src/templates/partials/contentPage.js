import React from 'react'

import { AnimatePresence, motion } from 'framer-motion'
import styled from 'styled-components'
import Container from './../../components/styled/container'

const Content = styled.div`
  padding-top: 2rem;
  padding-bottom: 2rem;
  min-height: 60vh;

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
  <div style={{ background: background ? background : `white`, opacity: 1, }}>
  <AnimatePresence>
    <motion.div
      initial={{opacity: 0, color: color ? color : `inherit`,}}
      animate={{ opacity: 1, color: color ? color : `inherit`}}
      transition={{duration: 0.1, delay: 0}}>
      <Container>
        <Content dangerouslySetInnerHTML={{ __html: html && html }} />
      </Container>
    </motion.div>
  </AnimatePresence>
  </div>
)

export default PageContent
