/** @wordpress */
import { __ } from '@wordpress/i18n'
import { Button } from '@wordpress/components'
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor'
import { If } from 'react-extras'
import { Icon } from '@wordpress/components';

const TW_IMAGE_CLASSES = 'object-cover absolute w-full h-full p-2';

export default ({ media, item, onMedia, isSelected }) => {
  /**
   * Conditional true if media item is set.
   */
  const hasMediaItem =  media && media[`${item}`];

  /** Render */
  return (
    <div className="relative w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
      <MediaUploadCheck>
        <MediaUpload
          multiple={false}
          onSelect={image => onMedia(image, item)}
          value={hasMediaItem && media[`${item}`].id}
          render={({ open }) => (
            <>
              <If condition={! media || ! media[`${item}`]}>
                <div className={`w-full bg-primary py-16`}>
                  <Button isPrimary onClick={open} className={`block mx-auto text-center`}>
                    Add image
                  </Button>
                </div>
              </If>

              <If condition={hasMediaItem}>
                <img className={TW_IMAGE_CLASSES} style={{ height: `100%` }} src={hasMediaItem && media[`${item}`].url} />
              </If>

              <If condition={hasMediaItem && isSelected}>
                <Button isSecondary className={'absolute'}
                  style={{top: `1rem`, left: `1rem`}} onClick={open}>
                  <Icon icon={`format-image`} />
                </Button>
              </If>
            </>
          )} />
      </MediaUploadCheck>
    </div>
  )
}