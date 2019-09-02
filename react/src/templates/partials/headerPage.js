import React, { Fragment } from 'react'

import { AnimatePresence, motion } from 'framer-motion'
import styled from 'styled-components'

const Color = styled.div`
  z-index: -1;
  margin-top: 0;
  max-width: 100vw;
`

const Label = styled.div`
  background: black;
  color: white;
`

const Frame = styled.div`
  position: relative;
  min-height: 600px;
  z-index: -1;
  min-width: 100vw;
  height: 600px;

  &:after {
    position: absolute;
    top: -20vh;
    left: 0;
    bottom: 0;
    width: 100vw;
    min-width: 100vw;
    min-height: 120vh;
    height: 120vh;
    content: '';
    z-index: 1;
    background-image: linear-gradient(
      180deg,
      rgba(0, 0, 0, 0),
      rgba(0, 0, 0, 0.4) 30%,
      rgba(0, 0, 0, 0.6) 50%,
      rgba(0, 0, 0, 0.7) 80%,
      rgba(0, 0, 0, 1) 120%
    );
  }
`

const Image = styled.img`
  object-fit: cover;
  position: fixed;
  z-index: -1;
  top: -10vh;
  left: 0;
  right: 0;
  min-height: 100%;
  max-width: 100vw;
`

const Heading = styled.div`
  position: relative;
  width: 900px;
  margin-left: auto;
  margin-right: auto;
  bottom: -60%;
  padding: 1rem 1rem 5rem 1rem;

  h1 {
    color: white;
    font-size: 3rem;
  }
`

const Header = props => (
  <Frame>
    <AnimatePresence>
      <motion.div
        style={{
          position: `fixed`,
          minWidth: `100vw`,
          minHeight: `100%`,
        }}
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{
          duration: 1,
          delay: 0,
        }}>
        <motion.div
          style={{
            position: `fixed`,
            minWidth: `100vw`,
            minHeight: `100%`,
          }}
          initial={{ scale: 1 }}
          animate={{ scale: 1.4 }}
          transition={{ duration: 60, delay: 0 }}>
          <Fragment>
            <Image src={props.image && props.image.guid} width={`100%`} />
            <Label>{props.image && props.image.title}</Label>
          </Fragment>
        </motion.div>
      </motion.div>
    </AnimatePresence>
    <AnimatePresence>
      <Heading>
        <motion.div
          initial={{
            zIndex: `10`,
            position: `relative`,
            top: `5rem`,
          }}
          animate={{
            opacity: 1,
            top: 0,
          }}
          transition={{
            duration: 0.4,
            delay: 0.2,
          }}>
          <h1>{props.title}</h1>
        </motion.div>
      </Heading>
    </AnimatePresence>
  </Frame>
)

export default Header
