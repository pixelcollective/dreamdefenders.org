import { dispatch, useSelect } from '@wordpress/data'

const postFallback = () => ({
  title: `Loading..`,
  date: null,
  media: {
    id: null,
  },
})

/**
 * usePost hooks
 */
export default () => {
  const { post = postFallback } = useSelect(select => {
    return {
      post: select(`core/editor`).getCurrentPost(),
      title: select(`core/editor`).getCurrentPost().title
    }
  })

  const setPost = post => {
    return dispatch(`core/editor`).editPost({ ...post })
  }

  return { post, setPost }
}
