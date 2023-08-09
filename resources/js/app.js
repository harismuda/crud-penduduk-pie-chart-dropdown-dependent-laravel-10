import './bootstrap';

const mix = require('laravel-mix');

mix.js('resources/js/pie-chart.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

