<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\MarketplaceController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

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
Route::prefix('dashboard')->group(function(){
    Route::resource('/campaign', CampaignController::class);
    Route::get('/marketplace/mitra',[MarketplaceController::class,'index_mitra']);
    Route::get('/', function () {
        return view('dashboard.pages.index');
    });
});
