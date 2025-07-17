<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    public function tes() {
        return response()->json([
            'message' => 'kzxchgjkl;bvkbbjhvkcgxfjhvbjknlvm'
        ]);
    }

    public function updateNameAndLogo(Request $request) {
        $settings = AppSetting::first();
        if (!$settings) return response()->json(['message' => 'no settings found']);
        $request->validate([
            'app_name' => 'required|string',
            'app_logo' => 'required|string',
        ]);
        $update = $settings->update([
            'app_name' => $request->app_name,
            'app_logo' => $request->app_logo
        ]);
        if (!$update) return response()->json(['message' => 'Internal Server Error']);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ]);
    }

    public function updateContactAndAddress(Request $request) {
        $settings = AppSetting::first();
        if (!$settings) return response()->json(['message' => 'no settings found']);
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string'
        ]);
        $update = $settings->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        if (!$update) return response()->json(['message' => 'Internal Server Error']);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ]);
    }

    public function updateColors(Request $request) {
        $settings = AppSetting::first();
        if (!$settings) return response()->json(['message' => 'no settings found']);
        $request->validate([
            'primary_color' => 'required|string',
            'primary_content_color' => 'required|string',
            'secondary_color' => 'required|string',
            'secondary_content_color' => 'required|string',
            'accent_color' => 'required|string'
        ]);
        $update = $settings->update([
            'primary_color' => $request->primary_color,
            'primary_content_color' => $request->primary_content_color,
            'secondary_color' => $request->secondary_color,
            'secondary_content_color' => $request->secondary_content_color,
            'accent_color' => $request->accent_color
        ]);
        if (!$update) return response()->json(['message' => 'Internal Server Error']);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ]);
    }
}
