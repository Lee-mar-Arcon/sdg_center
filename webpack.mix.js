const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Add this to handle Vue components
    .sass('resources/sass/app.scss', 'public/css');
