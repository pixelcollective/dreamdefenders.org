// react
import React from 'react'

// apollo
import { useQuery } from '@apollo/react-hooks'
import gql from 'graphql-tag'

// styled
import styled from 'styled-components'

// motion
import { motion } from 'framer-motion'

// components
import FlipPage from 'react-flip-page'

/**
 * Query graph.
 */
const freedomQuery = gql`
  {
    freedomPapers(where: {orderby: {
      field:MENU_ORDER,
      order:ASC
    }}) {
      edges {
        node {
          title
          freedomPapers {
            freedomPaper {
              content
              image {
                guid
                sourceUrl
                srcSet
              }
            }
          }
        }
      }
    }
  }
`

const FreedomPapers = props => {
  const { error, data } = useQuery(freedomQuery)

  const Book = styled(FlipPage)`
    position: relative;
    z-index: 0;
    width: 100vw;
    @media screen and (min-width: 640px) {
      height: 100%;
    }
  `

  const Page = styled.div`
    display: flex;
    @media screen and (min-width: 640px) {
      display: flex;
    }
  `

  const HyperText = styled.div`
    padding: 42px 32px 32px 32px;
    width: 50vw;
    border-right: 2px solid rgba(0, 0, 0, 0.1);
  `

  const Header = styled.div`
    display: flex;
    flex-direction: row;
    flex-grow: 1;
    justify-content: space-between;
    padding: 2em 1em 0em 1em;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
  `

  const PageNo = styled.div`
    display: inline-block;
    padding-top: 1.1em;
    color: rgba(0, 0, 0, 0.3);
    font-size: 1.6em;
    letter-spacing: 0.3ch;
  `

  const Heading = styled.h1`
    display: inline-block;
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 0.1ch;
  `

  const Text = styled(motion.div)`
    color: rgba(0, 0, 0, 0.8);
    margin-top: 2.5vh;
    position: relative;
    overflow-y: scroll;
    scroll: auto;
    height: 72vh;

    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.05);
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #fde135;
      border-radius: 10px;
      transition: all 0.2s ease-in-out;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #52c0ff;
      transition: all 0.2s ease-in-out;
    }

    p {
      display: block;
      font-size: 1em;
    }
  `

  const Image = styled.img`
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    max-width: 40%;
    max-height: 100vh;
    object-fit: contain;
  `

  return [
    <Book
      showSwipeHint
      flipOnTouch
      orientation={`horizontal`}
      width={`100%`}
      height={`100%`}>
      {data && data.freedomPapers && data.freedomPapers.edges ?
        data.freedomPapers.edges.map(({node:{
          title,
          freedomPapers:{freedomPaper:{image,content}}
        }}, i) => (
          <Page key={i}>
            <HyperText>
              <Header>
                <Heading>
                  {title}
                </Heading>
                <PageNo>
                  {`${++i}/${data.freedomPapers.edges.length}`}
                </PageNo>
              </Header>
              <Text style={{
                scrollBehavior: `smooth`,
              }}
              dangerouslySetInnerHTML={{
                __html: content,
              }} />
            </HyperText>
            <Image src={image.guid} />
          </Page>
        )) : error ? (
        <p>Error...</p>
      ) : (
        <p>Loading...</p>
      )} */}
    </Book>
  ]
}

export default FreedomPapers
