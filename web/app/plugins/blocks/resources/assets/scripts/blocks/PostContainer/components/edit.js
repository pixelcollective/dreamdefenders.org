// @wordpress
import { __ } from '@wordpress/i18n'
import { Button } from '@wordpress/components'
import { format } from '@wordpress/date'
import {
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  RichText,
} from '@wordpress/block-editor'

import { isEqual, isUndefined } from 'lodash'
import usePost from '../../../hooks/usePost'

const PostedOn = ({date }) => {
  return date && (
    <div className={`font-sans uppercase text-lg`}>
      { format(`F j, Y`, date) }
    </div>
  )
}

const edit = ({attributes, className, isSelected, setAttributes}) => {
  const { date } = usePost()

  date && attributes.date
    && !isEqual(date, attributes.date)
    && setAttributes({ date: format(`F j, Y`, date) })

  const onChange = {
    heading: heading => setAttributes({ heading }),
    media: media => setAttributes({ media }),
  }

  return (
    <div className={className}>
      <div className={`w-full md:w-1/2 flex-col`}>
        <RichText
          className={`font-sans text-3xl inline-block uppercase font-bold break-all`}
          placeholder={__(`Post Title...`, `tinypixel`)}
          value={attributes.heading}
          allowedFormats={[]}
          onChange={onChange.heading} />

        <PostedOn date={date} />

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
