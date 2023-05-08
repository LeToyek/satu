<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('pages.home');
});
Route::get('/about-us', function () {
    return view('pages.about-us');
});
Route::get('/cara-kerja', function () {
    return view('pages.cara-kerja');
});
Route::get('/faq', function () {
    return view('pages.faq');
});
Route::get('/testimoni', function () {
    return view('pages.testimoni');
});
Route::get('/contact-us', function () {
    return view('pages.contact-us');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
