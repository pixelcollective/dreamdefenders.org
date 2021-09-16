// @wordpress
import { useCallback } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
import { Button, Icon } from "@wordpress/components";
import { format } from "@wordpress/date";
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from "@wordpress/block-editor";

import usePost from "../../../hooks/usePost";

const PostedOn = ({ date }) => {
  return (
    date && (
      <div className={"font-sans uppercase text-lg"}>
        {format("F j, Y", date)}
      </div>
    )
  );
};

/**
 * Edit: Post container
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { post, setPost } = usePost();
  const { title, date } = post;
  const { media } = attributes;

  const onTitle = useCallback((title) => {
    setAttributes({ title });
    setPost({ title });
  });

  const onMedia = useCallback((media) => {
    setAttributes({ media });
  });

  return (
    <div className={className}>
      <div className={"flex flex-col md:flex-row"}>
        <div className={"flex-col w-full md:w-1/2 p-2"}>
          <RichText
            tagName={"div"}
            className={
              "inline-block font-sans text-5xl font-bold uppercase pr-8 md:pr-6 lg:pr-8 md:pb-8 md:max-w-4/5 leading-none"
            }
            placeholder={__("Post Title...", "tinypixel")}
            value={title}
            allowedFormats={[]}
            onChange={onTitle}
          />

          <PostedOn date={date} />

          <MediaUploadCheck>
            <MediaUpload
              onSelect={onMedia}
              multiple={false}
              value={media && media.id}
              render={({ open }) => (
                <div className="relative">
                  {(!media || !media.url) && (
                    <div
                      className={
                        "w-full bg-gray-100 rounded py-16 text-center pb-6 pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5"
                      }
                    >
                      <Button
                        isPrimary
                        onClick={open}
                        className={"text-center"}
                      >
                        Add image
                      </Button>
                    </div>
                  )}

                  {media && media.url && (
                    <div
                      className={
                        "w-full pb-6 pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5"
                      }
                    >
                      <img src={media.url} />
                    </div>
                  )}

                  {media && media.url && isSelected && (
                    <Button
                      isSecondary
                      className={"absolute"}
                      style={{ top: "1rem", left: "1rem" }}
                      onClick={open}
                    >
                      <Icon icon={"format-image"} />
                    </Button>
                  )}
                </div>
              )}
            />
          </MediaUploadCheck>
        </div>

        <div className={"flex-col w-full md:w-1/2"}>
          <InnerBlocks
            templateLock={false}
            template={[["core/paragraph", { placeholder: "Enter content..." }]]}
          />
        </div>
      </div>
    </div>
  );
};

export default edit;
