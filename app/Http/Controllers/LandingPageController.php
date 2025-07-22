<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        return view('landingPage', [
            'app_setting' => $app_setting
        ]);
    }
}
