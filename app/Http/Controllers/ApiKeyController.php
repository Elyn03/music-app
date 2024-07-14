<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isAdmin = $user->admin; // Directly access the admin attribute

        if ($isAdmin == 1) {
            $apiKeys = ApiKey::orderBy('name')->get();
        } else {
            $apiKeys = $user->apiKeys;
        }

        return Inertia::render('ApiKey/Index', [
            'api_keys' => $apiKeys,
            'user' => $user,
        ]);
    }

    public function create()
    {
        return Inertia::render('ApiKey/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255'],
        ]);

        $apiKey = ApiKey::create([
            'uuid' => 'ak-' . Str::uuid(),
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'key' => Str::random(40)
        ]);

        return redirect()->route('apiKeys.index');
    }

    public function show() {}

    public function edit() {}

    public function update() {}

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('apiKeys.index');
    }
}
