require('./bootstrap');

// *******************************************************
/**
 * Alpine JS
 */
import Alpine from 'alpinejs'
// Alpine.directive('foo', ...)
window.Alpine = Alpine
window.Alpine.start()

// Console log function used by Alpine
window.addEventListener('consolelog', event => {
    console.log(event.detail.data);
})

// Body scroll lock
const bodyScrollLock = require('body-scroll-lock');
const disableBodyScroll = bodyScrollLock.disableBodyScroll;
const enableBodyScroll = bodyScrollLock.enableBodyScroll;

window.toogleOverflow = function (show) {
    if (show) {
        disableBodyScroll(document.getElementById('modal'))
    } else {
        enableBodyScroll(document.getElementById('modal'))
    }
}
// *******************************************************



// *******************************************************
/**
 * Flatpickr
 */
import flatpickr from 'flatpickr'
window.Flatpickr = flatpickr
// *******************************************************


// import Swiper bundle with all modules installed
// import Swiper from 'swiper/bundle';
// var swiper = new Swiper(".mySwiper", {

//     slidesPerView: 1,
//     spaceBetween: 10,

//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//         dynamicBullets: true,
//     },
//     breakpoints: {
//         640: {
//             slidesPerView: 2,
//             spaceBetween: 10,
//         },
//     },
// });