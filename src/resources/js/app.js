window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Dropzone from "dropzone"
// import DropzoneCss from "dropzone/dist/dropzone.css"
window.Dropzone = Dropzone

// AlpineJS
import Alpine from "alpinejs"
import ToastComponent from '../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts'
Alpine.data('ToastComponent', ToastComponent)
window.Alpine = Alpine
window.addEventListener('load', function () {
    Alpine.start()
})
