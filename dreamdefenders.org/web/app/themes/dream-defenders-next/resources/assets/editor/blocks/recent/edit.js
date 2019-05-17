import { Component } from '@wordpress/element'
import { select } from '@wordpress/data'

const TagsFragment = `
  fragment Tags on Post {
    tags {
      tagNodes: nodes {
        id
        name
      }
    }
  }
`

const RECENT_POSTS_QUERY = `
	query RecentPosts ($id:Int) {
		posts (where: {notIn: [$id] }) {
			nodes {
				id
				title
				date
				featuredImage {
					sourceUrl
				}
				author {
					firstName
					lastName
					avatar(size: 50) {
						avatarUrl: url
					}
				}
				...Tags
			}
		}
	}
	${TagsFragment}
`

const Tags = ({ tagNodes }) => {
  tagNodes && tagNodes.map(tag => (
    <div key={tag.id}>{tag.name}</div>
  ))
}

const PostCard = ({ node }) => {
  const {
    title,
    featuredImage: { sourceUrl },
    author: {
      avatar: { avatarUrl },
      firstName,
      lastName
    },
    date,
    tags: { tagNodes = [] }
  } = node;

  return (
    <div>
      <h2>{sourceUrl && <img src={sourceUrl} />} {title}</h2>
      <h4>{avatarUrl && <img src={avatarUrl} />} By {firstName} {lastName} | {date}</h4>
      <Tags tagNodes={tagNodes} />
    </div>
  );
};

const RenderPosts = ({posts}) => (
  <div>
    {posts.nodes.map(node => (
      <PostCard key={node.id} node={node} />
    ))}
  </div>
)

class Edit extends Component {
  constructor(props) {
    super(...props)
    console.log(props)
    this.state = {posts: null}
  }

  fetchPosts = async () => {
    const editor = select('core/editor')

    const response = await fetch('/graphql', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        query: RECENT_POSTS_QUERY,
        variables: {
          id: editor.getEditedPostAttribute('id')
        }
      })
    })

    return await response.json()
  }

  componentDidMount() {
    this.fetchPosts().then(response => {
      response.data && response.data.posts && (
        this.setState({ posts: response.data.posts })
      )
    })
  }

  render() {
    const { posts } = this.state

    return (!posts || !posts.nodes) ?
      ('Loading...') :
      <RenderPosts posts={this.state.posts} />
  }
}

export default Edit
