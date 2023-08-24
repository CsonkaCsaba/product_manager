<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'App\Http\Controllers\ProductController@index');


Auth::routes();

Route::post('/','App\Http\Controllers\ProductController@store')->name('store')->middleware('auth');
Route::delete('/{id}', 'App\Http\Controllers\ProductController@destroy')->name('destroy')->middleware('auth');
Route::get('/edit{id}', 'App\Http\Controllers\ProductController@showData')->name('edit')->middleware('auth');
Route::post('/edit', 'App\Http\Controllers\ProductController@update')->name('updated')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
