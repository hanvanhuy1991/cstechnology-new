let mix = require('laravel-mix');
let glob = require('glob');
require('laravel-mix-purgecss');

function mixAssetsDir(query, cb) {
    (glob.sync('resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/');
        cb(f, f.replace('resources/js/pages', 'public/js'));
    });
}

let scanForCssSelectors = [
    path.join(__dirname, 'resources/js/**/*.js'),
    path.join(__dirname, 'resources/views/**/*.php'),
    path.join(__dirname, 'node_modules/select2/**/*.js'),
    path.join(__dirname, 'node_modules/jstree/**/*.js'),
    path.join(__dirname, 'node_modules/flatpickr/**/*.js'),
    path.join(__dirname, 'node_modules/dropzone/**/*.js'),
    path.join(__dirname, 'node_modules/bootstrap/**/*.js'),
    path.join(__dirname, 'routes/breadcrumbs.php'),
];

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
mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
});
mix
    .copyDirectory('resources/global_assets/images', 'public/images')
    .copy('node_modules/tinymce/skins', 'public/js/wysiwyg/skins')
    .copy('node_modules/dropzone/dist/min/dropzone.min.js', 'public/js/vendor')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/editor.js', 'public/js')
    .scripts('node_modules/jstree/dist/jstree.js', 'public/js/vendor/jstree.js')
    .sass('resources/sass/dark.scss', 'public/css', {
        implementation: require('node-sass')
    })
    .sass('resources/sass/material.scss', 'public/css', {
        implementation: require('node-sass')
    })
    .sass('resources/sass/default.scss', 'public/css', {
        implementation: require('node-sass')
    })
    .extract()
    .purgeCss({
        globs: scanForCssSelectors,
        extensions: ['html', 'js', 'php', 'vue'],
        whitelistPatterns: [/select2/, /alert/, /iti/],
    });


mixAssetsDir('js/pages/**/*.js', (src, dest) => mix.js(src, dest));

mix.webpackConfig({
    resolve: {
        alias: {
            'sticky-kit': 'sticky-kit/dist/sticky-kit',
            'jquery-ui': 'jquery-ui',
        },
    },
});

if (mix.inProduction()) {
    mix.version();
}
