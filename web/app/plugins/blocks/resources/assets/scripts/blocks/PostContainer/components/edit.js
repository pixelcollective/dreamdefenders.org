// @wordpress
import { useEffect } from '@wordpress/element'
import { __ } from '@wordpress/i18n'
import { Button } from '@wordpress/components'
import { format } from '@wordpress/date'
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from '@wordpress/block-editor'

import usePost from '../../../hooks/usePost'

const PostedOn = ({ date }) => {
  return date && (
    <div className={`font-sans uppercase text-lg`}>
      { format(`F j, Y`, date) }
    </div>
  )
}

const edit = ({ attributes, setAttributes, className, isSelected }) => {
  const { post, setPost } = usePost()

  useEffect(() => {
    setPost({ title: attributes.heading })
  }, [setPost])

  const onChange = {
    heading: heading => {
      setAttributes({ heading })
    },
    media: media => {
      setAttributes({ media })
    },
  }

  setAttributes({ date: format(`F j, Y`, post.date) })

  return (
    <div className={className}>
      <div className={`w-full md:w-1/2 flex-col`}>
        <RichText
          className={`font-sans text-3xl inline-block uppercase font-bold break-all`}
          placeholder={__(`Post Title...`, `tinypixel`)}
          value={post.title}
          allowedFormats={[]}
          onChange={onChange.heading} />

        <PostedOn date={post.date} />

        <MediaUploadCheck>
          <MediaUpload
            onSelect={onChange.media}
            multiple={false}
            value={attributes.media && attributes.media.id}
            render={({open}) => (
              <div>
                {attributes.media && (
                  <img className={`pr-0 md:pr-4`} src={attributes.media.url} />
                )}

                {isSelected && (
                  <Button
                    className={`button`}
                    onClick={open}>
                    {attributes.media ? `Replace` : `Add`} featured image
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
