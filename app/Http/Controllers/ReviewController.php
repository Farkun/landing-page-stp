<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function get() {
        $reviews = Review::get();
        return response()->json([
            'message' => 'OK',
            'payload' => $reviews
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'graduated_at' => 'required|string|max:255',
            'message' => 'required|string'
        ]);
        $filename = $request->image->hashName();
        $target_dir = storage_path('app/public/reviews');
        if (!File::exists($target_dir)) File::makeDirectory($target_dir);
        $request->image->move($target_dir, $filename);
        $image_url = '/storage/reviews/'.$filename;
        Review::create([
            'name' => $request->name,
            'image' => $image_url,
            'graduated_at' => $request->graduated_at,
            'message' => $request->message,
        ]);
        return response()->json([
            'message' => 'CREATED',
            'payload' => true
        ], 201);
    }

    public function delete($id) {
        $partner = Review::find(Crypt::decryptString($id));
        if (!$partner) return response()->json([
            'message' => 'NOT FOUND'
        ], 404);
        $image_path = str_replace('/storage', storage_path('app/public'), $partner->image);
        if (File::exists($image_path)) File::delete($image_path);
        $partner->delete();
        return response()->json([
            'message' => 'NO CONTENT',
            'payload' => true
        ], 204);
    }
}
