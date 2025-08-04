<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landingPage', [LandingPageController::class, 'index']);

Route::get('/document/{id}', [DocumentController::class, 'show'])->name('document.show');

Route::middleware(['guest', 'prevent-back-history'])->group(function () {
    Route::get('/manage', [AuthController::class, 'loginView'])->name('login');
    Route::post('/manage/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['authenticated', 'prevent-back-history'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/manage/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});