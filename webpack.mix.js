let mix = require('laravel-mix');

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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/

mix.js('resources/assets/vue/sample.js', 'public/js/vue/sample.js');
mix.js('resources/assets/vue/extra/api.js', 'public/js/vue/extra/api.js');

/*
* Settings
* */

mix.js('resources/assets/vue/settings/security', 'public/js/settings/security');
mix.js('resources/assets/vue/settings/verify_domain.js', 'public/js/vue/settings/verify_domain.js');

/**
 * Emnel 3000
 */
mix.js('resources/assets/vue/emnel3000/', 'public/js/emnel3000');

/**
* Admin
*/
mix.js('resources/assets/vue/admin/user.js', 'public/js/vue/admin/user.js');
mix.js('resources/assets/vue/admin/role.js', 'public/js/vue/admin/role.js');
mix.js('resources/assets/vue/admin/permissions.js', 'public/js/vue/admin/permissions.js');

//mix.js('resources/assets/vue/settings/verify_domain.js', 'public/js/vue/settings/verify_domain.js');
//mix.js('resources/assets/vue/settings/security', 'public/js/settings/security');

//mix.js('resources/assets/vue/settings/verify_domain.js', 'public/js/vue/settings/verify_domain.js');
//mix.js('resources/assets/vue/settings/security', 'public/js/settings/security');

