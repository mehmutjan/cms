var Encore = require('@symfony/webpack-encore');
const Glob = require('glob');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const files = Glob.sync('assets/**/*(app|index).js');

files.forEach((file) => {
  const compiledFileName = file.substring(7, (file.length - 3));
  Encore.addEntry(compiledFileName, `./${file}`);
});

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    .enableBuildNotifications()
    // uncomment to define the assets of the project
    .addEntry('js/main', './assets/js/main.js')
    .addStyleEntry('css/main', './assets/css/main.less')

    .addPlugin(new CopyWebpackPlugin([
      // copies to {output}/static
      { from: './assets/static', to: 'static' }
    ]))
    // uncomment if you use Sass/SCSS files
    .enableLessLoader()
    .enableVueLoader(function(options) {
      // https://vue-loader.vuejs.org/en/configurations/advanced.html

      options.loaders = {
        js: [
          { loader: 'cache-loader' },
          {
            loader: 'babel-loader',
            options: { presets: ['vue'] },
            include: [
              './public/build/*',
              './node_modules/vue-select.js',
            ]
          }
        ]
      };
    })


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
