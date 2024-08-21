<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function getAllCharacters()
    {

        $response = Http::get('https://rickandmortyapi.com/api/character');
        return response()->json($response->json());
    }

    public function getCharacterById($id)
    {
        
        $response = Http::get("https://rickandmortyapi.com/api/character/{$id}");
        return response()->json($response->json());
    }
}
