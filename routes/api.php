<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CharacterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Ruta de testeo para probar que los endpoints funcionan correctamente
Route::get('test', function () {
    return ('Hello world!');
});

// Ruta para manejar la autenticación de usuario (registro e inicio de sesión)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Ruta para manejar las acciones de los favoritos...
Route::middleware('auth:sanctum')->group(function () {
    Route::post('favorites', [FavoriteController::class, 'store']); // ...guardar los favoritos en el listado
    Route::get('favorites/index', [FavoriteController::class, 'index']); // ...mostrar la lista de los favoritos
    Route::delete('favorites/{id}', [FavoriteController::class, 'destroy']);  // ...eliminar los favoritos en el listado
});

// Ruta para obtener todos los personajes de la API externa
Route::get('characters', [CharacterController::class, 'getAllCharacters']);

// Ruta para obtener un personaje por ID de la API externa
Route::get('character/{id}', [CharacterController::class, 'getCharacterById']);