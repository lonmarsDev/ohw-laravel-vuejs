<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();
// 2 factor authentication routes
Route::group(['prefix' => '2fa'], function () {
    Route::get('/', 'Auth\TwoFactorAuthController@twoFactorAuthentication')->name('auth.two_factor');
    Route::post('/validate', 'Auth\TwoFactorAuthController@twoFactorAuthenticationValidate')->name('auth.two_factor.validate');
});

Route::group(['middleware' => ['auth', 'check2fAuth']], function () {

    Route::group(['middleware' => ['checkpermission']], function () {
            /**
             * Routes for Settings
             */
            Route::get('/home', 'HomeController@index')->name('home');
        	Route::prefix('settings')->group(function () {

        		Route::get('/contact', [
        	        'as'   => 'settingsContact',
        	        'uses' => 'SettingsController@contact',
            	]);

            	Route::get('/details', [
        	        'as'   => 'settingsDetails',
        	        'uses' => 'SettingsController@details',
            	]);

        	    Route::get('/domain', [
        	        'as'   => 'domain',
        	        'uses' => 'SettingsDomainController@domain',
            	]);

        	    Route::get('security', 'SettingsController@security')->name('settings.security');
        	});

            Route::group(['middleware' => 'auth'], function () {
                /**
                 * Route for API Keys
                 */
                Route::group(['prefix'=>'extra','namespace'=>'Extra'],function(){
                    Route::group(['prefix'=>'api'],function(){
                        Route::get('/list','APIKeyController@list')->name('api.list');
                        Route::put('/regenarate','APIKeyController@regenerateToken')->name('api.regenerate');
                        Route::post('/toggle/{id}/{status}','APIKeyController@toggleAPI')->name('api.toggle.status');;
                     
                    });
                       Route::resource('/api','APIKeyController');
                });
            });
	    Route::get('security', 'SettingsController@security')->name('settings.security');
	});

	/**
	* Route for Verified Domain
	*/
	Route::group(['prefix'=>'settings', 'namespace'=>'Settings'],function(){
		Route::group(['prefix'=>'verified-domain'],function(){
			Route::delete('/remove/{id}','VerifiedDomainController@destroy')->name('verifiedDomain.destroy');
		    Route::post('/add','VerifiedDomainController@add')->name('verifiedDomain.add');
			Route::put('/verify/{id}/{code}','VerifiedDomainController@verify')->name('verifiedDomain.verify');
			Route::put('/authenticate','VerifiedDomainController@authenticate')->name('verifiedDomain.authenticate');
			Route::get('/list','VerifiedDomainController@list')->name('verifiedDomain.list');
			Route::resource('/','VerifiedDomainController');
		});
	});

    Route::group(['middleware' => 'auth'], function () {
        /**
         * Route for API Keys
         */
        Route::group(['prefix'=>'extra','namespace'=>'Extra'],function(){
            Route::group(['prefix'=>'api'],function(){
                Route::get('/list','APIKeyController@list')->name('api.list');
                Route::put('/regenarate','APIKeyController@regenerateToken')->name('api.regenerate');
                Route::post('/toggle/{id}/{status}','APIKeyController@toggleAPI')->name('api.toggle.status');;
                Route::resource('/','APIKeyController');
            });
        });
        Route::get('404.html',function(){
            return view('errors.user.404',['user'=>\Illuminate\Support\Facades\Auth::user()]);
        });
    });
});
