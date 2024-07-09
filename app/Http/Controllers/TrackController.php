<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Track;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('artist')->get();
        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:4', 'max:255'],
            'artist' => ['required', 'string', 'min:3', 'max:255'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image'],
            'music' => ['required', 'file', 'mimes:mp3,mov,wav'],
        ]);

        $uuid = 'trk-' . Str::uuid();
        $imageExtension = $request->image->extension();
        $request->image->storeAs('tracks/images', $uuid, '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $request->music->storeAs('tracks/music', $uuid, '.' . $musicExtension);

        Track::create([
            'artist' => $request->artist,
            'display' => $request->display,
            'title' => $request->title,
        ]);

        dd($request->get('artist', 'machin'));
        return redirect()->route('tracks.index');
    }

    public function show()
    {
        dd("show");
    }

    public function edit(Track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track
        ]);
    }

    public function update(Request $request, Track $track)
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

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index');
    }

}
