<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:social',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'url' => 'required|string'
        ]);
        if (!$request->hasFile('image')) return response()->json(['message' => 'BAD REQUEST'], 400);
        $filename = $request->image->hashName();
        $target_dir = storage_path('app/public/socials');
        if (!File::exists($target_dir)) File::makeDirectory($target_dir);
        $request->image->move($target_dir, $filename);
        $social = Social::create([
            'name' => $request->name,
            'image' => '/storage/socials/'.$filename,
            'url' => $request->url,
        ]);
        $social->encrypted_id = Crypt::encryptString($social->id);
        return response()->json([
            'message' => 'CREATED',
            'payload' => $social
        ], 201);
    }

    public function destroy($id) {
        $social = Social::find(Crypt::decryptString($id));
        if (!$social) return response()->json(['message' => 'NOT FOUND'], 404);
        $filepath = str_replace('/storage', storage_path('app/public'), $social->image);
        if (File::exists($filepath)) File::delete($filepath);
        $social->delete();
        return response()->json(['message' => 'OK', 'payload' => true], 200);
    }
}
