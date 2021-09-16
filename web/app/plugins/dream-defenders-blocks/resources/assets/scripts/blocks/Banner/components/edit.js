/** @jsx jsx */

/** @wordpress */
import { __ } from "@wordpress/i18n";
import { useCallback, useEffect } from "@wordpress/element";
import { useSelect } from "@wordpress/data";
import { Button, ResizableBox } from "@wordpress/components";
import {
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from "@wordpress/block-editor";

/** external */
import classnames from "classnames";
import { isEqual } from "lodash";
import chroma from "chroma-js";
import css from "@emotion/css";
import { jsx } from "@emotion/react";

/** @tinypixelco components */
import BackgroundPanel from "./panels/BackgroundPanel";

/** @tinypixelco hooks */
import usePost from "../../../hooks/usePost";

const styles = {
  container: css`
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    position: absolute;
  `,
  background: (background) => css`
    ${styles.container}
    background-size: ${background.cover ? "cover" : ""};
    background-repeat: no-repeat;
    background-image: url(${background.media ? background.media.url : null});
    background-attachment: ${background.attachment
      ? background.attachment
      : `initial`};
    background-position: ${background.position
      ? `${background.position.x * 100}% ${background.position.y * 100}%`
      : `50% 50%`};
    transform: scale(${background.scale ? background.scale * 0.01 : 1});
  `,
};

const RESIZABLE_Y = {
  bottom: true,
  top: false,
  left: false,
  right: false,
  topRight: false,
  topLeft: false,
  bottomRight: false,
  bottomLeft: false,
};

/**
 * Edit: @tinypixelco/banner
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { setPost } = usePost();
  const themeColors = useSelect((select) => {
    return select("core/editor").getEditorSettings().colors;
  });

  const { background, containerSize, title, classes, overlay } = attributes;

  useEffect(() => {
    !isEqual(classes, className) && setAttributes({ classes: className });
  }, [className]);

  const onTitle = useCallback((title) => {
    setAttributes({ title });
    setPost({ title });
  });

  const onBackgroundMedia = (media) => {
    setAttributes({
      background: {
        ...background,
        media,
      },
    });
  };

  const onBackgroundPosition = (position) => {
    setAttributes({
      background: {
        ...background,
        position,
      },
    });
  };

  const onBackgroundScale = (scale) => {
    setAttributes({
      background: {
        ...background,
        scale,
      },
    });
  };

  const onBackgroundAttachment = (attachment) => {
    setAttributes({
      background: {
        ...background,
        attachment,
      },
    });
  };

  const onBackgroundSize = (size) => {
    setAttributes({
      background: {
        ...background,
        size,
      },
    });
  };

  const onContainerResize = (event, direction, elt, delta) => {
    setAttributes({
      containerSize: {
        height: parseInt(containerSize.height + delta.height, 10),
      },
    });
  };

  const onOverlayColor = (color) => {
    setAttributes({
      overlay: {
        raw: color,
        opacity: overlay.opacity,
        rendered: chroma(color)
          .alpha(overlay.opacity * 0.1)
          .css("rgba"),
      },
    });
  };

  const onOverlayOpacity = (opacity) => {
    setAttributes({
      overlay: {
        raw: overlay.raw,
        opacity,
        rendered: chroma(overlay.raw)
          .alpha(opacity * 0.1)
          .css("rgba"),
      },
    });
  };

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
          onOverlayOpacity={onOverlayOpacity}
        />
      </InspectorControls>

      <div className={className}>
        <ResizableBox
          className={`flex flex-col overflow-hidden content-center relative`}
          showHandle={isSelected}
          enable={RESIZABLE_Y}
          size={containerSize ? containerSize : `500px`}
          onResizeStop={onContainerResize}
        >
          <div
            className={classes.container}
            css={styles.background(background)}
          />
          <div
            className={classnames([
              "p-4",
              "w-full",
              "h-full",
              "flex",
              "flex-wrap",
              "content-center",
              "z-10",
              "relative",
            ])}
            css={css`
              background-color: ${overlay.rendered};
            `}
          >
            <RichText
              tagName="h1"
              className={`w-full text-center font-display text-6xl inline-block uppercase font-bold break-all text-white`}
              placeholder={__(`Post Title...`, `tiny-pixel`)}
              value={title}
              allowedFormats={[]}
              onChange={onTitle}
            />

            <MediaUploadCheck>
              <MediaUpload
                onSelect={onBackgroundMedia}
                multiple={false}
                value={background.media && background.media.id}
                render={({ open }) => (
                  <div className={classnames(["w-full", "text-center"])}>
                    <Button className={`button`} onClick={open}>
                      {background.media
                        ? __("Replace", "tiny-pixel")
                        : __("Add", "tiny-pixel")}{" "}
                      Banner image
                    </Button>
                  </div>
                )}
              />
            </MediaUploadCheck>
          </div>
        </ResizableBox>
      </div>
    </>
  );
};

export default edit;
