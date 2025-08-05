<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use App\Models\Document;
use App\Models\Partner;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $documents = Document::all();
        $reviews = Review::all();        
        $carousel_image = CarouselImage::get();
        $partners = Partner::get();
        return view('authenticated.dashboard', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'documents' =>  $documents,
            'reviews' =>  $reviews,
            'carousel_image' => $carousel_image,
            'partners' =>  $partners,
        ]);
    }
}
