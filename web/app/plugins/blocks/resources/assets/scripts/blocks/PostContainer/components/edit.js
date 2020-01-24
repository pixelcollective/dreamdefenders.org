// @wordpress
import { useEffect, useCallback } from '@wordpress/element'
import { __ } from '@wordpress/i18n'
import { Button } from '@wordpress/components'
import { format } from '@wordpress/date'
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from '@wordpress/block-editor'

import { sample } from 'lodash'
import usePost from '../../../hooks/usePost'

const PostedOn = ({ date }) => {
  return date && (
    <div className={`font-sans uppercase text-lg`}>
      { format(`F j, Y`, date) }
    </div>
  )
}

const edit = ({ attributes, setAttributes, className, isSelected, ...props }) => {
  const { post, setPost } = usePost()

  const { media } = attributes
  const { title, date } = post

  const onTitle = useCallback((title) => {
    setAttributes({ title })
    setPost({ title })
  })

  const onMedia = useCallback((media) => {
    setAttributes({ media })
  })

  return (
    <div className={className}>
      <div className={`w-full md:w-1/2 flex-col`}>
        <RichText
          className={`font-sans text-3xl inline-block uppercase font-bold break-all`}
          placeholder={__(`Post Title...`, `tinypixel`)}
          value={title}
          allowedFormats={[]}
          onChange={onTitle} />

        <PostedOn date={date} />

        <MediaUploadCheck>
          <MediaUpload
            onSelect={onMedia}
            multiple={false}
            value={media && media.id}
            render={({ open }) => (
              <div>
                {media && (
                  <img className={`pr-0 md:pr-4`} src={media.url} />
                )}

                {isSelected && (
                  <Button
                    className={`button`}
                    onClick={open}>
                    {media ? `Replace` : `Add`} featured image
                  </Button>
                )}
              </div>
            )} />
        </MediaUploadCheck>
      </div>

      <div className={`w-full md:w-1/2 flex-col`}>
        <InnerBlocks />
      </div>
    </div>
  )
}

export default edit
