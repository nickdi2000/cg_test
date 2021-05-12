import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { faHeart } from '@fortawesome/free-regular-svg-icons'

import {
  faUser, faLock, faSignOutAlt, faCog, faHeart, faEye, faEdit
} from '@fortawesome/free-solid-svg-icons'

library.add(
  faUser, faLock, faSignOutAlt, faCog, faHeart, faEye, faEdit
)

Vue.component('Fa', FontAwesomeIcon)
