const content = {
  page: `
    fragment PageParts on Page {
      id
      title
      content
    }
  `,
}

const media = {
  mediaDetails: `
    fragment mediaDetails on MediaItem {
      mediaDetails {
        file
        width
        height
        meta {
          aperture
          camera
          caption
          credit
          createdTimestamp
          copyright
          focalLength
          iso
          keywords
          orientation
          shutterSpeed
          title
        }
        sizes {
          file
          height
          mimeType
          name
          sourceUrl
          width
        }
      }
    }
  `
}

export {
  content,
  media,
}
