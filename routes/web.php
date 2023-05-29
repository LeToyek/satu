<?php

use App\Http\Controllers\Auth\Registration\FunderRegistrationController;
use App\Http\Controllers\Auth\Registration\PartnerRegistrationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundingController;
use App\Http\Controllers\Marketplace\MitraController;
use App\Http\Controllers\Marketplace\ObligasiController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WalletController;
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
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about-us', function () {
    return view('pages.about-us');
});
Route::get('/cara-kerja/{page}', function ($page) {
    return view('pages.cara-kerja-' . $page);
})->name('cara-kerja.show');
Route::get('/news/{id}', function ($id) {
    return view('pages.news' . $id);
})->name('news.show');
Route::get('/faq', function () {
    return view('pages.faq');
});
Route::get('/syarat-ketentuan', function () {
    return view('pages.syarat-ketentuan');
});
Route::get('/kebijakan-privasi', function () {
    return view('pages.kebijakan-privasi');
});
Route::get('/testimoni', function () {
    return view('pages.testimoni');
});
Route::get('/contact-us', function () {
    return view('pages.contact-us');
});
Route::prefix('dashboard')->group(function () {
    Route::resource('/campaign', CampaignController::class);
    Route::get('/campaign/{campaign}/disburse', [CampaignController::class, 'disburse'])->name('campaign.disburse');
    Route::post('/campaign/{campaign}/refund', [CampaignController::class, 'refund'])->name('campaign.refund');
    Route::prefix('/portofolio')->group(function () {
        Route::get('/', [FundingController::class, 'index'])->name('portofolio.index');
        Route::get('/{id}', [FundingController::class, 'show_sell'])->name('portofolio.sell');
        Route::post('/{id}', [FundingController::class, 'sell']);
    });
    Route::prefix('/marketplace')->group(function () {
        Route::get('/mitra', [MitraController::class, 'index']);
        Route::post('/mitra/{id}', [MitraController::class, 'fund'])->middleware('auth', 'funder');
        Route::get('/mitra/{id}', [MitraController::class, 'show']);
        Route::get('/mitra/checkout/invoice', [MitraController::class, 'showInvoice'])->name('invoice');
        Route::prefix('/obligasi')->group(function () {
            Route::get('/', [ObligasiController::class, 'index'])->name('obligasi.index');
            Route::get('/{id}', [ObligasiController::class, 'show']);
            Route::post('/buy', [ObligasiController::class, 'buy_funding']);
            Route::get('/invoice/{id}', [ObligasiController::class, 'showInvoice'])->name('invoice.obligasi');
        });
    });
    Route::resource('/profile', ProfileController::class);
    Route::prefix('/wallet')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->name('wallet.index');
        Route::post('/topup', [WalletController::class, 'topup'])->name('wallet.topup');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});
Route::prefix('/register')->group(
    function () {
        Route::get('/partner', [PartnerRegistrationController::class, 'index'])->name('register.partner.get');
        Route::post('/partner', [PartnerRegistrationController::class, 'store'])->name('register.partner.post');
        Route::get('/funder', [FunderRegistrationController::class, 'index'])->name('register.funder.get');
        Route::post('/funder', [FunderRegistrationController::class, 'store'])->name('register.funder.post');
    }
);
