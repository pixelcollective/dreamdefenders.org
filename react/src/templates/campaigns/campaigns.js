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

// components
import theme from './../../theme/material'
import Grid from './../../components/styled'

const Campaigns = props => {
  const [active, setActive] = React.useState(false);

  const {
    data: {
      campaigns: {
        nodes,
      },
    },
  } = useQuery(gql`{
    campaigns {
      nodes {
        title
        slug
        campaign {
          description
          image {
            guid
          }
        }
      }
    }
  }`)

  return (
    <div style={{ marginTop: `54px` }}>
      <Grid
        maxWidth={[`100vw`]}
        width={[`100vw`]}>
        {nodes && nodes.map(({
          title,
          slug,
          campaign: {
            description,
            image
          }
        }, i) => (
            <Box key={`campaign_${i}`}
              style={{
                position: `relative`,
                overflow: `hidden`
              }}>
              <motion.div
                initial={{
                  opacity: 0,
                  zIndex: 1,
                  maxHeight: active ? `100vh` : `40vh`,
                  overflow: active ? `scroll` : `hidden`,
                }}
                animate={{ opacity: 1 }}
                onHoverStart={() => setActive(true)}
                onHoverEnd={() => setActive(false)}
                whileHover={{
                  minHeight: `100%`,
                  width: `100vw`,
                  minWidth: `100vw`,
                  height: `100vh`,
                  maxHeight: `none`,
                  zIndex: 100,
                  position: active ? `fixed` : `relative`,
                  transformOrigin: `center`,
                  overflow: `hidden`,
                  left: 0,
                  top: 0,
                  right: 0,
                  bottom: 0,
                }}
                transition={{
                  duration: 0.2,
                }}>
                <motion.img
                  src={image.guid}
                  initial={{
                    scale: 1,
                    width: `100vw`,
                    height: `100%`,
                    position: active ? `fixed` : `absolute`,
                    zIndex: -100,
                    objectFit: `cover`,
                  }}
                  animate={{
                    scale: active ? 3 : 1.8,
                    width: active ? `100vw` : `100%`,
                  }}
                  transition={{
                    type: active && `spring`,
                    stiffness: 80,
                    duration: active ? 0.2 : 30,
                  }} />
                <motion.div
                  initial={{
                    opacity: 0,
                    minHeight: `100%`,
                    backgroundColor: `rgba(0, 0, 0, 0.7)`,
                    height: active ? `100vh` : `100vh`,
                    scale: 1,
                    zIndex: 1,
                    color: `white`,
                  }}
                  animate={{
                    opacity: 1,
                  }}
                  whileHover={{
                    backgroundColor: `rgba(40, 156, 255, 0.95)`,
                    color: theme.palette.primary[`900`],
                    minHeight: `100vh`,
                    minWidth: `100vw`,
                    scale: 1.1,
                  }}
                  transition={{
                    duration: 0.2,
                  }}>
                  <Box
                    my={[0]}
                    px={[5]}
                    height={[`100%`]}>
                    <Text
                      display={`inline-block`}
                      py={active ? [7] : [5]}
                      px={active ? [4] : [1]}
                      lineHeight={[1]}
                      maxWidth={[`80%`]}
                      fontSize={[8]}
                      fontWeight={[`800`]}>
                      <motion.div
                        drag="y"
                        dragConstraints={{y: 200}}
                        dragPropagation
                        dragElastic={0.2}>
                        <motion.div
                          className="box"
                          initial={{
                            scale: 1,
                            position: `relative`,
                            paddingTop: active ? `20vh` : 0,
                            top: active ? `-40vh` : `48px`,
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
                            opacity: 0,
                            position: `relative`,
                            top: `5%`,
                            fontSize: `16px`,
                            color: `white`,
                            paddingTop: `5em`,
                          }}
                          animate={{
                            opacity: active ? 1 : 0,
                            top: `40%`,
                          }}
                          transition={{
                            type: `spring`,
                            duration: 0.2,
                            delay: active ? 0.6 : 0,
                          }}
                          dangerouslySetInnerHTML={{
                            __html: description
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
                            opacity: active ? 1 : 0,
                            top: `40%`,
                          }}
                          transition={{
                            type: `spring`,
                            duration: 0.2,
                            delay: active ? 0.6 : 0
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
                            <Button
                              backgroundColor={theme.palette.primary[`900`]}
                              fontSize={[2]}>
                              <Link
                                key={`campaign_${i}`}
                                to={`/campaigns/${slug}`}
                                style={{
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
    </div>
  )
}

export default Campaigns
