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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/rp.com', 'MyController@getView_RP')-> name('rp');
Route::post('/rp.com', 'MyController@postView_RP');

Route::get('/rp.com/login', 'MyController@getLogin_RP')-> name('rplogin');
Route::post('/rp.com/login', 'MyController@postlogin_RP');

Route::get('/rp.com/cb', 'MyController@getCallBack_RP')-> name('callback');
Route::post('/rp.com/cb', 'MyController@postCallBack_RP');
Route::get('/rp.com/checkToken', 'MyController@checkToken');

Route::get('/rp.com/userinfo', 'MyController@getUser_RP')-> name('userinfo');
Route::post('/rp.com/userinfo', 'MyController@postUser_RP');

Route::get('/rp.com/login-error', 'MyController@getError')->name('login-error');




 