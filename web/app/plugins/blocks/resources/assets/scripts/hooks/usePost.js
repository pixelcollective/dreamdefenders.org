import { useSelect } from '@wordpress/data'

/**
 * usePostEditor
 */
export default () => {
  return useSelect(select => select(`core/editor`).getCurrentPost())
}
