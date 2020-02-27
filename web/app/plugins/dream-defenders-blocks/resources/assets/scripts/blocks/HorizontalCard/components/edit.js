// @wordpress
import { __ } from '@wordpress/i18n'
import { Button } from '@wordpress/components'
import {
  MediaUpload,
  MediaUploadCheck,
  InnerBlocks,
} from '@wordpress/block-editor'

const edit = ({ attributes: { media }, className, isSelected, setAttributes }) => {
  const onMedia = media => setAttributes({ media })

  return (
    <div className={className}>
      <div className={`flex flex-col md:flex-row w-full`}>
        <div className={'flex flex-col w-full md:w-1/2'}>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={onMedia}
              multiple={false}
              value={media && media.id}
              render={({ open }) => (
                <div>
                  {media && (
                    <img className={'pr-0 md:pr-4'} src={media.url} />
                  )}

                  {isSelected && (
                    <Button
                      className={'button'}
                      onClick={open}>
                      {media ? 'Replace' : 'Add'} featured image
                    </Button>
                  )}
                </div>
              )} />
          </MediaUploadCheck>
        </div>

        <div className={'w-full md:w-1/2 flex-col'}>
          <InnerBlocks />
        </div>
      </div>
    </div>
  )
}

export { edit }
