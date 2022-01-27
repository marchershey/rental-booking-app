window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// AlpineJS
import Alpine from "alpinejs";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts";
Alpine.data("ToastComponent", ToastComponent);
window.Alpine = Alpine;
window.addEventListener("load", function () {
    Alpine.start();
});

// import Swiper JS
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
window.Swiper = Swiper;
