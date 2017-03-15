var CopyWebpackPlugin = require('copy-webpack-plugin');

var webPath = '../../../../../../web';

module.exports = {
    entry: "./scripts/application.js",
    output: {
        filename: "../public/scripts.js"
    },
    watch: true,
    plugins: [
        new CopyWebpackPlugin([
            { from: 'images/*', to: '../public' },
            { from: 'styles/*', to: '../public' }
        ])
    ],
    resolve: {
        alias: {
            'fos-js-routing': webPath + '/bundles/fosjsrouting/js/router.js',
            'fos-js-routes': webPath + '/js/fos_js_routes.js'
        },
        extensions: ['.js']
    }
};