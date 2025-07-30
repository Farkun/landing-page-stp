<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use App\Models\Document;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $documents = Document::orderBy('id')->get();
        $carousel_image = CarouselImage::get();
        return view('landingPage', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'documents' => $documents,
            'carousel_image' => $carousel_image,
        ]);
    }
}
