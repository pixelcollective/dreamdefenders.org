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

/**
 * Template: Campaigns Archive
 */
const Campaigns = props => {
  const [active, setActive] = React.useState(``);

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
    <Box style={{ marginTop: `54px` }}>
      <Grid maxWidth={[`100vw`]} width={[`100vw`]}>
        {nodes && nodes.map(({ title, slug, campaign: {
          description,
          image
        }}, i) => (
          <Box key={`campaign_${i}`} style={{
            position: `relative`,
            overflow: `hidden`,
          }}>
            <motion.div
              initial={{
                opacity: 0,
                zIndex: 1,
                overflow: `hidden`,
              }}
              animate={(active===`campaign_${i}`) ? {
                opacity: 1,
                width: `100vw`,
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
              } : (active===``) ? {
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
              }}
              transition={{ duration: 0.2 }}>
              <motion.img
                src={image.guid}
                initial={{
                  scale: 1,
                  width: `100vw`,
                  position: (active===`campaign_${i}`) ? `fixed` : `absolute`,
                  zIndex: -100,
                  objectFit: (active === `campaign_${i}`) ? `cover` : `cover`,
                  maxHeight: `100vh`,
                  overflowY: (active===`campaign_${i}`) ? `hidden` : `hidden`,
                }}
                animate={{
                  scale: (active===`campaign_${i}`) ? 1 : 1.8,
                  width: (active===`campaign_${i}`) ? `100vw` : `100%`,
                }}
                transition={{
                  type: (active===`campaign_${i}`) && `spring`,
                  stiffness: 80,
                  duration: (active===`campaign_${i}`) ? 0.2 : 30,
                }} />
              <motion.div
                key={`campaign_${i}`}
                onTap={!(active === `campaign_${i}`) ? () => setActive(`campaign_${i}`) : () => setActive(``)}
                initial={{
                  opacity: 0,
                  minHeight: `100%`,
                  backgroundColor: `rgba(0, 0, 0, 0.7)`,
                  height: (active===`campaign_${i}`) ? `100%` : `100vh`,
                  scale: 1,
                  zIndex: 1,
                  color: `white`,
                }}
                animate={(active===`campaign_${i}`) ? {
                  maxHeight: `none`,
                  height: `auto`,
                  width: `100vw`,
                  minWidth: `100vw`,
                  top: `-10%`,
                  opacity: 1,
                  backgroundColor: `rgba(40, 156, 255, 0.95)`,
                } : {
                  opacity: 1,
                  minWidth: `50vw`,
                }}
                whileHover={{
                  backgroundColor: `rgba(40, 156, 255, 0.95)`,
                  color: theme.palette.primary[`900`],
                  scale: 1.02,
                }}
                transition={{ duration: 0.2 }}>
                  <Box key={`campaign_${i}`} width={`80%`} maxHeight={`100vh`} height={`100vh`}>
                  <Text
                    display={`inline-block`}
                    my={(active===`campaign_${i}`) ? [5] : [5]}
                    mx={(active===`campaign_${i}`) ? [5] : [4]}
                    lineHeight={[1]}
                    maxWidth={(active===`campaign_${i}`) ? [`80%`] : [`60%`]}
                    fontSize={[8]}
                    fontWeight={[`800`]}>
                    <motion.div>
                      <motion.div
                        className="box"
                        initial={{
                          scale: 1,
                          position: `relative`,
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
                          zIndex:1000,
                          position: `relative`,
                          top: (active === `campaign_${i}`) ? `10%` : `5%`,
                          fontSize: `16px`,
                          color: `white`,
                        }}
                        animate={{
                          opacity: (active===`campaign_${i}`) ? 1 : 0,
                          top: `40%`,
                        }}
                        transition={{
                          type: `spring`,
                          duration: 0.2,
                          delay: (active===`campaign_${i}`) ? 0.6 : 0,
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
                          opacity: (active===`campaign_${i}`) ? 1 : 0,
                          top: `40%`,
                        }}
                        transition={{
                          type: `spring`,
                          duration: 0.2,
                          delay: (active===`campaign_${i}`) ? 0.6 : 0
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
                            <Link to={`/campaigns/${slug}`} style={{
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

export default Campaigns
