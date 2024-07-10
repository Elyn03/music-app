<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlist;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
        public function index()
        {
            $playlists = Playlist::all();
            return Inertia::render('Playlist/Index', [
                'playlists' => $playlists,
            ]);
        }

        public function create()
        {
            return Inertia::render('Playlist/Create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'title' => ['required', 'string', 'min:4', 'max:255']
            ]);

            $uuid = 'trk-' . Str::uuid();

            Playlist::create([
                'uuid' => $uuid,
                'title' => $request->title
            ]);

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
