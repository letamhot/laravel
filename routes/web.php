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
Route::resource('users','UsersController');
Auth::routes();

Route::get('/index', 'UsersController@index')->name('index');
Route::get('/create', 'UsersController@create')->name('create');
Route::get('/edit', 'UsersController@edit')->name('edit');
Route::get('/layouts', 'UsersController@layouts')->name('layouts');
Route::get('/show', 'UsersController@show')->name('show');

Route::resource('product','ProductController');
Auth::routes();
Route::get('/index', 'ProductController@index')->name('index');
Route::get('/create', 'ProductController@create')->name('create');
Route::get('/edit', 'ProductController@edit')->name('edit');
Route::get('/layouts', 'ProductController@layouts')->name('layouts');
Route::get('/show', 'ProductController@show')->name('show');

Route::resource('producer','ProducerController');
Auth::routes();
Route::get('/index', 'ProducerController@index')->name('index');
Route::get('/create', 'ProducerController@create')->name('create');
Route::get('/edit', 'ProducerController@edit')->name('edit');
Route::get('/layouts', 'ProducerController@layouts')->name('layouts');
Route::get('/show', 'ProducerController@show')->name('show');

Route::resource('type','TypeController');
Auth::routes();
Route::get('/index', 'TypeController@index')->name('index');
Route::get('/create', 'TypeController@create')->name('create');
Route::get('/edit', 'TypeController@edit')->name('edit');
Route::get('/layouts', 'TypeController@layouts')->name('layouts');
Route::get('/show', 'TypeController@show')->name('show');

