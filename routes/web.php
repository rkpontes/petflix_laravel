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

Route::get('/', 'LoginController@verifyAuth')->name('index');

Route::get('logout', function(){
    Auth::logout();
    Session::flush();
    return redirect()->route('index');
})->name('logout');

Route::post('login', 'LoginController@login');
Route::post('register', 'LoginController@register');

Route::get('browser', 'LoginController@browser')->name('browser');

Route::post('video/add', 'VideosController@store');
