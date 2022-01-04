require('./bootstrap');

// Alpine js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Swiper js
import Swiper, {
    Navigation,
    Pagination
} from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
Swiper.use([Navigation, Pagination]);
window.Swiper = Swiper

// flatpickr
// import flatpickr from 'flatpickr'
// window.Flatpickr = flatpickr
