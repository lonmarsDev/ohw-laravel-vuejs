<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'settings', 'middleware' => ['auth:api']], function() {
    Route::post('security_questions',  'SettingsController@securityQuestions')->name('settings.security_questions.post');
});



// Route::middleware('auth')->group(function () {
    
    Route::prefix('settings')->group(function () {
	    
	    Route::post('/domain/remove', [
	        'as'   => 'remove_domain',
	        'uses' => 'SettingsDomainController@remove_domain',
    	]);

	    Route::post('/domain/disable', [
	        'as'   => 'disable_domain',
	        'uses' => 'SettingsDomainController@disable_domain',
    	]);

    	Route::post('/domain/add', [
	        'as'   => 'add_domain',
	        'uses' => 'SettingsDomainController@add_domain',
    	]);

    	Route::post('/domain/verify', [
	        'as'   => 'verify',
	        'uses' => 'SettingsDomainController@verify',
    	]);

    	Route::post('/domain/authenticate', [
	        'as'   => 'authenticate_domain',
	        'uses' => 'SettingsDomainController@authenticate_domain',
    	]);

	});

// });

