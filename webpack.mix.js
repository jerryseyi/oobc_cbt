let mix = require('laravel-mix');

// 1. Compile src/app.js to dist/app.js
mix.js('js/index.js', 'dist')
    .js('node_modules/@wiris/mathtype-tinymce5/plugin.min.js', 'dist');

mix.css('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'dist');

mix.copy('node_modules/tinymce', 'js/tinymce')