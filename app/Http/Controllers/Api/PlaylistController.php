<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\User;

class PlaylistController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $playlists = Playlist::where('user_id', $user->id)->get();

        return response()->json($playlists);
    }
}
