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

    public function store()
    {
        dd("get postPhoto");
    }

    public function show()
    {
        dd("get getPhotoPhoto");
    }

    public function edit()
    {
        dd("get getPhotoPhotoEdit");
    }

    public function update()
    {
        dd("get putPhotoPhoto");
    }

    public function destroy()
    {
        dd("get pdeletePhotoPhotohoto");
    }

}
