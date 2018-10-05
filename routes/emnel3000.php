<?php 

Route::get('/', function () {
    return "This is emnel 3000";
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/welcome', 'LabController@index')->name('emnel3000.lab.index');
    Route::get('/new', 'LabController@new')->name('emnel3000.lab.new');
    Route::get('/show', 'LabController@show')->name('emnel3000.lab.show');
});