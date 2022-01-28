<?php

use App\Http\Controllers\User\Checkout\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Dashboard\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\Dashboard\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\Checkout\CheckoutController as AdminCheckout;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {
    // Checkout Routes
    Route::get('checkout/success', [CheckoutController::class, 'checkoutSuccess'])
        ->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])
        ->name('checkout.create')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp:slug}', [CheckoutController::class, 'store'])
        ->name('checkout.store')->middleware('ensureUserRole:user');
    // User Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');
    // Admin Dashboard Routes
    Route::prefix('user/dashboard')->namespace('User')->middleware('ensureUserRole:user')->name('user.')->group(function () {
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });
    // Admin Dashboard Routes
    Route::prefix('admin/dashboard')->namespace('Admin')->middleware('ensureUserRole:admin')->name('admin.')->group(function () {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        // Admin Dashboard
        Route::put('checkout/update-payment-status/{checkout}', [AdminCheckout::class, 'updatePaymentStatus'])
            ->middleware('ensureUserRole:admin')->name('change.payment.status');
    });
});

// Socialite Google
Route::get('login-google', [UserController::class, 'authGoogle'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

require __DIR__ . '/auth.php';
