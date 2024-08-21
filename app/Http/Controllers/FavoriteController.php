<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Http;

class FavoriteController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'character_id' => 'required|integer',
        ]);
    
        $characterId = $request->character_id;

        $response = Http::get("https://rickandmortyapi.com/api/character/{$characterId}");
    
        if ($response->failed()) {
            return response()->json(['error' => 'Character not found'], 404);
        }
    
        $favorite = new Favorite([
            'character_id' => $characterId,
        ]);
    
        $request->user()->favorites()->save($favorite);
    
        return response()->json(['message' => 'Character saved successfully'], 201);
    }
    
    public function index(Request $request) {
        return $request->user()->favorites;
    }
    
    public function destroy($id) {
        $favorite = Favorite::where('character_id', $id)
                    ->where('user_id', auth()->id())
                    ->first();
    
        if (!$favorite) {
            return response()->json(['error' => 'Favorite not found'], 404);
        }
    
        $favorite->delete();
    
        return response()->json(['message' => 'Character removed successfully'], 200);
    }
}
