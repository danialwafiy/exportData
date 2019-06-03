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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/data/deleteSingleData/{data}','API\DataController@deleteSingleData')->name('data.getAllData');
Route::get('/data/getAllData','API\DataController@getAllData')->name('data.getAllData');
Route::get('/data/exportExcel','API\DataController@exportExcel')->name('data.exportExcel');
Route::apiResources(['data' => 'API\DataController']);
