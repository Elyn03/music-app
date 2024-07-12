<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Track;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $playlists = $user->playlists()->withCount(['tracks'])->get();

        return Inertia::render('Playlist/Index', [
            'playlists' => $playlists,
        ]);
    }

    public function create()
    {
        $tracks = Track::where('display', true)->get();
        return Inertia::render('Playlist/Create', [
            'tracks' => $tracks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'tracks' => ['required', 'array'],
            'track.*' => ['required', 'string']
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->where('display', true)->get();
        if ($tracks->count() !== count($request->tracks)) {
            throw ValidationException::withMessages(['tracks' => 'Une musique n\'existe pas']);
        }

        $playlist = Playlist::create([
            'uuid' => 'ply-' . Str::uuid(),
            'user_id' => $request->user()->id,
            'title' => $request->title
        ]);

        $playlist->tracks()->attach($tracks->pluck('id'));

        return redirect()->route('playlists.index');
    }

    public function show(Playlist $playlist)
    {
        return Inertia::render('Playlist/Show', [
            'playlist' => $playlist->playlist,
            'tracks' => $playlist->tracks,
        ]);
    }

    public function edit(Playlist $playlist)
    {

        $tracks = Track::where('display', true)->orderBy('title')->get();

        return Inertia::render('Playlist/Edit', [
            'playlist' => $playlist->load(['tracks']),
            'tracks' => $tracks,
        ]);
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'tracks' => ['required', 'array'],
            'track.*' => ['required', 'string']
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->where('display', true)->get();
        if ($tracks->count() !== count($request->tracks)) {
            throw ValidationException::withMessages(['tracks' => 'Une musique n\'existe pas']);
        }
        $playlist->title = $request->title;
        $playlist->save();

        $playlist->tracks()->sync($tracks->pluck('id'));
        return redirect()->route('playlists.index');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->tracks()->detach();
        $playlist->delete();

        return redirect()->route('playlists.index');
    }
}
