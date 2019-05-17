import { __ } from '@wordpress/i18n'
import { Component, Fragment } from '@wordpress/element'
import { RichText, MediaPlaceholder } from '@wordpress/editor'
import { Button } from '@wordpress/components'
import classnames from 'classnames'

import styled from './styled.module.css'
import ui from './../../components/styled/ui.module.css'

class Edit extends Component {
  constructor() {
    super(...arguments)

    this.onRemoveMedia = this.onRemoveMedia.bind(this)
    this.onSelectMedia = this.onSelectMedia.bind(this)
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
      isSelected,
      setAttributes,
    } = this.props

    const {
      mediaID,
      mediaURL,
      heading,
      copy,
    } = attributes

    const classes = {
      cards: classnames(className, styled.cards),
    }

    return (
      <div className={classes.cards}>
        <div className={styled.card}>
          { mediaURL ? (
            <Fragment>
              <img className={styled.card__image} src={mediaURL} />
              <div className={isSelected ? ui.button__container & ui.button__top : ui.button__container__hidden}>
                <Button className={ui.button} onClick={this.onSelectMedia}>
                  {__('Remove image', 'tiny-pixel')}
                </Button>
              </div>
            </Fragment>
          ):(
            <MediaPlaceholder
              onSelect={this.onSelectMedia}
              value={mediaID} />
          )}
          <header class={styled.card__header}>
            <RichText
              tagName="div"
              className={styled.card__header__heading}
              value={heading}
              placeholder={__('Heading', 'sage')}
              onChange={value => { setAttributes({ heading: value }) }} />
          </header>
          <div className={styled.card__content}>
            <RichText
              tagName="p"
              className={styled.card__content__copy}
              value={copy}
              placeholder={__('Copy go here', 'sage')}
              onChange={value => { setAttributes({ copy: value }) }} />
          </div>
        </div>
      </div>
    )
  }
}

export default Edit
