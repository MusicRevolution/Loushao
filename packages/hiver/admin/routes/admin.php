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
// 用户登录
Route::get('admin/login', 'AdminAuthController@login');
Route::post('admin/loginValidate', 'AdminAuthController@postLogin');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    // 控制面板
    Route::get('/', 'AdminController@index');
    // 用户管理
    Route::resource('users', 'UsersController');
    // 日志管理
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    // 注销用户
    Route::get('/logout', '\App\Http\Controllers\Auth\AuthController@getLogout');
    // 权限管理
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});