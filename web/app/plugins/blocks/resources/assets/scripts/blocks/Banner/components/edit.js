/** @wordpress */
import { __ } from '@wordpress/i18n'
import { useCallback } from '@wordpress/element'
import {
  Button,
  ResizableBox,
} from '@wordpress/components'
import {
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from '@wordpress/block-editor'

/** external */
import classnames from 'classnames'

/** @tinypixelco components */
import BackgroundPanel from './panels/BackgroundPanel'

/** @tinypixelco hooks */
import usePost from '../../../hooks/usePost'

/**
 * Edit: @tinypixelco/banner
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { setPost } = usePost()
  const { focal, media, title, backgroundStyle, containerSize } = attributes

  const onMedia = useCallback(media => {
    setAttributes({ media })
  })

  const onTitle = useCallback(title => {
    setAttributes({ title })
    setPost({ title })
  })

  const onFocal = focal => {
    setAttributes({ focal })
  }

  const onBackgroundStyle = backgroundStyle => {
    setAttributes({ backgroundStyle })
  }

  const onContainerResize = (event, direction, elt, delta) => {
    setAttributes({
      containerSize: {
        height: parseInt(containerSize.height + delta.height, 10),
      },
    });
	}

  return (
    <>
      <InspectorControls>
        <BackgroundPanel
          focal={focal}
          onFocal={onFocal}
          media={media}
          onMedia={onMedia}
          backgroundStyle={backgroundStyle}
          onBackgroundStyle={onBackgroundStyle} />
      </InspectorControls>

      <div className={className}>
        <ResizableBox
          className={`flex flex-col content-center`}
          showHandle={isSelected}
          enable={{
            top: false,
            bottom: true,
            left: false,
            right: false,
            topRight: false,
            topLeft: false,
            bottomRight: false,
            bottomLeft: false,
          }}
          size={containerSize}
          onResizeStop={onContainerResize}>
          <div className={`w-full flex flex-wrap content-center h-full relative`} style={{
            backgroundImage: `url(${media ? media.url : null})`,
            backgroundColor: ! media && `rgba(0, 0, 0, 0.2)`,
            backgroundSize: backgroundStyle == `cover` ? `cover` : `cover`,
            backgroundAttachment: backgroundStyle == `fixed` ? `fixed` : 'initial',
            backgroundPosition: focal ? `${focal.x * 100}% ${focal.y * 100}%` : `50% 50%`,
          }}>
            <div className={classnames([
              'p-4',
              'w-full',
              'h-full',
              'w-full',
              'flex',
              'flex-wrap',
              'content-center'
            ])}>
              <RichText
                className={classnames([
                  'w-full',
                  'text-center',
                  'font-display',
                  'text-5xl',
                  'inline-block',
                  'uppercase',
                  'font-bold',
                  'break-all',
                  'text-white',
                ])}
                placeholder={__(`Post Title...`, `tiny-pixel`)}
                value={title}
                allowedFormats={[]}
                onChange={onTitle} />

              <MediaUploadCheck>
                <MediaUpload
                  onSelect={onMedia}
                  multiple={false}
                  value={media && media.id}
                  render={({ open }) => (
                    <div className={classnames(['w-full', 'text-center'])}>
                      <Button className={`button`} onClick={open}>
                        { media
                          ? __('Replace', 'tiny-pixel')
                          : __('Add', 'tiny-pixel')
                        } Banner image
                      </Button>
                    </div>
                  )} />
              </MediaUploadCheck>
            </div>
          </div>
        </ResizableBox>
      </div>
    </>
  )
}

export default edit
