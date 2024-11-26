<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;

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

// ------------- HOME ROUTES ------------ //
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/visa-query', 'visaQuery')->name('visa.query');
    Route::get('/find-query', 'findVisa')->name('visa.find');
    Route::post('/search-visa', 'search')->name('search.visa');
    Route::get('/verify/qrcode/{link}', 'verifyQrCode')->name('verify.qr');
});
Route::get('/visa/{id}', [VisaController::class, 'show'])->name('visa.show');
Route::get('/visa/{id}/pdf', [VisaController::class, 'generatePdf'])->name('visa.pdf');

Route::middleware('auth')->group(function () {
    
    //---------- DASHBOARD ROUTES ----------//
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard.index');
    });

    // ----------------- VISA ROUTES ------------//
    // Route::resource('/visa', VisaController::class);
    Route::controller(VisaController::class)->group(function(){
        Route::put('/visa/update-status/{id}', 'updateVisaStatus')->name('visa.update.status');
    });

    // ----------------- MANUAL VISA ROUTES ------------//
    Route::resource('/manual-visa', ManualVisaController::class);
    Route::controller(ManualVisaController::class)->group(function(){
        Route::put('/manual-visa/update-status/{id}', 'updateManualVisaStatus')->name('manual.visa.update.status');
    });

    Route::middleware('is.admin')->group(function () {
        //---------- USER ROUTES ----------//
        Route::resource('/user', UserController::class, ['except' => ['show']]);
        Route::controller(UserController::class)->group(function(){
            Route::put('/user/update-status/{id}', 'updateUserStatus')->name('user.update.status');
        });
    });
});

//---------- AUTHENTICATION ROUTES ----------//
Route::controller(AuthController::class)->group(function() {
    Route::middleware('guest')->group(function () {
        Route::get('/admin/login', 'login')->name('login');
        Route::post('/attempt-login', 'attemptLogin')->name('attempt.login');
    });

    Route::post('/logout', 'logout')->name('logout');
});
Route::get('reload-captcha', function () {
    return response()->json(['captcha'=> captcha_img()]);
});