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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');


//Books Setting
Route::get('/books', 'BooksController@index');
Route::get('/books-create', 'BooksController@create');
Route::get('/edit-book/{id}', 'BooksController@edit');
Route::get('/book-detail/{id}', 'BooksController@show');
Route::post('/book-save', 'BooksController@store');
Route::put('/book-update/{id}', 'BooksController@update');
Route::delete('/delete-book/{id}', 'BooksController@destroy');
