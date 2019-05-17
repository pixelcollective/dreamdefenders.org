import { __ } from '@wordpress/i18n'
import { Component } from '@wordpress/element'
import { RichText, MediaUpload } from '@wordpress/editor'
import { Button } from '@wordpress/components'
import classnames from 'classnames'

import styled from './styled.module.css'
import ui from './../../components/styled/ui.module.css'

class Edit extends Component {
  constructor() {
    super(...arguments)

    this.onChangeHeading = this.onChangeHeading.bind(this)
    this.onChangeSubHeading = this.onChangeSubHeading.bind(this)
    this.onSelectMedia = this.onSelectMedia.bind(this)
    this.onRemoveMedia = this.onRemoveMedia.bind(this)
  }

  onChangeHeading(value) {
    this.props.setAttributes({heading: value})
  }

  onChangeSubHeading(value) {
    this.props.setAttributes({ subheading: value })
  }

  onSelectMedia(media) {
    this.props.setAttributes({
      mediaURL: media.url,
      mediaID: media.id
    })
  }

  onRemoveMedia() {
    this.props.setAttributes({
      mediaURL: '',
      mediaID: null,
    })
  }

  render() {
    const {
      attributes,
      className,
      isSelected
    } = this.props

    const containerClasses = () => {
      return classnames('container', styled.banner__container)
    }

    const bg = () => {
      return attributes.mediaURL ? ({
        backgroundImage: `url(${attributes.mediaURL})`
      }) : null
    }

    const buttons = (open) => (
      <div className={isSelected ? (ui.button__container) : (ui.button__container__hidden)}>
        <Button className={!attributes.mediaID ? ui.button : ui.button__modify} onClick={open}>
          {!attributes.mediaID ? __('Upload background', 'tiny-pixel') : __('Swap background', 'tiny-pixel')}
        </Button>
        {attributes.mediaID && (
          <Button className={ui.button__remove} onClick={this.onRemoveMedia}>
            {__('Remove background', 'tiny-pixel')}
          </Button>
        )}
      </div>
    )

    return (
      <div className={className}>
        <div className={styled.banner} style={bg()}>
          <div className={styled.banner__overlay}>
            <div className={containerClasses()}>
              <div className={styled.banner__content}>
                <RichText
                  tagName="div"
                  className={styled.banner__heading__input}
                  value={attributes.heading}
                  placeholder={__('Heading', 'sage')}
                  onChange={this.onChangeHeading} />
                <RichText
                  tagName="div"
                  className={styled.banner__subheading__input}
                  value={attributes.subheading}
                  placeholder={__('Heading', 'sage')}
                  onChange={this.onChangeSubHeading} />
              </div>
            </div>
          </div>
        </div>
        <MediaUpload
          onSelect={this.onSelectMedia}
          onChange={this.onSelectMedia}
          value={attributes.mediaID}
          render={({ open }) => buttons(open)} />
      </div>
    )
  }
}

export default Edit
