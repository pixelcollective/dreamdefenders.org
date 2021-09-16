/** @wordpress */
import { __ } from "@wordpress/i18n";
import { useEffect } from "@wordpress/element";
import { RichText, URLInputButton } from "@wordpress/block-editor";
import ImageUpload from "./image-upload";

/** Modules */
import { If } from "react-extras";

/**
 * Constants
 */
const TW_CLASSES_CTA_WRAPPER = `flex flex-wrap w-full h-full justify-center content-center border border-yellow p-2 hover:bg-yellow transition transition-all text-white hover:text-black hover:cursor-pointer`;
const TW_CLASSES_CTA_TEXT =
  "p-2 mt-0 mb-0 font-display uppercase text-xl italic font-bold text-center leading-none mb-0";
const TW_CLASSES_HEADING =
  "text-5xl font-bold text-left text-white uppercase leading-none align-bottom leading-none";

/**
 * Edit: Gallery CTA
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { heading, cta } = attributes;

  const onHeading = (heading) => {
    setAttributes({ heading });
  };

  const onMedia = (media, index) => {
    setAttributes({
      media: {
        ...attributes.media,
        [`${index}`]: media,
      },
    });
  };

  const onCta = (cta, index) => {
    setAttributes({
      cta: {
        ...attributes.cta,
        [`${index}`]: cta,
      },
    });
  };

  useEffect(() => {
    setAttributes({ align: "full" });
  });

  return (
    <div className={`${className} alignwide`}>
      <div
        className={`container mx-auto bg-black my-16 px-4 p-16 flex align-bottom flex-col`}
      >
        <div className={`w-full content-bottom flex`}>
          <div className={`block text-white`}>
            <RichText
              tagName={`h2`}
              className={TW_CLASSES_HEADING}
              placeholder={__("Squadd Up", "tinypixel")}
              value={heading}
              allowedFormats={[]}
              style={{ marginTop: 0, marginBottom: 0 }}
              onChange={onHeading}
            />
          </div>
        </div>

        <div className={`flex flex-row flex-wrap flex-auto flex-grow`}>
          <ImageUpload
            item="one"
            onMedia={onMedia}
            isSelected={isSelected}
            {...attributes}
          />
          <ImageUpload
            item="two"
            onMedia={onMedia}
            isSelected={isSelected}
            {...attributes}
          />
          <ImageUpload
            item="three"
            onMedia={onMedia}
            isSelected={isSelected}
            {...attributes}
          />
          <ImageUpload
            item="four"
            onMedia={onMedia}
            isSelected={isSelected}
            {...attributes}
          />
          <ImageUpload
            item="five"
            onMedia={onMedia}
            isSelected={isSelected}
            {...attributes}
          />

          <div className={`inline-block w-full md:w-1/2 lg:w-1/3 p-2 h-48`}>
            <div className={TW_CLASSES_CTA_WRAPPER}>
              <RichText
                tagName={`div`}
                className={TW_CLASSES_CTA_TEXT}
                placeholder={__("Wanna start your own chapter?", "tinypixel")}
                value={cta && cta.text && cta.text}
                allowedFormats={[]}
                onChange={(text) => onCta(text, `text`)}
              />
              <If condition={isSelected}>
                <URLInputButton
                  onChange={(url) => onCta(url, `url`)}
                  url={cta && cta.url && cta.url}
                />
              </If>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default edit;
