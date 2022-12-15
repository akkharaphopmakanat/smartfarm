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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/controller', [App\Http\Controllers\HomeController::class, 'controller']);
Route::get('/detail/{plant_id}', [App\Http\Controllers\FieldView::class, 'index'])->name('home');
Route::get('/history', [App\Http\Controllers\ChartController::class, 'index']);



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

