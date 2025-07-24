<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroCarouselController extends Controller
{
    public function updateHeading(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['heading' => 'required|string|max:255']);
        $hero->update(['heading' => $request->heading]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function updateBody(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['body' => 'required|string']);
        $hero->update(['body' => $request->body]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function updateButtonLabel(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['button_label' => 'required|string']);
        $hero->update(['button_label' => $request->button_label]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function updateButtonUrl(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['button_url' => 'required|string']);
        $hero->update(['button_url' => $request->button_url]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function updateAnimo(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['animo' => 'required|numeric']);
        $hero->update(['animo' => $request->animo]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function updateSelected(Request $request) {
        $hero = Hero::first();
        if (!$hero) return response()->json(['message' => 'NOT FOUND'], 404);
        $request->validate(['selected' => 'required|numeric']);
        $hero->update(['selected' => $request->selected]);
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }
}
