<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $carousel_image = CarouselImage::get();
        return view('authenticated.dashboard', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'carousel_image' => $carousel_image,
        ]);
    }
}
