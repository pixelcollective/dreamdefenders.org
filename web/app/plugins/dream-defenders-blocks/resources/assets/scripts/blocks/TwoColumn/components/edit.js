// @wordpress
import { __ } from "@wordpress/i18n";
import { Button } from "@wordpress/components";
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from "@wordpress/block-editor";

const edit = ({ attributes, className, isSelected, setAttributes }) => {
  const { heading, media } = attributes;

  const onChange = {
    heading: (heading) => setAttributes({ heading }),
    media: (media) => setAttributes({ media }),
  };

  return (
    <div className={className}>
      <div className={`${className}__column-a`}>
        <RichText
          className={`${className}__column-a__heading`}
          value={heading && heading}
          onChange={onChange.heading}
        />

        <MediaUploadCheck>
          <MediaUpload
            onSelect={onChange.media}
            multiple={false}
            value={media && media.id}
            render={({ open }) => (
              <div>
                {media && <img src={media.url} />}
                {isSelected && (
                  <Button className={"button button-primary"} onClick={open}>
                    {media ? "Replace" : "Add"} image
                  </Button>
                )}
              </div>
            )}
          />
        </MediaUploadCheck>
      </div>

      <div className={`${className}__column-b`}>
        <InnerBlocks />
      </div>
    </div>
  );
};

export { edit };
