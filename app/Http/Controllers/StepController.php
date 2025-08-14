<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SelectionStep;

class StepController extends Controller
{
    public function update(Request $request, $id)
    {
        $selection_step = SelectionStep::find($id);
        if (!$selection_step) {
            return response()->json(['message' => 'NOT FOUND'], 404);
        }

        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'url' => 'nullable|string',
        ]);

        $selection_step->update($validated);

        return response()->json([
            'message' => 'OK',
            'payload' => $selection_step
        ]);
    }

    public function get() {
        $selection_steps = SelectionStep::get();
        return response()->json([
            'message' => 'OK',
            'payload' => $selection_steps
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'url' => 'nullable|string'
        ]);
        $filename = $request->image->hashName();
        $target_dir = storage_path('app/public/steps');
        if (!File::exists($target_dir)) File::makeDirectory($target_dir);
        $request->image->move($target_dir, $filename);
        $image_url = '/storage/steps/'.$filename;
        SelectionStep::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_url,
            'url' => $request->url,
        ]);
        return response()->json([
            'message' => 'CREATED',
            'payload' => true
        ], 201);
    }

    public function delete($id)
    {
        $selection_step = SelectionStep::find($id);
        if (!$selection_step) {
            return response()->json([
                'message' => 'NOT FOUND'
            ], 404);
        }

        // Hapus gambar jika ada
        if ($selection_step->image) {
            $image_path = str_replace('/storage', storage_path('app/public'), $selection_step->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $selection_step->delete();

        return response()->json([
            'message' => 'DELETED',
            'payload' => true
        ], 200);
    }
}
