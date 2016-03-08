var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('app.scss')
		.scripts([
			'thirdparty/jquery/jquery-2.2.0.js',
			'thirdparty/jquery/jquery.tinypubsub.js',
			'config.js',
			'components/dropdown.js',
			'components/fileUpload.js',
			'components/starRating.js',
			'components/toggleCheckBox.js',
			'components/toggleSelect.js'
		], './public/js/bundle.js');
});