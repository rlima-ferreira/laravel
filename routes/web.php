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

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('user', 'UserController')->except('index', 'store');

    Route::resource('book', 'BookController');
    Route::get('books/update', 'BookController@showUpdate')->name('book-update');
    Route::get('books/delete', 'BookController@showDelete')->name('book-delete');
    Route::post('book/read', 'BookController@markRead')->name('mark-read');
    Route::post('book/wanted', 'BookController@markWanted')->name('mark-wanted');
    Route::get('books/read', 'BookController@listRead')->name('book-read');
    Route::get('books/wanted', 'BookController@listWanted')->name('book-wanted');

    Route::resource('contact', 'ContactController');
    Route::get('contacts/update', 'ContactController@showUpdate')->name('contact-update');
    Route::get('contacts/delete', 'ContactController@showDelete')->name('contact-delete');

    Route::resource('profile', 'ProfileController');
    Route::get('profiles/update', 'ProfileController@showUpdate')->name('profile-update');
    Route::get('profiles/delete', 'ProfileController@showDelete')->name('profile-delete');
});
