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
    select('core/edit-post').isFeatureActive('welcomeGuide')
      && dispatch('core/edit-post').toggleFeature('welcomeGuide')

    return null
  }
})

export default disableWelcome
