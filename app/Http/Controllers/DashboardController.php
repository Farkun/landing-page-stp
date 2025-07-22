<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $app_setting = AppSetting::first();
        return view('authenticated.dashboard', [
            'app_setting' => $app_setting
        ]);
    }
}
