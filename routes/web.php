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
Route::get('404', function () {
    return view('admin.404');
 });

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('post','PostsController');
Auth::routes();

Route::get('/index', 'PostsController@index')->name('index');
Route::get('/create', 'PostsController@create')->name('create');
Route::get('/edit', 'PostsController@edit')->name('edit');
Route::get('/layouts', 'PostsController@layouts')->name('layouts');
Route::get('/show', 'PostsController@show')->name('show');

Route::resource('product','ProductController');
Auth::routes();
Route::get('/index', 'ProductController@index')->name('index');
Route::get('/create', 'ProductController@create')->name('create');
Route::get('/edit', 'ProductController@edit')->name('edit');
Route::get('/layouts', 'ProductController@layouts')->name('layouts');
Route::get('/show', 'ProductController@show')->name('show');
