// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// functional
import { content } from './../../graph/fragments'

// display
import Header from './../partials/headerPage'
import PageContent from './../partials/contentPage'
import Error from '../../components/Error'

/**
 * Template: Page
 */
const Page = ({match}) => {
  const { data } = useQuery(gql`${content.page}
    {
      pages(where: {name: "${match.params.slug}"}) {
        edges {
          node {
            featuredImage {
              altText
              title
              guid
              srcSet
            }
            ...PageParts
          }
        }
      }
    }
  `)

  if(data && data.pages && data.pages.edges <= 0) {
    return <Error />
  }

  const page = data.pages && data.pages.edges[0].node

  return page ? (
    <div>
      <Header
        title={page.title && page.title}
        image={page.featuredImage && page.featuredImage} />
      <PageContent html={page && page.content} background={`white`} />
    </div>
  ) : <div>Loading...</div>
}

export default Page
