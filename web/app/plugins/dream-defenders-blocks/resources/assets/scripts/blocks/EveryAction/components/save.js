import { TextareaControl } from '@wordpress/components'
import { RawHTML } from '@wordpress/element'

const save = props => (
  <div className={`every-action-embed p-4 w-full bg-gray-100`}>
    <RawHTML>
      <TextareaControl.value value={embed} />
    </RawHTML>
  </div>
)

export default save