<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/controller', 'App\Http\Controllers\Api\BoxController@index')->withoutMiddleware('throttle:api');;
Route::get('/getall', 'App\Http\Controllers\Api\MainController@index')->withoutMiddleware('throttle:api');;
Route::post('/addplant', 'App\Http\Controllers\Api\MainController@store');
Route::get('/plant/{plant_id}', 'App\Http\Controllers\Api\MainController@show')->withoutMiddleware('throttle:api');;
Route::put('/plant/{plant_id}', 'App\Http\Controllers\Api\MainController@update')->withoutMiddleware('throttle:api');;
Route::delete('/plant/{plant_id}', 'App\Http\Controllers\Api\MainController@destroy');