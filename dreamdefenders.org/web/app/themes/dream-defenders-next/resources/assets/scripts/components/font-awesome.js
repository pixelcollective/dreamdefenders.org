import { library, dom } from '@fortawesome/fontawesome-svg-core';
import {
  faFacebook,
  faTwitter,
  faInstagram,
} from '@fortawesome/free-brands-svg-icons'
import { faHeart } from '@fortawesome/free-regular-svg-icons'


const fontAwesome = () => {
  library.add(
    faFacebook,
    faTwitter,
    faInstagram,
    faHeart
  )
  dom.watch()
}

export default fontAwesome
