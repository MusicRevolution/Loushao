<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['middleware' => 'welcome'], function() {
    // 首页
    Route::get('/', 'WebController@home');
    // 动漫子页
    Route::get('show_comic_{id}.html', 'WebController@show');
    // PAJX动态页
    // Route::get('/home/comics', 'WebController@comics');
    // 用户登录
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    // 用户注册
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    // 发送密码重置链接路由
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    // 密码重置路由
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
    // OAuth
    Route::get('oauth/{name}', 'Auth\OAuthController@index');
    Route::get('oauth/{name}/callback', 'Auth\OAuthController@callback');
    // Wechat
    Route::any('/wechat', 'WechatController@serve');
});

$api = app('Dingo\Api\Routing\Router');
// 私有API
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1', 'middleware' => 'api.auth'], function ($api) {
    $api->get('users', 'UsersController@getUsers');
});
// 公共API
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function($api) {
    $api->get('downloadByID/{id}', 'ComicController@getDownloadByID');
    $api->post('feedback', 'FeedbackController@feedback');
    $api->get('comics', 'ComicController@getComics');
    $api->get('hits/{id}', 'ComicController@hits');
    $api->get('dandanplay/login/{username}/{password}/{appid}/{appsecret}', 'DandanplayController@login');
    $api->post('dandanplay/search', 'DandanplayController@request_list');
    $api->post('comics/updateImage', 'ComicController@updateImage');
});