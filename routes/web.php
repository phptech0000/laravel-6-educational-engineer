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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/dashboard', 'HomeController@adminHome')->name('admin.home');
Route::get('/CreateDeps', 'DepsController@create')->name('add_deps');
Route::post('/storeDeps', 'DepsController@store')->name('store_deps');
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('deps', 'DepsController');
});




Auth::routes();


