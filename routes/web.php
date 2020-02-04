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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('deps', 'DepsController');
    Route::get('user/index', 'UserController@index')->name('users.index');
});
Route::get('registeruser/ceate', 'UserController@create')->name('registeruser.create');
Route::post('/registeruser/store', 'UserController@store')->name('registeruser.store');
Route::get('/branch/get/{id}', 'UserController@getBranch')->name('branch');
Route::get('/dep/get/{id}', 'UserController@getdep_name')->name('dep_name');
Route::get('/user/verify/{token}' , 'UserController@verifyUser')->name('user.verify');
Auth::routes(['verify' => true]);
Auth::routes();



