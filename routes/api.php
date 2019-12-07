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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
    Route::get('/get-car-marks', 'CarController@getCarMark')->name('getCarMark');
    Route::get('/get-car-models', 'CarController@getModelsByCarId')->name('getModelsByCarId');
    Route::get('/get-car-configurations', 'CarController@getConfigurationsByModelId')->name('etConfigurationsByModelId');
    Route::get('/get-menu', 'MenuController@getListById')->name('getListById');
    Route::get('/get-product-by-category', 'ProductController@getProductsList')->name('getProductsList');
