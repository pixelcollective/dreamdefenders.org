// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// Styled
import styled from 'styled-components'

/**
 * Query graph.
 */
const pageQuery = gql`
  query($first: Int, $where: RootQueryToPageConnectionWhereArgs!) {
    pages(first: $first, where: $where) {
      edges {
        node {
          id
          title
          content
        }
      }
    }
  }
`

/**
 * Components
 */
const PageContent = styled.div``

/**
 * Exports
 */
const Page = ({ name: { name } }) => {
  const { error, data } = useQuery(pageQuery, {
    variables: {
      first: 1,
      where: {name}
    }
  })

  const postMarkup = ({content}) => (
    {__html: content}
  )

  return [
    data ? (data.pages.edges.map(({ node }) =>
      node && (
        <PageContent dangerouslySetInnerHTML={
          postMarkup(node)
        } />
      )
    )) :
    error ? (<p>Error...</p>) : (
      <p>Loading...</p>
    )
  ]
}

export default Page
