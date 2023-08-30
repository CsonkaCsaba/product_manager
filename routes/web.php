<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Auth::routes(['verify' => true]);

Route::post('/','App\Http\Controllers\ProductController@store')->name('store')->middleware('auth');
Route::delete('/{id}', 'App\Http\Controllers\ProductController@destroy')->name('destroy')->middleware('auth');
Route::get('/edit{id}', 'App\Http\Controllers\ProductController@showData')->name('edit')->middleware('auth');
Route::post('/edit', 'App\Http\Controllers\ProductController@update')->name('updated')->middleware('auth');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
