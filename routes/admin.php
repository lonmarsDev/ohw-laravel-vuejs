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

 Route::group(['middleware' => ['auth']], function () {
 	 Route::group(['middleware' => ['checkpermission']], function () {
	 	Route::get('/dashboard','DashboardController@dashboard')->name('admin.dashboard');

	 	Route::group(['prefix'=>'users'],function(){
	 			Route::get('/list/owners','UserController@listOwner')->name('admin.user.list.owners');
				Route::get('/list','UserController@list')->name('admin.user.list');	
				Route::post('/toggle/{id}/{status}','UserController@toggleUser')->name('admin.toggle.status');
		});
	 	Route::resource('/users','UserController',array("as"=>"admin"));

		Route::group(['prefix'=>'roles'],function(){
				Route::get('/list','RolesController@list')->name('admin.roles.list');
				Route::get('/{id}/attached/permission','RolesController@attachRole')->name('admin.role.get.attached');
				Route::get('/{id}/getattached','RolesController@getAttached')->name('admin.role.get.attached');
				Route::post('/{id}/detached/permission/','RolesController@detachedRole')->name('admin.role.list');
				Route::post('/{id}/attached/permission/','RolesController@attachedRole')->name('admin.role.route');
		});
		Route::resource('/roles','RolesController',array("as"=>"admin"));

		Route::group(['prefix'=>'permissions'],function(){
				Route::get('/list','PermissionsController@list')->name('admin.permission.list');
				Route::get('/routes','PermissionsController@routeList')->name('admin.permission.route');
				Route::get('/{id}/attached/role','PermissionsController@attachRole')->name('admin.permission.get.attached');
				Route::get('/{id}/getattached','PermissionsController@getAttached')->name('admin.permission.get.attached');
				Route::post('/{id}/detached/role/','PermissionsController@detachedRole')->name('admin.permission.list');
				Route::post('/{id}/attached/role/','PermissionsController@attachedRole')->name('admin.permission.route');
		});
		Route::resource('/permissions','PermissionsController',array("as"=>"admin"));
	 });
	 Route::get('404.html',function(){
        return view('errors.admin.404',['user'=>\Illuminate\Support\Facades\Auth::user()]);
    });
 });
