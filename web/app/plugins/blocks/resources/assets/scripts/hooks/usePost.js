import { useSelect, dispatch } from '@wordpress/data'

export default () => useSelect(select => select(`core/editor`).getCurrentPost())
