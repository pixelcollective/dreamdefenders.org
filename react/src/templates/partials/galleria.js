import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

import { media } from './../../graph/fragments'

const Header = props => {
  const { data } = useQuery(gql`${media.mediaDetails}
    {
      mediaItems(first: 10) {
        nodes {
          ...mediaDetails
          mediaType
          srcSet(size: THUMBNAIL)
        }
        pageInfo {
          endCursor
          hasNextPage
          hasPreviousPage
          startCursor
        }
        postTypeInfo {
          name
        }
      }
    }
  `)

  console.log(data)

  return data.mediaItems ? (
    data.mediaItems.nodes.map((item, id) => item.mediaDetails.meta.camera && <div key={id}>{item.mediaDetails.meta.camera}</div>)
  ) : <div>Loading..</div>
}

export default Header
