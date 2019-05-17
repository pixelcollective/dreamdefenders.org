import { __ } from '@wordpress/i18n'
import { Component } from '@wordpress/element'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {
  faFacebook,
  faTwitter,
  faInstagram,
} from '@fortawesome/free-brands-svg-icons'
import { faHandPointer } from '@fortawesome/free-regular-svg-icons'
import styled from './styled.module.css'

class Edit extends Component {
  constructor(props) {
    super(...arguments)
    this.onSelectNetwork = this.onSelectNetwork.bind(this)
  }

  onSelectNetwork(network) {
    this.props.setAttributes({
      network,
    })
  }

  showWhen(condition, showClass, hideClass) {
    return condition ? showClass : hideClass
  }

  render() {
    const {
      attributes,
      className,
      isSelected,
    } = this.props

    return (
      <div className={styled.icons__banner}>
        <FontAwesomeIcon icon={faFacebook} size="4x" color="currentColor" />
        <FontAwesomeIcon icon={faTwitter} size="4x" color="currentColor" />
        <FontAwesomeIcon icon={faInstagram} size="4x" color="currentColor" />
      </div>
    )
  }
}

export default Edit
