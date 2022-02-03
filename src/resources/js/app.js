window._ = require("lodash");
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// AlpineJS
import Alpine from "alpinejs";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts";
Alpine.data("ToastComponent", ToastComponent);
window.Alpine = Alpine;
// window.addEventListener("load", function () {
Alpine.start();
// });

// import Swiper JS
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
window.Swiper = Swiper;

// flatpikr v4
import "flatpickr";
global.rangePlugin = require("flatpickr/dist/plugins/rangePlugin");

// momentjs 2.29.1
import moment from "moment";
window.moment = moment;

// cleave.js v1.6.0
import cleave, { Cleave } from "cleave.js";
import cleavePhone from "cleave.js/dist/addons/cleave-phone.us";
window.cleave = cleave;
window.maskPhoneNumbers = function () {
    document.querySelectorAll(".mask-phone").forEach((element) => {
        new window.cleave(element, {
            phone: true,
            phoneRegionCode: "us",
            delimiter: "-",
        });
    });
};
window.maskZipCodes = function () {
    document.querySelectorAll(".mask-zip").forEach((element) => {
        new window.cleave(element, {
            blocks: [5],
            numericOnly: true,
        });
    });
};
