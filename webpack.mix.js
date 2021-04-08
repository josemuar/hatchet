const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

	mix.autoload({
	  jquery: ['$', 'window.jQuery', 'jQuery'],
	});

	mix.js('resources/js/app.js', 'public/js').vue()
	    .postCss('resources/css/app.css', 'public/css', [
	        require('postcss-import'),
	        require('tailwindcss'),
	]);

    mix.combine(
    [
        "resources/assets/js/vendor/jquery-3.3.1.min.js", 
    ],
    	"public/assets/js/common-bundle-script.js"
	);


