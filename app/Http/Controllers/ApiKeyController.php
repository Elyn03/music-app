<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $apiKeys = $user->apiKeys;

        return Inertia::render('ApiKey/Index', [
            'api_keys' => $apiKeys,
        ]);
    }

    public function create()
    {
        $playlists = Playlist::where('id', '>', 0)->get();
        return Inertia::render('ApiKey/Create', [
            'playlists' => $playlists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
        ]);

        $playlist = ApiKey::create([
            'uuid' => 'apiKey-' . Str::uuid(),
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'key' => $request->name
        ]);

        return redirect()->route('apiKeys.index');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('apiKeys.index');
    }
}
