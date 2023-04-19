<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleSocialiteController;

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
    return view('landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('auth/facebook', [App\Http\Controllers\FacebookController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [App\Http\Controllers\FacebookController::class, 'loginWithFacebook']);

Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);
