<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\HeroCarouselController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tes', [AppSettingController::class, 'tes']);
    Route::put('/update-color', [AppSettingController::class, 'updateColors']);
    Route::put('/update-app-name', [AppSettingController::class, 'updateAppName']);
    Route::put('/update-hero-heading', [HeroCarouselController::class, 'updateHeading']);
    Route::put('/update-hero-body', [HeroCarouselController::class, 'updateBody']);
    Route::put('/update-hero-button-label', [HeroCarouselController::class, 'updateButtonLabel']);
    Route::put('/update-hero-button-url', [HeroCarouselController::class, 'updateButtonUrl']);
    Route::put('/update-hero-animo', [HeroCarouselController::class, 'updateAnimo']);
    Route::put('/update-hero-selected', [HeroCarouselController::class, 'updateSelected']);
    Route::put('/update-document/{id}', [DocumentController::class, 'update']);
    Route::post('/add-carousel', [HeroCarouselController::class, 'addCarousel']);
    Route::delete('/delete-carousel/{id}', [HeroCarouselController::class, 'deleteCarousel']);

    Route::get('/get-partners', [PartnerController::class, 'get']);
    Route::post('/add-partners', [PartnerController::class, 'store']);
    Route::delete('/delete-partners', [PartnerController::class, 'delete']);

    Route::get('/get-reviews', [ReviewController::class, 'get']);
    Route::post('/add-reviews', [ReviewController::class, 'store']);
    Route::delete('/delete-reviews', [ReviewController::class, 'delete']);
});