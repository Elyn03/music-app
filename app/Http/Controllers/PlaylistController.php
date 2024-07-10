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

        public function show() {}

        public function edit(Playlist $playlist)
        {
            return Inertia::render('Track/Edit', [
                'track' => $track
            ]);
        }

        public function update(Request $request, Playlist $playlist)
        {
            $request->validate([
                'title' => ['required', 'string', 'min:5', 'max:255'],
                'artist' => ['required', 'string', 'min:3', 'max:255'],
                'display' => ['required', 'boolean'],
            ]);

            // $track->update([
            //     'title' => $request->title,
            //     'artist' => $request->artist,
            //     'display' => $request->display,
            // ]);

            // $track->update($request->all());

            $track->title = $request->title;
            $track->artist = $request->artist;
            $track->display = $request->display;
            $track->save();

            return redirect()->route('tracks.index');
        }

        public function destroy(Playlist $playlist)
        {
            $playlist->delete();
            return redirect()->route('playlist.index');
        }

}
