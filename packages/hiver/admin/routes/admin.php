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
Route::get('admin/captcha', 'AdminController@getCaptcha');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    // 控制面板
    Route::get('/', 'AdminController@index');
    Route::get('/welcome', 'AdminController@welcome');
    Route::get('/setting', 'AdminController@setting');
    Route::post('/setting', 'AdminController@update');
    Route::get('/feedback', 'FeedbackController@index');
    Route::delete('/feedback/{id}', 'FeedbackController@destroy');
    // 用户管理
    Route::resource('users', 'UsersController');
    Route::get('/profile/{id}/edit', 'ProfileController@edit');
    Route::patch('/profile/{id}', 'ProfileController@update');
    // 角色管理
    Route::resource('role', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    // Banner管理
    Route::resource('banner', 'BannerController');
    // 广告管理
    Route::resource('ad', 'AdController');
    // 动漫管理
    Route::resource('comics', 'ComicsController');
    // 下载管理
    Route::get('/download/index', 'DownloadController@index');
    Route::post('/download', 'DownloadController@store');
    Route::post('/download/{id}', 'DownloadController@update');
    Route::delete('/download/{id}', 'DownloadController@destroy');
    // 日志管理
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    // 注销用户
    Route::get('/logout', '\App\Http\Controllers\Auth\AuthController@getLogout');
    // 权限管理
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});