// react
import React, { Fragment } from 'react'

// @material-ui
import ButtonBase from '@material-ui/core/ButtonBase'

// styled-components
import styled from 'styled-components'

// framer
import { motion, AnimatePresence } from 'framer-motion'

// vendors
import BackgroundImageOnLoad from 'background-image-on-load'

// components
import BottomNavBar from './BottomNavBar'

/**
 * Mock data.
 */
const app = {
  name: `Dream Defenders`,
  bottomNavOptions: [
    { label: `Item One`, url: `#1` },
    { label: `Item Two`, url: `#2` },
    { label: `Item Three`, url: `#3` },
    { label: `Item Four`, url: `#4` },
  ],
}

/**
 * Provides background and scrim wrapper.
 */
const Canvas = props => {
 const Ripple = styled(ButtonBase)`
    cursor: none;
    color: rgba(255, 255, 255, 0.2);
    width: 100vw;
    height: 100vh;
    position: relative;
    top: 0;
    left: 0;
    z-index: -1;
  `
 const Background = styled(motion.div)`
    background-size: cover;
    height: 100vh;
    cursor: none;
    background-image: url(${props.backgroundLoaded && `
      https://source.unsplash.com/random/1600x1200
    `});
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
    opacity: 0;
    transition: opacity 1s ease-in-out;
  `

 return (
  <Fragment>
   <BackgroundImageOnLoad
    src={'https://source.unsplash.com/random/1600x1200'}
    onLoadBg={props.onBackgroundLoad} />

    {props.backgroundLoaded && (
      <AnimatePresence>
        <Background>
          <Scrim
            animate={{background: `rgba(253, 230, 83, 0.4)`}}
            transition={{duration: `1`, delay: `1`}}>
            <Content
              style={{width: `100vw`, height: `100vh`}}
              animate={{opacity: `1`}}
              transition={{duration: `5`, delay: `2`}}>
              {props.children}
              <BottomNavBar items={app.bottomNavOptions} />
            </Content>
          </Scrim>
        </Background>
      </AnimatePresence>
    )}
  </Fragment>
 )
}

export default Canvas
