// @wordpress
import { useCallback } from "@wordpress/element";
import { __ } from "@wordpress/i18n";
import { Button } from "@wordpress/components";
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from "@wordpress/block-editor";

import usePost from "../../../hooks/usePost";

const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { post, setPost } = usePost();
  const { media } = attributes;
  const { title } = post;

  const onTitle = useCallback((title) => {
    setAttributes({ title });

    setPost({ title });
  });

  const onMedia = useCallback((media) => {
    setAttributes({ media });
  });

  return (
    <div className={className}>
      <div className={`flex flex-col md:flex-row`}>
        <div className={`flex w-full md:w-1/2 flex-col`}>
          <RichText
            tagName={`h1`}
            className={`font-display text-3xl inline-block uppercase font-bold break-all`}
            placeholder={__(`Project Title...`, `tinypixel`)}
            value={title}
            allowedFormats={[]}
            onChange={onTitle}
          />

          <MediaUploadCheck>
            <MediaUpload
              onSelect={onMedia}
              multiple={false}
              value={media && media.id}
              render={({ open }) => (
                <div>
                  {media && <img className={`pr-0 md:pr-4`} src={media.url} />}

                  {isSelected && (
                    <Button className={`button`} onClick={open}>
                      {media ? `Replace` : `Add`} featured image
                    </Button>
                  )}
                </div>
              )}
            />
          </MediaUploadCheck>
        </div>

        <div className={`flex w-full md:w-1/2 flex-col`}>
          <InnerBlocks templateLock={false} />
        </div>
      </div>
    </div>
  );
};

export default edit;
