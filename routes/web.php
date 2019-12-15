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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/show-product/{productId}/{menuId}', 'Api\ProductController@showProduct')->name('showProduct');
Route::get('/make-order/{bucketId}', 'OrderController@index')->name('showProduct');
