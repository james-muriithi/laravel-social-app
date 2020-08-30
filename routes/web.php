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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('user_profile');
Route::PUT('/profile/avatar', 'ProfileController@updateAvatar')->name('update_avatar');
Route::PUT('/profile/info', 'ProfileController@updateInfo')->name('update_info');
Route::PUT('/profile/password', 'ProfileController@updatePassword')->name('update_password');
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');
