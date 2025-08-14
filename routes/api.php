<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\HeroCarouselController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ResourceLinkController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tes', [AppSettingController::class, 'tes']);
    Route::put('/update-color', [AppSettingController::class, 'updateColors']);
    Route::put('/update-app-name', [AppSettingController::class, 'updateAppName']);
    Route::put('/update-contact-address', [AppSettingController::class, 'updateContactAndAddress']);
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
    Route::delete('/delete-partners/{id}', [PartnerController::class, 'delete']);

    Route::get('/get-step', [StepController::class, 'get']);
    Route::post('/add-step', [StepController::class, 'store']);
    Route::put('/update-step/{id}', [StepController::class, 'update']);
    Route::delete('/delete-step/{id}', [StepController::class, 'delete']);

    Route::get('/get-reviews', [ReviewController::class, 'get']);
    Route::post('/add-reviews', [ReviewController::class, 'store']);
    Route::put('/update-reviews/{id}', [ReviewController::class, 'update']);
    Route::delete('/delete-reviews/{id}', [ReviewController::class, 'delete']);

    Route::post('/add-socials', [SocialController::class, 'store']);
    Route::delete('/delete-socials/{id}', [SocialController::class, 'destroy']);

    Route::post('/add-resource', [ResourceLinkController::class, 'addResource']);
    Route::put('/update-resource/{id}', [ResourceLinkController::class, 'updateResource']);
    Route::delete('/delete-resource/{id}', [ResourceLinkController::class, 'deleteResource']);
    Route::post('/add-quick-link', [ResourceLinkController::class, 'addQuickLink']);
    Route::put('/update-quick-link/{id}', [ResourceLinkController::class, 'updateQuickLink']);
    Route::delete('/delete-quick-link/{id}', [ResourceLinkController::class, 'deleteQuickLink']);
});