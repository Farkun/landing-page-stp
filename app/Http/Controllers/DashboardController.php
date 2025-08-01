<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use App\Models\Document;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $documents = Document::all();        
        $carousel_image = CarouselImage::get();
        return view('authenticated.dashboard', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'documents' =>  $documents,
            'carousel_image' => $carousel_image,
        ]);
    }
}
