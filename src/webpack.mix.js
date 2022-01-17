const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);


mix.browserSync({
    proxy: 'dev.hershey.co',
    open: false,
    notify: false,
});
mix.webpackConfig({
    devServer: {
        proxy: {
            '*': 'http://dev.hershey.co:3000'
        }
    },
})

// This sets your HMR host and port to the device running `php artisan serve`
mix.options({
    hmrOptions: {
        host: 'dev.hershey.co', // set this to the local ip address (192.168.0.**) of whatever device is running `php artisan serve`
        port: 80 // set this to which port `php artisan serve` is using.
    }
})
