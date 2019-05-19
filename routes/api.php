<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth:api']], function () {


});
Route::resource('user', 'UserController')->except('index', 'store');
Route::resource('book', 'BookController');
Route::post('book/read', 'BookController@markRead');
Route::post('book/wanted', 'BookController@markWanted');
Route::get('book/read/{id}', 'BookController@listRead');
Route::get('book/wanted/{id}', 'BookController@listWanted');
Route::resource('contact', 'ContactController');
Route::resource('profile', 'ProfileController');
