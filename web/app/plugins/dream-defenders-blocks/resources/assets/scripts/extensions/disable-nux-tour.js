import '@wordpress/nux'
import {registerPlugin} from '@wordpress/plugins'
import {select, dispatch} from '@wordpress/data';

/**
 * Plugin: disable welcome modal
 *
 * @param {string} name
 * @param {object} settings
 */
const disableWelcome = registerPlugin('disable-welcome', {
  render: () => {
    const hello = () => select('core/edit-post')
      .isFeatureActive('welcomeGuide')
    const goodbye = () => dispatch('core/edit-post')
      .toggleFeature('welcomeGuide')

    return hello() && goodbye()
  }
})

export default disableWelcome
