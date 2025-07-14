<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landingPage', function () {
    return view('landingPage');
});

Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/manage', [AuthController::class, 'loginView'])->name('login.view');
    Route::post('/manage/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(AuthenticatedMiddleware::class)->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/manage/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});