/** @wordpress */
import { __ } from '@wordpress/i18n'
import { MediaUpload } from '@wordpress/block-editor'
import {
  RadioControl,
  FocalPointPicker,
  PanelBody,
} from '@wordpress/components'

/**
 * Background image panel
 */
export default ({
  media,
  onMedia,
  focal,
  onFocal,
  backgroundStyle,
  onBackgroundStyle,
}) => (
  <>
    <PanelBody title={__('Background media', 'tiny-pixel')}>
      <MediaUpload
        label={__('Background media', 'tiny-pixel')}
        value={media && media.url}
        onSelect={onMedia}
        render={({ open }) => (
          <>
            <div className={`mb-2 w-full`}>
              {! media ? 'Select' : 'Change'} background media
            </div>

            <button className="primary button button-primary" onClick={open}>
              { ! media
                ? __('Select media', 'tiny-pixel')
                : __('Change media', 'tiny-pixel') }
            </button>
          </>
        )} />
    </PanelBody>

    { media && (
      <>
        <PanelBody title={__('Background position', 'tiny-pixel')}>
          <FocalPointPicker
            label={__('Select background focus', 'tiny-pixel')}
            url={media.thumb ? media.thumb.src : media.url}
            value={focal}
            onChange={onFocal}
            dimensions={{
              width: media.width,
              height: media.height,
            }} />
        </PanelBody>

        <PanelBody title={__('Background style', 'tiny-pixel')}>
          <RadioControl
            label="Background style"
            options={[
              { label: 'Cover', value: 'cover' },
              { label: 'Fixed', value: 'fixed' },
            ]}
            selected={ backgroundStyle }
            onChange={ onBackgroundStyle } />
        </PanelBody>
      </>
    )}
  </>
)
