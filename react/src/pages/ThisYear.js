// react
import React, { Fragment } from 'react'

// styled
import styled from 'styled-components'

// motion
import { motion } from 'framer-motion'

// theme
import theme from './../theme/material'

const container = {
  show: {
    transition: {
      staggerChildren: 0.2,
    },
  },
}

const item = {
  hidden: { opacity: 0.1 },
  show: { opacity: 1 },
}

const Shade = styled(motion.div)`
  borderRadius: 10px;
  color: rgba(255, 255, 255, 1);
  textAlign: center;
  height: calc(100vh - 120px);
  position: relative;
  transition: all 50s ease-in-out;
  position: relative;
  width: 98vw;
  margin-left: auto;

  :hover {
    background: rgba(134, 211, 255, 1);
    transition: all 50s ease-in-out;
  }

  > div {
    padding: 0rem 2rem;

    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.05);
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #fde135;
      border-radius: 10px;
      transition: all 0.2s ease-in-out;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #52c0ff;
      transition: all 0.2s ease-in-out;
    }
  }
`

const Line = styled(motion.div)`
  display: block;
  font-size: 1.75rem;
  padding-top: 0.15rem;
  letter-spacing: 0.2ch;
  text-align: left;

  span {
    display: inline;
    background: black;
    transition: background 0.2s ease-in-out;

    :hover {
      color: rgba(255, 255, 255, 1);
      background: ${theme.palette.secondary[900]};
      transition: background 0.2s ease-in-out;
    }
  }
`

const Stanza = ({lines}) => {
  return (
    <Shade
      initial={`hidden`}
      animate={`show`}
      variants={container}>
      <motion.div
        style={{
          height: `100%`,
          overflowY: `scroll`,
          overflowX: `hidden`,
          padding: `2rem 0rem 2rem 2rem`,
        }}>
        {lines.map((line, i) => (
          <Fragment>
            <Line variants={item}>
              <span dangerouslySetInnerHTML={{
                __html: line,
              }} />
            </Line>
          </Fragment>
        ))}
      </motion.div>
    </Shade>
  )
}

/**
 * Exports
 */
const ThisYear = () => (
  <Stanza lines={[
    `&nbsp;This is the year that rent freezes, <br />`,
    `&nbsp;That no family faces eviction <br />`,
    `&nbsp;To make way for a new highway or <br />`,
    `&nbsp;high rise <br />`,
    `&nbsp;or coffee shop <br />`,
    `&nbsp;or parking lot. <br />`,
    `<br />`,
    `&nbsp;This is the year, <br />`,
    `&nbsp;That governments call emergency sessions, <br />`,
    `&nbsp;threaten filibusters <br />`,
    `&nbsp;or government shutdown <br />`,
    `&nbsp;If opponents refuse <br />`,
    `&nbsp;multi billion dollar bailout packages <br />`,
    `&nbsp;For single mothers. <br />`,
    `<br />`,
    `&nbsp;This is the year four time felons, <br />`,
    `&nbsp;Found guilty of falling in traps, <br />`,
    `&nbsp;are found running in Miami, <br />`,
    `&nbsp;and running in Pahokee, <br />`,
    `&nbsp;and running in Duval, <br />`,
    `&nbsp;For Senate, and Mayor, and Governor. <br />`,
    `<br />`,
    `&nbsp;This is the year abuelas and granns, made maids <br />`,
    `&nbsp;Rise at dawn, <br />`,
    `&nbsp;Pack blankets, <br />`,
    `&nbsp;Make meals, <br />`,
    `&nbsp;Board buses to beaches, <br />`,
    `&nbsp;To bathe, bask, laugh <br />`,
    `&nbsp;In suns once served under. <br />`,
    `<br />`,
    `&nbsp;If our liberation began with the vision of a world without <br />`,
    `&nbsp;the colony, slum, favela, and ghetto; <br />`,
    `&nbsp;then this is the year. <br />`,
    `&nbsp;So let every one of us; <br />`,
    `&nbsp;Hungry, tired, yet undefeated, <br />`,
    `&nbsp;Lasso a new north star <br />`,
    `&nbsp;And study war no more. <br />`,
  ]} />
)

export default ThisYear
