<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ResourceLinkController extends Controller
{
    public function addResource(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string'
        ]);
        $resource = Resource::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        $resource->encrypted_id = Crypt::encryptString($resource->id);
        return response()->json([
            'message' => 'CREATED',
            'payload' => $resource
        ], 201);
    }

    public function deleteResource($id) {
        $resource = Resource::find(Crypt::decryptString($id));
        if (!$resource) return response()->json(['message' => 'NOT FOUND'], 404);
        $resource->delete();
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }

    public function addQuickLink(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string'
        ]);
        $quick_link = QuickLink::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        $quick_link->encrypted_id = Crypt::encryptString($quick_link->id);
        return response()->json([
            'message' => 'CREATED',
            'payload' => $quick_link
        ], 201);
    }

    public function deleteQuickLink($id) {
        $quick_link = QuickLink::find(Crypt::decryptString($id));
        if (!$quick_link) return response()->json(['message' => 'NOT FOUND'], 404);
        $quick_link->delete();
        return response()->json([
            'message' => 'OK',
            'payload' => true
        ], 200);
    }
}
