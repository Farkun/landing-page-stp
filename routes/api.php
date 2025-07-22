<?php

use App\Http\Controllers\AppSettingController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tes', [AppSettingController::class, 'tes']);
    Route::put('/update-color', [AppSettingController::class, 'updateColors']);
    Route::put('/update-app-name', [AppSettingController::class, 'updateAppName']);
});