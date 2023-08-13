<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EmailValidationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BusinessInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Settings\AccountController;
use App\Http\Controllers\Settings\BillingController;
use App\Http\Controllers\HelperController;

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
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('show-register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/login', [LoginController::class, 'index'])->name('show-login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/email/verify/{id}/{hash}', EmailValidationController::class)->middleware(['signed'])->name('verification.verify');

Route::get('/logout', LogoutController::class)->name('logout');

Route::prefix('helper')->as('helper.')->group(function() {
    Route::get('/regencies/{province_id?}',[HelperController::class,'getRegencies'])->name('regencies');
    Route::get('/districts/{regency_id?}',[HelperController::class,'getDistricts'])->name('districts');
    Route::get('/villages/{district_id?}',[HelperController::class,'getVillages'])->name('villages');
    Route::get('/zip-code/{village_id?}',[HelperController::class,'getZipCode'])->name('zip_code');
});

Route::middleware(['auth','is.complete'])->prefix('business-info')->as('business-info.')->group(function () {
    Route::get('/', [BusinessInfoController::class,'index'])->name('index');
    Route::post('/', [BusinessInfoController::class,'store'])->name('store');
    Route::put('/edit', [BusinessInfoController::class,'update'])->name('update');
});

Route::middleware(['auth','is.uncomplete'])->group(function () {
    Route::get('/home', HomeController::class)->name('home');

    Route::prefix('settings')->as('settings.')->group(function () {
        Route::prefix('accounts')->as('accounts.')->group(function () {
            Route::get('/', [AccountController::class,'index'])->name('index');
            Route::get('/edit', [AccountController::class,'edit'])->name('edit');
            Route::put('/edit', [AccountController::class,'update'])->name('update');
        });
        Route::prefix('billing')->as('billing.')->group(function () {
            Route::get('/', [BillingController::class,'index'])->name('index');
        });
    });
});