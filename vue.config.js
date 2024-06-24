const path = require('path');

module.exports = {
    outputDir: path.resolve(__dirname, './public/js'),
    indexPath: path.resolve(__dirname, './resources/views/index.blade.php'),
    devServer: {
        proxy: 'http://localhost:8080',
    },
    configureWebpack: {
        entry: {
            app: path.resolve(__dirname, './resources/js/app.js')
        }
    }
}
