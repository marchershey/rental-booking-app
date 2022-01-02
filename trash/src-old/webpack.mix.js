const mix = require('laravel-mix')


mix.disableNotifications()

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'))

if (mix.inProduction()) {
    mix.version()
} else {
    // mix.sourceMaps()
}

// To allow HMR to work on devices on the local network,
// the following config and options need to be set.

// This sets your `mix()` assets to `http://localhost:8000` (to work with `php artisan serve`)
mix.webpackConfig({
    devServer: {
        proxy: {
            '*': 'http://localhost:8000'
        }
    },
})

// This sets your HMR host and port to the device running `php artisan serve`
mix.options({
    hmrOptions: {
        host: '10.0.0.31', // set this to the local ip address (192.168.0.**) of whatever device is running `php artisan serve`
        port: 80 // set this to which port `php artisan serve` is using.
    }
})