import React, { Component } from 'react'
import { ApolloClient } from 'apollo-client'
import { ApolloProvider } from 'react-apollo'
import { withClientState } from 'apollo-link-state'
import { InMemoryCache } from 'apollo-cache-inmemory'
import { persistCache } from 'apollo-cache-persist'
import { ApolloLink } from 'apollo-link'
import { HttpLink } from 'apollo-link-http'
import { onError } from 'apollo-link-error'

const server  = `https://data.dreamdefenders.tinypixel.dev/graphql`,
      cache   = new InMemoryCache(),
      storage = window.localStorage

class GraphQLProvider extends Component {
  constructor() {
    super()

    this.state = {
      client: {},
      loaded: false,
    }
  }

  async componentDidMount() {
    const client  = new ApolloClient({
      link: ApolloLink.from([
        onError(({ graphQLErrors, networkError }) => {
          if (graphQLErrors) {
            console.log(graphQLErrors)
          }

          if (networkError) {
            console.log(networkError)
          }
        }),
        withClientState({
          defaults: {
            isConnected: false,
          },
          resolvers: {
            Mutation: {
              updateNetworkStatus: (_, { isConnected }, { cache }) => {
                cache.writeData({ data: { isConnected } })
                return null
              },
            },
          },
          cache,
        }),
        new HttpLink({
          uri: server
        })
      ]),
      cache,
    })

    try {
      await persistCache({cache, storage })
    } catch (err) {
      console.error('Error restoring Apollo cache', err)
    }

    this.setState({
      client: client,
      loaded: true
    })
  }

  render() {
    const { client, loaded } = this.state

    return !loaded ? (
      <div>Loading...</div>
    ) : (
      <ApolloProvider client={client}>
        {this.props.children}
      </ApolloProvider>
    )
  }
}

export default GraphQLProvider
