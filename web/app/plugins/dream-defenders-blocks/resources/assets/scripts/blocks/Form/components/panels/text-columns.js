/** @wordpress */
import { __ } from '@wordpress/i18n'
import { PanelBody, ToggleControl } from '@wordpress/components'

/**
 * Text Columns Panel
 */
export default ({ textColumns, onTextColumns }) => (
  <PanelBody title={__("Enable text columns", "tiny-pixel")}>
    <ToggleControl checked={textColumns} onChange={onTextColumns} />
  </PanelBody>
)
