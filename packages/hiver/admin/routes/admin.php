<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| This file is where you may override any of the routes that are included
| with Admin.
|
*/

Route::get('admin', 'AdminController@index');
Route::get('admin/login', 'AdminAuthController@login');
Route::post('admin/loginValidate', 'AdminAuthController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@index');
    Route::resource('users', 'UsersController');
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});