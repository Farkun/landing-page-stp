<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function get() {
        $partner = Partner::get();
        return response()->json([
            'message' => 'OK',
            'payload' => $partner
        ], 200);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string',
            'logo' => 'required|mimes:png,jpg,jpeg,webp'
        ]);
        $filename = $request->logo->hashName();
        $target_dir = storage_path('app/public/partners');
        if (!File::exists($target_dir)) File::makeDirectory($target_dir);
        $request->logo->move($target_dir, $filename);
        $logo_url = '/storage/partners/'.$filename;
        Partner::create([
            'name' => $request->name,
            'url' => $request->url,
            'logo' => $logo_url
        ]);
        return response()->json([
            'message' => 'CREATED',
            'payload' => true
        ], 201);
    }

    public function delete($id) {
        $partner = Partner::find(Crypt::decryptString($id));
        if (!$partner) return response()->json([
            'message' => 'NOT FOUND'
        ], 404);
        $logo_path = str_replace('/storage', storage_path('app/public'), $partner->logo);
        if (File::exists($logo_path)) File::delete($logo_path);
        $partner->delete();
        return response()->json([
            'message' => 'NO CONTENT',
            'payload' => true
        ], 204);
    }
}
