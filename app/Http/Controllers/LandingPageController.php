<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $carousel_image = CarouselImage::get();
        return view('landingPage', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'carousel_image' => $carousel_image,
        ]);
    }
}
