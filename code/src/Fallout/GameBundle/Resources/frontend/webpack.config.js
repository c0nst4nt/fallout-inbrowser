var CopyWebpackPlugin = require('copy-webpack-plugin');

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
            'fosjsrouting': path.join(__dirname, '../../web/bundles/fosjsrouting/js/router.js')
        },
        extensions: ['', '.js']
    }
};