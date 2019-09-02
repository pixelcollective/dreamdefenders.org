// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

import {
  Box,
  Text,
} from 'rebass'

import theme from './../../theme/material'

// display
import Container from './../../components/styled/container'
import Header from './../partials/headerPage'
import Error from '../../components/Error'

/**
 * Template: Campaign
 */
const Campaign = ({ match }) => {
  const { data } = useQuery(gql`{
    campaigns(where: {name: "${match.params.slug}"}) {
      nodes {
        title
        campaign {
          description
          image {
            guid
          }
          chapter {
            ... on Chapter {
              title
              chapter {
                image {
                  guid
                }
              }
            }
          }
        }
      }
    }
  }`)
  console.log(data)
  if (data && data.campaigns && data.campaigns.nodes <= 0) {
    return <Error />
  }

  const campaign = data && data.campaigns && data.campaigns.nodes[0]
  const chapters = campaign && campaign.campaign.chapter

  return campaign ? (
    <Box maxWidth={[`100vw`]}>
      <Header
        title={campaign.title && campaign.title}
        image={campaign.campaign.image && campaign.campaign.image} />
      <Box backgroundColor={`white`} py={[4]} my={[0]}>
        <Container>
          <Box dangerouslySetInnerHTML={{
            __html: campaign.campaign.description &&
              campaign.campaign.description
          }} />
        </Container>
      </Box>
      <Box
        color={`white`}
        backgroundColor={
          theme.palette.secondary[`900`]
        }
        my={[0]}
        width={`100vw`}
        py={[4]}
        display={`inline-block`}>
        <Container>
          <Box>
            <h2>Chapters</h2>
            {chapters.map((chapter, id) => (
              <Text id={id}>{chapter.title}</Text>
            ))}
          </Box>
        </Container>
      </Box>
    </Box>
  ) : <div>Loading...</div>
}

export default Campaign
