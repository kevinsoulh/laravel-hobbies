<?php

use Illuminate\Support\Facades\Route;

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
    return view('start');
});

Route::get('/start', function () {
    return view('start');
});

Route::get('/info', function () {
    return view('info');
});

Route::resource('hobby', 'HobbyController');
Route::resource('user', 'UserController');
Route::resource('tag', 'TagController');

Route::get('/register', 'auth\AuthController@register')->name('register');
Route::post('/register', 'auth\AuthController@storeUser');

Route::get('/login', 'auth\AuthController@login')->name('login');
Route::post('/login', 'auth\AuthController@authenticate');
Route::get('logout', 'auth\AuthController@logout')->name('logout');

Route::get('/home', 'auth\AuthController@home')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', 'hobbyTagController@attachTag');
Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', 'HobbyTagController@detachTag');