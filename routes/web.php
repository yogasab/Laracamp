<?php

use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('checkouts/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkouts.success');
Route::get('checkouts/{camp:slug}', [CheckoutController::class, 'create'])->name('checkouts.create');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Socialite Google
Route::get('login-google', [UserController::class, 'authGoogle'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback']);

require __DIR__ . '/auth.php';
