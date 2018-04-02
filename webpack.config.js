var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/main', './assets/js/main.js')
    .addStyleEntry('css/main', './assets/css/main.less')

    // uncomment if you use Sass/SCSS files
    .enableLessLoader()
    .enableVueLoader()


    // .configureBabel(function(babelConfig) {
    //   // add additional presets
    //   babelConfig.presets.push('vue');
    //
    //   // no plugins are added by default, but you can add some
    //   // babelConfig.plugins.push('styled-jsx/babel');
    // })
    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
