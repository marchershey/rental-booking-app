window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// AlpineJS
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
