// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

import { motion } from 'framer-motion'

// routing
import { Link } from 'react-router-dom'

// rebass
import { Box, Text, Button } from 'rebass'

// react-parallax
import { Parallax, Background } from 'react-parallax'

// components
import theme from '../../theme/material'
import Grid from '../../components/styled'

/**
 * Template: Freedom Papers
 */
const FreedomPapers = props => {
  const [active, setActive] = React.useState(``)

  const { data } = useQuery(gql`
    {
      freedomPapers {
        nodes {
          title
          slug
          freedomPapers {
            freedomPaper {
              image {
                guid
              }
              content
            }
          }
        }
      }
    }
  `)

  return (
    <Box>
      <Grid maxWidth={[`100vw`]} width={[`100vw`]}>
        {data && data.freedomPapers.nodes && data.freedomPapers.nodes.map(({ title, slug, freedomPapers: {
          freedomPaper: {
            content,
            image,
          }
        }}, i) => (
          <Box key={`freedomPaper_${i}`} style={{
            position: `relative`,
            overflow: `hidden`,
          }}>
            <motion.div
              initial={{
                opacity: 0,
                zIndex: 1,
                overflow: `hidden`,
                backgroundColor: `rgba(40, 156, 255, 0.95)`,
              }}
                animate={(active === `freedomPaper_${i}`) ? {
                  opacity: 1,
                  maxHeight: `100vh`,
                  minWidth: `100vw`,
                  position: `fixed`,
                  left: 0,
                  right: 0,
                  bottom: 0,
                  zIndex: 100,
                  paddingTop: `20%`,
                  transformOrigin: `center`,
                  overflowY: `scroll`,
                } : (active === ``) ? {
                  position: `relative`,
                  maxHeight: `50vh`,
                  paddingTop: 0,
                  opacity: 1,
                  overflowY: `hidden`,
                } : {
                    paddingTop: 0,
                    opacity: 0,
                    position: `absolute`,
                    overflowY: `hidden`,
                    perspective: Math.floor(Math.random() * 16) + 5,
                  }}
              transition={{ duration: 0.2 }}>
              <motion.img
                src={image.guid}
                initial={{
                  position: (active===`freedomPaper_${i}`) ? `fixed` : `absolute`,
                  zIndex: -100,
                  maxHeight: `100vh`,
                  overflowY: (active===`freedomPaper_${i}`) ? `hidden` : `hidden`,
                }}
                animate={{
                  scale: (active===`freedomPaper_${i}`) ? 1 : 1.8,
                  width: (active===`freedomPaper_${i}`) ? `100vw` : `100vw`,
                }}
                transition={{
                  type: (active===`freedomPaper_${i}`) && `spring`,
                  stiffness: 80,
                  duration: (active===`freedomPaper_${i}`) ? 0.2 : 30,
                }} />
              <motion.div
                key={`freedomPaper_${i}`}
                onTap={!(active === `freedomPaper_${i}`) ? () => setActive(`freedomPaper_${i}`) : () => setActive(``)}
                initial={{
                  opacity: 0,
                  minHeight: `100%`,
                  backgroundColor: `rgba(0, 0, 0, 0.7)`,
                  height: (active===`freedomPaper_${i}`) ? `100%` : `100vh`,
                  scale: 1,
                  zIndex: 1,
                  color: `white`,
                }}
                animate={(active===`freedomPaper_${i}`) ? {
                  maxHeight: `none`,
                  height: `auto`,
                  top: `-10%`,
                  backgroundColor: `rgba(40, 156, 255, 0.95)`,
                } : {
                  maxHeight: `none`,
                  opacity: 1,
                  top: 0,
                  backgroundColor: `rgba(0, 0, 0, 0.7)`,
                }}
                whileHover={{
                  backgroundColor: `rgba(40, 156, 255, 0.95)`,
                  color: theme.palette.primary[`900`],
                }}
                transition={{ duration: 0.2 }}>
                  <Box key={`freedomPaper_${i}`} maxHeight={`100vh`} height={`100vh`}>
                  <Text
                    display={`inline-block`}
                    my={(active===`freedomPaper_${i}`) ? [5] : [5]}
                    mx={(active===`freedomPaper_${i}`) ? [5] : [5]}
                    lineHeight={[1]}
                    maxWidth={(active===`freedomPaper_${i}`) ? [`60%`] : [`80%`]}
                    fontSize={[6]}
                    position={`relative`}
                    fontWeight={[`800`]}>
                    <motion.div>
                      <motion.div
                        className="box"
                        initial={{
                          scale: (active === `freedomPaper_${i}`) ? 0.8 : 1,
                        }}
                        transition={{
                          type: `spring`,
                          stiffness: 10,
                          duration: 10,
                        }}>
                        {title}
                      </motion.div>
                      <motion.div
                        initial={{
                          visibility: `hidden`,
                          opacity: `0`,
                          zIndex:1000,
                          position: `relative`,
                          top: (active === `freedomPaper_${i}`) ? `10%` : `5%`,
                          fontSize: `16px`,
                          color: `white`,
                        }}
                        animate={{
                          opacity: (active===`freedomPaper_${i}`) ? 1 : 0,
                          visibility: (active === `freedomPaper_${i}`) ? `visible` : `hidden`,
                        }}
                        transition={{
                          type: `spring`,
                          duration: 0.2,
                          delay: (active===`freedomPaper_${i}`) ? 0.6 : 0,
                        }}
                        dangerouslySetInnerHTML={{
                          __html: content
                        }} />
                      <motion.div
                        initial={{
                          opacity: 0,
                          position: `relative`,
                          fontSize: `16px`,
                          color: `white`,
                          paddingTop: `1em`,
                        }}
                        animate={{
                          opacity: (active===`freedomPaper_${i}`) ? 1 : 0,
                          top: `40%`,
                        }}
                        transition={{
                          type: `spring`,
                          duration: 0.2,
                          delay: (active===`freedomPaper_${i}`) ? 0.6 : 0
                        }}>
                        <motion.div
                          whileHover={{
                            scale: 1.02,
                            boxShadow: `0px 0px 5px 10px rgba(0, 0, 0, 0.07)`,
                          }}
                          whileTap={{ scale: 0.98 }}
                          initial={{
                            transformOrigin: `center`,
                            display: `inline`
                          }}>
                          <Button backgroundColor={theme.palette.primary[`900`]} fontSize={[2]}>
                            <Link to={`/freedom-papers/${slug}`} style={{
                              color: `black`,
                              fontSize: `1em`,
                              cursor: `pointer`,
                              textDecoration: `none`,
                              position: `relative`,
                              overflow: `hidden`
                            }}>
                              Find out more
                            </Link>
                          </Button>
                          <Button
                            style={{
                              fontSize: `1em`,
                              cursor: `pointer`,
                              textDecoration: `none`,
                              position: `relative`,
                              overflow: `hidden`
                            }}
                            ml={[2]}
                            color={`black`}
                            backgroundColor={`white`}
                            fontSize={[2]}>
                            <motion.div onTapEnd={() => setActive(``)}>
                              Return to projects
                            </motion.div>
                        </Button>
                        </motion.div>
                      </motion.div>
                    </motion.div>
                  </Text>
                </Box>
              </motion.div>
            </motion.div>
          </Box>
        ))}
      </Grid>
    </Box>
  )
}

export { FreedomPapers }
