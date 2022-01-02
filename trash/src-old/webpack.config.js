const path = require('path')
const webpack = require('webpack')

module.exports = {

    // aliases
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },

    // Since we're running the esm-bundler of Vue, we need to configure the bundler to replace feature
    // flag globals with boolean literals to get proper tree-shaking in the final bundle.
    // See http://link.vuejs.org/feature-flags for more details.
    plugins: [
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: true,
        }),
    ]
}