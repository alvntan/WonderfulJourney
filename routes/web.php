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

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/', 'HomeController@home');
Route::get('/user/signup', 'UserController@signup_page')->name("signup_page");
Route::post('/users/signup', 'UserController@signup')->name("signup");
Route::get('/user/login', 'UserController@login_page')->name("login_page");
Route::post('/users/login', 'UserController@login')->name('login');
Route::get('/user/update', 'UserController@update_page')->name("update_page");
Route::post('/users/update', 'UserController@update')->name('update');
Route::get('/users', 'UserController@get')->name('get_user');
Route::delete('/users/{id}','UserController@delete')->name('delete_user');
Route::post('users/logout', 'UserController@logout')->middleware('auth')->name('logout');

Route::get('/article/create','ArticleController@create_article_page')->name('create_article_page');
Route::post('/articles/create','ArticleController@create')->name('create_article');
Route::get('/articles', 'ArticleController@get')->name('get_article');
Route::delete('/article/{id}','ArticleController@delete')->name('delete_article');



