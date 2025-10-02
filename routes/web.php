<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
// Impor class verifikasi bawaan Laravel

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

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
    Route::post('/login', [AuthController::class, 'login'])->name('loginpost');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard.user.index');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->name('verification.notice');

    // Menangani link dari email yang di-klik pengguna
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware('signed')->name('verification.verify');

    // Menangani permintaan untuk mengirim ulang email verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent', true);
    })->middleware('throttle:6,1')->name('verification.send');
});
