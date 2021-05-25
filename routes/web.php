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

Route::get('/', "HomeController@index")->name('home');

Route::get('/login', "UsuarioController@login")->name('login');
Route::get('/logout', "UsuarioController@logout")->name('logout');
Route::post('/logar', "UsuarioController@logar")->name('logar');
Route::get('/register', "UsuarioController@register")->name('register');
Route::post('/regiter_store', "UsuarioController@regiter_store")->name('regiter_store');

Route::group(['prefix' => "automovel", 'middleware' => "admin_auth"], function () {
    Route::get('/', "AutomovelController@index");
    Route::get('/create', "AutomovelController@create");
    Route::get('/edit/{id}', "AutomovelController@edit");
    Route::post('/store', "AutomovelController@store");
    Route::put('/update/{id}', "AutomovelController@update");
});

Route::group(['prefix' => "reserva", 'middleware' => "admin_auth"], function () {
    Route::get('/', "ReservaController@index");
});

Route::group(['prefix' => "cliente", 'middleware' => "admin_auth"], function () {
    Route::get('/', "ClienteController@index");
});

Route::group(['prefix' => "reservar", 'middleware' => "user_auth"], function () {
    Route::get('/', "ReservaController@create");
    Route::get('/edit/{id}', "ReservaController@edit");
    Route::put('/update/{id}', "ReservaController@update");
});