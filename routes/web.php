<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ClientController;


// Route::get('/', function () {
//     return view('welcome');
// });
// routes/web.php
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 
Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Liste des coachs
Route::resource('coaches', CoachController::class);
Route::get('ranks', [CoachController::class, 'getRank'])->name('ranks.index');

// Liste des consultations
Route::resource('consultations', ConsultationController::class);


});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath'
        ]
    ],
    function () {
        Route::get('/', [ClientController::class, 'index'])->name('home');

        Route::get('/create-consultation/{price}', [ClientController::class, 'CreateConsultation'])->name('create-consultation');
        Route::post('/create-consultation', [ClientController::class, 'StoreConsultation'])->name('store-consultation');
        Route::get('/complete-payment', [ClientController::class, 'CompletePayment'])->name('complete_paiment');
        Route::put('/upload/recu/{coach}', [ClientController::class, 'uploadRecu'])->name('upload.recu');

    }
);
