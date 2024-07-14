<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlaylistController as ApiPlaylistController;
use App\Http\Middleware\HasApiKey;
use App\Http\Middleware\IsAdmin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::get('/playlists', [ApiPlaylistController::class, 'index']);
// middleware([IsAdmin::class, HasApiKey::class])
Route::middleware([HasApiKey::class])->get('/playlists', [ApiPlaylistController::class, 'index']);
