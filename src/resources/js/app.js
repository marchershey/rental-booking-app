require("./bootstrap");

// alpine js
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// google maps
import { Loader } from "@googlemaps/js-api-loader";
const google = new Loader({
    apiKey: process.env.MIX_GOOGLE_KEY,
    version: "weekly",
    libraries: ["places"],
});
window.google = google;

// photo slider - splidejs
import Splide from "@splidejs/splide";
import splideCss from "@splidejs/splide/dist/css/themes/splide-default.min.css";
window.Splide = Splide;

// calendar - lightpicker
import Litepicker from "litepicker";
import "litepicker/dist/plugins/mobilefriendly";
