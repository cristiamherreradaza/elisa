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

// Route::get('home', 'SocialController@inicio')->name('home');


/*Route::get('/home', function () {
    return view('home');
});*/

Route::get('/', 'SocialController@inicio');
// Route::get('/', 'home');

Auth::routes();

// PANEL DE CONTROL
Route::get('/home', 'PanelController@inicio');
Route::get('Panel/inicio', 'PanelController@inicio');

// RED SOCIAL
Route::get('Social/inicio', 'SocialController@inicio');

// USUARIOS
Route::get('User/listado', 'UserController@listado');