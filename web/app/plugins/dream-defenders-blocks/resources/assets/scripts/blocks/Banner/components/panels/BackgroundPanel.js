/** @wordpress */
import { __ } from "@wordpress/i18n";
import { MediaUpload } from "@wordpress/block-editor";
import {
  ColorPalette,
  RadioControl,
  FocalPointPicker,
  PanelBody,
  RangeControl,
} from "@wordpress/components";

/** external */
import { css } from "@emotion/core";

/**
 * Background image panel
 */
export default ({
  background,
  themeColors,
  overlay,
  onBackgroundPosition,
  onBackgroundMedia,
  onBackgroundAttachment,
  onBackgroundSize,
  onBackgroundScale,
  onOverlayColor,
  onOverlayOpacity,
}) => (
  <>
    <PanelBody title={__("Background media", "tiny-pixel")}>
      <MediaUpload
        label={__("Background media", "tiny-pixel")}
        value={background.media && background.media.url}
        onSelect={onBackgroundMedia}
        render={({ open }) => (
          <>
            <div className={`mb-2 w-full`}>
              {!background.media ? "Select" : "Change"} background media
            </div>

            <button className="primary button button-primary" onClick={open}>
              {!background.media
                ? __("Select media", "tiny-pixel")
                : __("Change media", "tiny-pixel")}
            </button>
          </>
        )}
      />
    </PanelBody>

    {background.media && (
      <>
        <PanelBody title={__("Background position", "tiny-pixel")}>
          <FocalPointPicker
            label={__("Select background focus", "tiny-pixel")}
            url={
              background.media.thumb
                ? background.media.thumb.src
                : background.media.url
            }
            value={background.position}
            onChange={onBackgroundPosition}
            dimensions={{
              width: background.media.width,
              height: background.media.height,
            }}
          />
        </PanelBody>

        <PanelBody title={__("Background style", "tiny-pixel")}>
          <RadioControl
            label="Background size"
            options={[
              { label: "Cover", value: "cover" },
              { label: "Manual", value: "manual" },
            ]}
            selected={background.size}
            onChange={onBackgroundSize}
          />

          {background.size == `manual` && (
            <RangeControl
              label={__("Background scale", "tiny-pixel")}
              value={background.scale}
              onChange={onBackgroundScale}
              min={1}
              max={300}
              afterIcon={`search`}
            />
          )}

          <RadioControl
            label={__("Background attachment", "tiny-pixel")}
            options={[
              { label: "Default", value: "default" },
              { label: "Fixed", value: "fixed" },
            ]}
            selected={background.attachment}
            onChange={onBackgroundAttachment}
          />
        </PanelBody>

        <PanelBody title={__("Overlay settings", "tiny-pixel")}>
          <ColorPalette
            label={__("Overlay color", "tiny-pixel")}
            value={overlay.raw}
            onChange={onOverlayColor}
            colors={themeColors}
          />

          <RangeControl
            label={__("Overlay transparency", "tiny-pixel")}
            value={overlay.opacity}
            onChange={onOverlayOpacity}
            min={0}
            max={10}
            afterIcon={overlay.opacity > 0 ? `visibility` : `hidden`}
            css={css`
              .components-range-control__number {
                display: none;
              }
            `}
          />
        </PanelBody>
      </>
    )}
  </>
);
