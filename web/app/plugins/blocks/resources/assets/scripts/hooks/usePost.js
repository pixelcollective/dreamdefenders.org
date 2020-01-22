import { dispatch, useSelect } from '@wordpress/data'

/**
 * usePost hooks
 */
export default () => {
  const { getEditedPostAttribute } = useSelect(select => select(`core/editor`))

  const post = useSelect(select => select(`core/editor`).getCurrentPost())
  const setPost = post => dispatch(`core/editor`).editPost(post)

  const title = getEditedPostAttribute(`title`)
  const setTitle = title => dispatch(`core/editor`).editPost({title})

  return { post, setPost, title, setTitle }
}
