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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//dropzones routes

Route::get('/posts','PostController@index')->name('posts.index');
Route::get('/posts/{id}','PostController@show')->name('posts.show');
Route::post('/posts/{id}','PostController@upload')->name('posts.upload');

Route::delete('/images/{id}' , 'ImageController@destroy')->name('images.destroy');
