import { dispatch, useSelect } from "@wordpress/data";

const postFallback = () => ({
  title: `Loading..`,
  date: null,
  media: {
    id: null,
  },
});

/**
 * usePost hooks
 */
export default () => {
  const { post = postFallback } = useSelect((select) => {
    const post = select(`core/editor`)?.getCurrentPost();

    return {
      post: post ?? null,
      title: post?.title ?? "",
    };
  });

  const setPost = (post) => {
    return dispatch(`core/editor`).editPost({ ...post });
  };

  return { post, setPost };
};
