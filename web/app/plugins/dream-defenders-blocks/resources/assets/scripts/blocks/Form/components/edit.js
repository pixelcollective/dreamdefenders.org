/** @wordpress */
import { __ } from '@wordpress/i18n'
import { InnerBlocks } from '@wordpress/block-editor'

const edit = ({ className }) => (
  <div className={className}>
    <InnerBlocks templateLock={false} />
  </div>
)

export default edit
