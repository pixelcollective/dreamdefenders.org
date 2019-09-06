// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

import Grid from './../../components/styled'
import { Box, Image } from 'rebass'

// display
import Header from '../partials/headerPage'

/**
 * Template: FredomPaper
 */
const FreedomPaper = ({ match }) => {
  const { data } = useQuery(gql`
    {
      freedomPapers(where: {name: "${match.params.slug}"}) {
        nodes {
          title
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

  const content  = data && data.freedomPapers && data.freedomPapers.nodes[0]
  const freedomPaper = content && content.freedomPapers.freedomPaper

  return freedomPaper ? (
    <Box maxWidth={[`100vw`]}>
      <Header
        title={content.title && `Early draft template: ${content.title}`}
        image={freedomPaper.image && freedomPaper.image} />
      <Box backgroundColor={`white`} py={[4]} my={[0]}>
        <Grid>
          <Box px={[3]}>
            <Image width={`100%`} height={`auto`} maxWidth={`100%`} src={
              freedomPaper.image && freedomPaper.image.guid
            } />
          </Box>
          <Box px={[4]} dangerouslySetInnerHTML={{
             __html: freedomPaper.content && freedomPaper.content
          }} />
        </Grid>
      </Box>
    </Box>
  ) : <div>Loading...</div>
}

export { FreedomPaper }
