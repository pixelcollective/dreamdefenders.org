/** @wordpress */
import { __ } from '@wordpress/i18n'
import {
  useCallback,
  useEffect,
} from '@wordpress/element'
import { useSelect } from '@wordpress/data'
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
import { isEqual } from 'lodash'
import chroma from 'chroma-js'
import { css } from '@emotion/core'

/** @tinypixelco components */
import BackgroundPanel from './panels/BackgroundPanel'

/** @tinypixelco hooks */
import usePost from '../../../hooks/usePost'

/**
 * Edit: @tinypixelco/banner
 */
const edit = ({
  attributes,
  setAttributes,
  className,
  isSelected,
}) => {
  const { setPost } = usePost()
  const themeColors = useSelect(select => {
    return select('core/editor').getEditorSettings().colors
  })

  const {
    background,
    containerSize,
    title,
    classes,
    overlay,
  } = attributes

  useEffect(() => {
    ! isEqual(classes, className)
      && setAttributes({ classes: className })
  }, [className])

  const onTitle = useCallback(title => {
    setAttributes({ title })
    setPost({ title })
  })

  const onBackgroundMedia = media => {
    setAttributes({
      background: {
        ...background,
        media,
      },
    });
  }

  const onBackgroundPosition = position => {
    setAttributes({
      background: {
        ...background,
        position,
      },
    });
  }

  const onBackgroundScale = scale => {
    setAttributes({
      background: {
        ...background,
        scale,
      },
    });
  }

  const onBackgroundAttachment = attachment => {
    setAttributes({
      background: {
        ...background,
        attachment,
      },
    });
  };

  const onBackgroundSize = size => {
    setAttributes({
      background: {
        ...background,
        size,
      }
    });
  }

  const onContainerResize = (event, direction, elt, delta) => {
    setAttributes({
      containerSize: {
        height: parseInt(containerSize.height + delta.height, 10),
      },
    });
  }

  const onOverlayColor = color => {
    setAttributes({
      overlay: {
        raw: color,
        opacity: overlay.opacity,
        rendered: chroma(color).alpha(overlay.opacity * 0.1).css('rgba'),
      }
    });
  }

  const onOverlayOpacity = opacity => {
    setAttributes({
      overlay: {
        raw: overlay.raw,
        opacity,
        rendered: chroma(overlay.raw).alpha(opacity * 0.1).css('rgba'),
      }
    });
  }

  const editorClasses = {
    overlay: classnames([
      "p-4",
      "w-full",
      "h-full",
      "w-full",
      "flex",
      "flex-wrap",
      "content-center"
    ]),
    heading: classnames([
      "w-full",
      "text-center",
      "font-display",
      "text-7xl",
      "inline-block",
      "uppercase",
      "font-bold",
      "break-all",
      "text-white"
    ]),
  };

  console.log(overlay);

  return (
    <>
      <InspectorControls>
        <BackgroundPanel
          themeColors={themeColors}
          background={background}
          overlay={overlay}
          onBackgroundAttachment={onBackgroundAttachment}
          onBackgroundPosition={onBackgroundPosition}
          onBackgroundMedia={onBackgroundMedia}
          onBackgroundSize={onBackgroundSize}
          onBackgroundScale={onBackgroundScale}
          onOverlayColor={onOverlayColor}
          onOverlayOpacity={onOverlayOpacity} />
      </InspectorControls>

      <div className={className}>
        <ResizableBox
          className={`flex flex-col content-center relative`}
          showHandle={isSelected}
          enable={{
            bottom: true,
            top: false,
            left: false,
            right: false,
            topRight: false,
            topLeft: false,
            bottomRight: false,
            bottomLeft: false
          }}
          size={containerSize ? containerSize : `500px`}
          onResizeStop={onContainerResize}>
          <div css={css`
            overflow: hidden;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            position: absolute;
          `}>
            <div
              className={`h-full w-full relative top-0 left-0 right-0 bottom-0 w-full flex flex-wrap content-center`}
              style={{
                backgroundImage: `url(${background.media ? background.media.url : null})`,
                backgroundColor: ! background.media && `rgba(0, 0, 0, 0.2)`,
                backgroundSize: background.size ? background.size : `cover`,
                backgroundAttachment: background.attachment ? background.attachment : `initial`,
                backgroundPosition: background.position ? `${background.position.x * 100}% ${background.position.y * 100}%` : `50% 50%`,
                transform: `scale(${background.scale ? background.scale * 0.01 : 1})`,
                backgroundRepeat: `no-repeat`,
              }} />
          </div>

          <div className={editorClasses.overlay} css={css`
            background-color: ${overlay.rendered};
          `}>
            <RichText
              className={editorClasses.heading}
              placeholder={__(`Post Title...`, `tiny-pixel`)}
              value={title}
              allowedFormats={[]}
              onChange={onTitle} />

            <MediaUploadCheck>
              <MediaUpload
                onSelect={onBackgroundMedia}
                multiple={false}
                value={background.media && background.media.id}
                render={({ open }) => (
                  <div className={classnames(["w-full", "text-center"])}>
                    <Button className={`button`} onClick={open}>
                      {background.media ? __("Replace", "tiny-pixel") : __("Add", "tiny-pixel")} Banner image
                    </Button>
                  </div>
                )} />
            </MediaUploadCheck>
          </div>
        </ResizableBox>
      </div>
    </>
  );
}

export default edit
