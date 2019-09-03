// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

import { Box } from 'rebass'

// display
import Container from './../../components/styled/container'
import Header from './../partials/headerPage'

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
        }
      }
    }
  }`)

  const campaign = data && data.campaigns && data.campaigns.nodes[0]

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
    </Box>
  ) : <div>Loading...</div>
}

export default Campaign
