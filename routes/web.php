<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landingPage', [LandingPageController::class, 'index']);

Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/manage', [AuthController::class, 'loginView'])->name('login');
    Route::post('/manage/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(AuthenticatedMiddleware::class)->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/manage/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// api
// Route::middleware('api')
// ->prefix('api')
// ->group(function () {
//     Route::get('/tes', [AppSettingController::class, 'tes'])->middleware('auth:sanctum');
// });