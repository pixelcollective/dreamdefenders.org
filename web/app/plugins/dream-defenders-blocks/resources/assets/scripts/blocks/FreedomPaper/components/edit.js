import React from "react";
import { __ } from "@wordpress/i18n";
import {
  Button,
  Card,
  CardBody,
  CardFooter,
  CardMedia,
} from "@wordpress/components";
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
} from "@wordpress/block-editor";

import { If } from "react-extras";

import DownloadThisVolume from "./download-this-volume";

const TYPES = [`pdf`];
const MULTIPLE = false;

/**
 * Edit: Freedom Papers
 */
const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { media, mediaDownload } = attributes;

  const onMedia = (media) => {
    setAttributes({ media });
  };

  const onMediaDownload = (mediaDownload) => {
    setAttributes({ mediaDownload });
  };

  return (
    <div className={className}>
      <div className={`w-full flex-col`}>
        <Card className={`transition shadow-md`}>
          <If condition={media}>
            <CardMedia>
              <img src={media && media.url} />
            </CardMedia>
          </If>

          <MediaUploadCheck>
            <MediaUpload
              onSelect={onMedia}
              multiple={false}
              value={media?.id}
              render={({ open: openMedia }) => (
                <CardBody className={`font-sans`}>
                  <If condition={!media}>
                    <div className={`w-full bg-gray-100 py-16`}>
                      <Button
                        isPrimary
                        className={`block mx-auto text-center`}
                        onClick={open}
                      >
                        Add image
                      </Button>
                    </div>
                  </If>

                  <div className={`max-w-1/2 w-1/2 mx-auto py-4`}>
                    <DownloadThisVolume />
                  </div>

                  <If condition={isSelected}>
                    <MediaUpload
                      onSelect={onMediaDownload}
                      allowedTypes={TYPES}
                      multiple={MULTIPLE}
                      value={mediaDownload?.id}
                      render={({ open: openDownload }) => (
                        <If condition={media}>
                          <CardFooter>
                            <Button isPrimary onClick={openMedia}>
                              Replace image
                            </Button>

                            <If condition={mediaDownload}>
                              <Button isSecondary onClick={openDownload}>
                                Replace downloadable
                              </Button>
                            </If>

                            <If condition={!mediaDownload}>
                              <Button isSecondary onClick={openDownload}>
                                Add downloadable
                              </Button>
                            </If>
                          </CardFooter>
                        </If>
                      )}
                    />
                  </If>
                </CardBody>
              )}
            />
          </MediaUploadCheck>
        </Card>

        <div className={`w-full flex-col`}>
          <InnerBlocks templateLock={false} />
        </div>
      </div>
    </div>
  );
};

export default edit;
