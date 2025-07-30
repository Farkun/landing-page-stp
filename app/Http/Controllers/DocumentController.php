<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
class DocumentController extends Controller
{
    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        if (!$document) {
            return response()->json(['message' => 'NOT FOUND'], 404);
        }

        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
        ]);

        $document->update($validated);

        return response()->json([
            'message' => 'OK',
            'payload' => $document
        ]);
    }

}
