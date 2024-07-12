<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::resource('apiKeys', ApiKeyController::class);
});
