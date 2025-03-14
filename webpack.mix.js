const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
          '@': __dirname + '/resources/js/cms/',
        },
    },
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Web
mix.sass('resources/sass/web/app.scss', 'public/assets/css/app.css')
   .options({processCssUrls: false})
   .vue()
   .version();

mix.js('resources/js/web/app.js', 'public/assets/js/app.js')
   .vue()
   .version();

// App
mix.js('resources/js/cms/app.js', 'public/assets/js/cms/app.js')
   .vue()
   .version();

mix.sass('resources/sass/cms/app.scss', 'public/assets/css/cms/app.css')
   .options({processCssUrls: false})
   .version();
