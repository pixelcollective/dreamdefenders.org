import { __ } from '@wordpress/i18n'
import { Component } from '@wordpress/element'
import { InnerBlocks, MediaUpload } from '@wordpress/editor'
import { Button } from '@wordpress/components'
import styles from './styled.module.css'
import ui from './../../components/styled/ui.module.css'

const allowed_blocks = [
  'core/paragraph',
  'core/heading',
  'core/image',
  'core/video',
  'tinypixel/card',
]

class Edit extends Component {
  constructor() {
    super(...arguments)

    this.onSelectMedia = this.onSelectMedia.bind(this)
    this.onRemoveMedia = this.onRemoveMedia.bind(this)
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

  bg(URL) {
    return { backgroundImage: `url(${URL})` }
  }

  showWhen(condition, showClass, hideClass) {
    return condition ? showClass : hideClass
  }

  render() {
    const {
      attributes,
      className,
      isSelected
    } = this.props

    const {
      mediaID,
      mediaURL,
    } = attributes

    return (
      <div className={className}>
        <div className={styles.section} style={this.bg(mediaURL)}>
          <div className={styles.section__overlay}>
            <div className={styles.section__container}>
              <InnerBlocks templateLock={false} allowedBlocks={allowed_blocks} />
            </div>
          </div>
        </div>
        <MediaUpload
          onSelect={this.onSelectMedia}
          onChange={this.onSelectMedia}
          value={mediaID}
          render={({ open }) => (
            <div className={this.showWhen(isSelected, ui.button__container, ui.button__container__hidden) }>
              <Button className={!mediaID ? ui.button : ui.button__modify} onClick={open}>
                {!mediaID ? __('Upload background', 'tiny-pixel') : __('Swap background', 'tiny-pixel')}
              </Button>
              {mediaID && (
                <Button className={ui.button__remove} onClick={this.onRemoveMedia}>
                  {__('Remove background', 'tiny-pixel')}
                </Button>
              )}
            </div>
          )} />
      </div>
    )
  }
}

export default Edit
