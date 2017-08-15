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
// inyección de dependencias
Route::bind('usuario', function($user){
	return App\User::find($user);
});
Route::bind('genero', function($genre){
	return App\Genre::find($genre);
});
Route::bind('pelicula', function($movie){
	return App\Movie::find($movie);
});
//

Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');
Route::get('admin', 'FrontController@admin');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('usuario', 'UsuarioController');
Route::resource('genero', 'GeneroController');
Route::get('generos', 'GeneroController@listing');
Route::resource('pelicula', 'MovieController');
Route::resource('mail', 'MailController');