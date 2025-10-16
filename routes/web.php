<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppointmentAdminController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\ForgotPasswordController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


// --- Rute Publik (Bisa Diakses Siapa Saja) ---
Route::get('/', function () {
    return view('pages.homepage.index');
})->name('home');

Route::get('/about-us', function () {
    return view('pages.aboutus.index');
});

Route::get('/services', function () {
    return view('pages.services.index');
});

Route::get('/membership', function () {
    return view('pages.membership.index');
})->name('membership');


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login-post', [AuthController::class, 'login'])->name('loginpost');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});



// Dashboard Customer
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::patch('/profile/update', [CustomerDashboardController::class, 'update'])->name('customer.profile.update');


    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index')->middleware('role:customer');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store')->middleware('role:customer');


    Route::get('/additional-question', [QuestionnaireController::class, 'index'])->name('questionnaire.index')->middleware('role:customer');
    Route::patch('/additional-question', [QuestionnaireController::class, 'update'])->name('questionnaire.update')->middleware('role:customer');
});

// Dashboard Admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::prefix('manage')->name('manage.')->group(function () {

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        Route::get('/appointments', [AppointmentAdminController::class, 'index'])->name('appointments.index');
        Route::patch('/appointments/{appointment}', [AppointmentAdminController::class, 'update'])->name('appointments.update');
        Route::get('/appointments/export', [AppointmentController::class, 'export'])->name('appointments.export');
        
    });
    Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit_logs');
});



// Rute untuk verifikasi email
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');

    // Menangani link dari email yang di-klik pengguna
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/additional-question');
    })->middleware('signed')->name('verification.verify');

    // Menangani permintaan untuk mengirim ulang email verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent', true);
    })->middleware('throttle:6,1')->name('verification.send');
});
