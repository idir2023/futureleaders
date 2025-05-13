<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\UserController;



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/registered-by-me', [DashboardController::class, 'getUserRegisteredByMe'])->name('registered_by_me');
Route::get('/get-money/{id}', [DashboardController::class, 'getMoney'])->name('getMoney');
Route::get('/buy-month/{id}', [DashboardController::class, 'buyMonth'])->name('buyMonth');
Route::post('/get-profit/{id}', [DashboardController::class, 'getProfit'])->name('get-profit');


// Route::get('/consultation', [DashboardController::class, 'getConsultationClient'])->name('consultation.client');
Route::middleware(['auth', 'admin'])->group(function () {

    // Liste des coachs
    Route::resource('coaches', CoachController::class);
    Route::post('/coaches/{user}/change-password', [CoachController::class, 'changePassword']);

    Route::get('ranks', [CoachController::class, 'getRank'])->name('ranks.index');

    Route::get('/ranks/{id}/clients', [CoachController::class, 'getClientsParraines']);

    // 
    Route::resource('drives', DriveController::class);
    Route::post('/send-drive', [ConsultationController::class, 'sendDrive'])->name('sendDrive');
    Route::put('/consultations/{id}/update-drive-link', [ConsultationController::class, 'updateDriveLink'])->name('update.drive_link');


    Route::get('clients', [UserController::class, 'index'])->name('clients.index');

    Route::put('clients/{id}/add-code_promo', [UserController::class, 'addPromoCode'])->name('clients.add-code_promo');

    // Liste des consultations
    Route::resource('consultations', ConsultationController::class);
    // routes/web.php
    Route::post('/send-email/{id}', [ConsultationController::class, 'sendEmail'])->name('consultations.sendEmail');
    Route::post('/send-email-anyerror/{id}', [ConsultationController::class, 'sendEmailError'])->name('consultations.sendEmailError');

    Route::get('/traders', [TraderController::class, 'index'])->name('traders.index');
    Route::delete('/traders/{id}', [TraderController::class, 'destroy'])->name('traders.destroy');
    Route::post('/traders/import', [TraderController::class, 'import'])->name('traders.import');
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
        Route::get('/complete-payment/{id}', [ClientController::class, 'CompletePayment'])->name('complete_paiment');
        Route::patch('/upload/recu/{coach}', [ClientController::class, 'uploadRecu'])->name('upload.recu');
    }
);
