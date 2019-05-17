import { __ } from '@wordpress/i18n'
import { Component } from '@wordpress/element'
import { DropdownMenu } from '@wordpress/components';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import {
  faFacebook,
  faTwitter,
  faInstagram,
} from '@fortawesome/free-brands-svg-icons'
import { faHandPointer } from '@fortawesome/free-regular-svg-icons'
import { center } from './styled.module.css'

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

    const SocialIconDropdownMenu = () => (
      <DropdownMenu
        align="center"
        icon={<FontAwesomeIcon icon={faHandPointer} />}
        label="Select a Network"
        controls={[
          {
            title: 'Facebook',
            icon: <FontAwesomeIcon icon={faFacebook} />,
            onClick: () => console.log('facebook')
          },
          {
            title: 'Twitter',
            icon: <FontAwesomeIcon icon={faTwitter} />,
            onClick: () => console.log('twitter')
          },
          {
            title: 'Instagram',
            icon: <FontAwesomeIcon icon={faInstagram} />,
            onClick: () => console.log('instagram')
          },
        ]}
      />
    );

    return (
        attributes.network ? (
          <div className={center}>
            <h1>Network!</h1>
          </div>
        ):(
          <div className={center}>
            <h2>Add a network</h2>
            <SocialIconDropdownMenu />
          </div>
        )
    )
  }
}

export default Edit
