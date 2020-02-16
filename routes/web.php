<?php

use App\Events\UserHasRegistered;
use App\User;
use Illuminate\Http\Request;

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
Route::group(['middleware' => ['auth']], function() {
    Route::get('/adminapprove/{email}', 'UserAuth\AdminController@adminapprove')->name('admin.approve');
    Route::get('/users/{id}/user_profile', 'UserController@edit')->name('users.user.profile');
    Route::get('/users/staff', 'UserController@Staff_index')->name('users.staff');
    
    
    Route::post('users/{user}/follow', 'UserController@follow')->name('users.follow');
    Route::delete('users/{user}/unfollow', 'UserController@unfollow')->name('users.unfollow');
    Route::get('/notification', 'UserController@notifications')->name('notification');
    Route::get('/notification/{id}' ,'UserController@showNotification' )->name('notification.show');
    Route::get('/deletenotifcation/{id}' , 'UserController@DeleteNotification')->name('notification.delete');
    Route::post('/broadcast', function (Request $request) {
        $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'));
        return $pusher->socket_auth($request->request->get('channel_name'), $request->request->get('socket_id'));
    })->name('broadcast');

//Dashboard 
    Route::group(['middleware' => ['admin']], function () {
        Route::resource('roles', 'RoleController');
        Route::resource('deps', 'DepsController');

        Route::get('/CreateDeps', 'DepsController@create')->name('add_deps');
        Route::post('/storeDeps', 'DepsController@store')->name('store_deps');
        Route::get('user/index', 'UserController@index')->name('users.index');
        Route::get('/dashboard', 'HomeController@adminHome')->name('admin.home');
//maibox 
        Route::get('mailbox/mailbox', 'UserAuth\MailController@mailbox')->name('admin.mailbox');
        Route::get('mailbox/readmail', 'UserAuth\MailController@readmail')->name('admin.readmail');
        Route::get('mailbox/mailcompse', 'UserAuth\MailController@mailcompse')->name('admin.mailcompose');
    });
});

Route::get('registeruser/ceate', 'UserController@create')->name('registeruser.create');
Route::post('/registeruser/store', 'UserController@store')->name('registeruser.store');
Route::get('/branch/get/{id}', 'UserController@getBranch')->name('branch');
Route::get('/dep/get/{id}', 'UserController@getdep_name')->name('dep_name');
Route::get('/user/verify/{token}', 'UserController@verifyUser')->name('user.verify');
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/foregetpassowrd', 'UserAuth\forgetpasswordController@index')->name('user.forgetpassword');
Route::post('/resetpasssword', 'UserAuth\forgetpasswordController@store')->name('user.restpassword');
Route::get('/restpassword/{token}', 'UserAuth\forgetpasswordController@dirctRestPasswordPage')->name('user.RestPassword');
Route::post('/updatepasword', 'UserAuth\forgetpasswordController@RestPassword')->name('user.updatepassword');
Route::get('/resetmessage/{token}', 'UserAuth\forgetpasswordController@RestMessage')->name('user.restmessage');

