<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CarouselImage;
use App\Models\Hero;
use App\Models\Document;
use App\Models\Partner;
use App\Models\QuickLink;
use App\Models\Resource;
use App\Models\Review;
use App\Models\Social;
use App\Models\SelectionStep;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        $hero = Hero::first();
        $documents = Document::orderBy('id')->get();
        $reviews = Review::all();
        $selection_steps = SelectionStep::all();
        $carousel_image = CarouselImage::get();
        $partners = Partner::get();
        $socials = Social::get();

        $step_title = $selection_steps->firstWhere('title', '!=', null);

        $steps_with_description = $selection_steps->filter(function ($item) {
            return $item->description !== null;
        });
        $resources = Resource::get();
        $quick_links = QuickLink::get();
        return view('landingPage', [
            'app_setting' => $app_setting,
            'hero' => $hero,
            'documents' => $documents,
            'reviews' => $reviews,
            'carousel_image' => $carousel_image,
            'partners' => $partners,
            'socials' => $socials,
            'step_title' => $step_title,
            'steps_with_description' => $steps_with_description,
            'resources' => $resources,
            'quick_links' => $quick_links,
        ]);
    }
}
