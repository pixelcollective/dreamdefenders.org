// @wordpress
import { __ } from "@wordpress/i18n";
import { Button } from "@wordpress/components";
import {
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from "@wordpress/block-editor";

const edit = ({ attributes, className, isSelected, setAttributes }) => {
  const { squaddName, media, city, facebook, instagram, twitter, email } =
    attributes;

  const onChange = {
    squaddName: (squaddName) => setAttributes({ squaddName }),
    media: (media) => setAttributes({ media }),
    city: (city) => setAttributes({ city }),
    join: (join) => setAttributes({ join }),
    email: (email) => setAttributes({ email }),
    facebook: (handle) =>
      setAttributes({
        facebook: {
          handle,
          url: `https://facebook.com/${handle}`,
        },
      }),
    twitter: (handle) =>
      setAttributes({
        twitter: {
          handle,
          url: `https://twitter.com/${handle}`,
        },
      }),
    instagram: (handle) =>
      setAttributes({
        instagram: {
          handle,
          url: `https://instagram.com/${handle}`,
        },
      }),
  };

  return (
    <div className={className}>
      <div className={`flex flex-col md:flex-row w-full`}>
        <div className={"flex flex-col w-full md:w-1/2"}>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={onChange.media}
              multiple={false}
              value={media && media.id}
              render={({ open }) => (
                <div>
                  {media && <img className={"pr-0 md:pr-4"} src={media.url} />}

                  {isSelected && (
                    <Button className={"button"} onClick={open}>
                      {media ? "Replace" : "Add"} featured image
                    </Button>
                  )}
                </div>
              )}
            />
          </MediaUploadCheck>
        </div>

        <div className={"w-full md:w-1/2 flex-col"}>
          <div className={`w-full flex-row`}>
            <RichText
              tagName="h2"
              className={
                "font-sans text-3xl inline-block uppercase font-bold break-all leading-none"
              }
              placeholder={__("City", "tinypixel")}
              value={city}
              allowedFormats={[]}
              onChange={onChange.city}
            />

            <span
              className={
                "font-sans text-3xl inline-block uppercase font-bold break-all leading-none"
              }
            >
              //
            </span>

            <RichText
              tagName="h2"
              className={
                "font-sans text-3xl inline-block uppercase font-bold break-all leading-none"
              }
              placeholder={__("Squadd Name", "tinypixel")}
              value={squaddName}
              allowedFormats={[]}
              onChange={onChange.squaddName}
            />
          </div>

          <div className={`w-full flex-col`}>
            <RichText
              className={
                "font-sans text-3xl block uppercase font-bold break-all"
              }
              placeholder={__("Email", "tinypixel")}
              value={email}
              allowedFormats={[]}
              onChange={onChange.email}
            />

            <RichText
              className={
                "font-sans text-3xl block uppercase font-bold break-all"
              }
              placeholder={__("Facebook Page", "tinypixel")}
              value={facebook && facebook.handle && `${facebook.handle}`}
              allowedFormats={[]}
              onChange={onChange.facebook}
            />

            <RichText
              className={
                "font-sans text-3xl block uppercase font-bold break-all"
              }
              placeholder={__("Twitter URL", "tinypixel")}
              value={twitter && twitter.handle && `${twitter.handle}`}
              allowedFormats={[]}
              onChange={onChange.twitter}
            />

            <RichText
              className={
                "font-sans text-3xl block uppercase font-bold break-all"
              }
              placeholder={__("Instagram URL", "tinypixel")}
              value={instagram && instagram.handle && `${instagram.handle}`}
              allowedFormats={[]}
              onChange={onChange.instagram}
            />
          </div>
        </div>
      </div>
    </div>
  );
};

export { edit };
