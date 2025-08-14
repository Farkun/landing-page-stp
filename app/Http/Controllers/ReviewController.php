<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'NOT FOUND'], 404);
        }

        $validated = $request->validate([
            'name' => 'nullable|string',
            'graduated_at' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        $review->update($validated);

        return response()->json([
            'message' => 'OK',
            'payload' => $review
        ]);
    }

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

    public function delete($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json([
                'message' => 'NOT FOUND'
            ], 404);
        }

        // Hapus gambar jika ada
        if ($review->image) {
            $image_path = str_replace('/storage', storage_path('app/public'), $review->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $review->delete();

        return response()->json([
            'message' => 'DELETED',
            'payload' => true
        ], 200);
    }

    // public function delete($id) {
    //     $review = Review::find(Crypt::decryptString($id));
    //     if (!$review) return response()->json([
    //         'message' => 'NOT FOUND'
    //     ], 404);
    //     $image_path = str_replace('/storage', storage_path('app/public'), $review->image);
    //     if (File::exists($image_path)) File::delete($image_path);
    //     $review->delete();
    //     return response()->json([
    //         'message' => 'NO CONTENT',
    //         'payload' => true
    //     ], 204);
    // }
}
