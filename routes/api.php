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
    Route::resource('user', 'UserController')->except('store');
    Route::resource('book', 'BookController');
});
Route::resource('contact', 'ContactController');
Route::resource('profile', 'ProfileController');
