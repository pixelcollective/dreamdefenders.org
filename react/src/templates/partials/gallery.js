import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// graphql
import { media } from '../../graph/fragments'

/**
 * Gallery
 */
const Gallery = props => {
  const { data } = useQuery(gql`${media.mediaDetails} {
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
  }`)

  return data.mediaItems ? (data.mediaItems.nodes.map((item, id) => {
      const camera = item.mediaDetails.meta.camera

      return camera ? (<div key={id}>{camera}</div>) : null
  })) : <div>Loading..</div>
}

export default Gallery
