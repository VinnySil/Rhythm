<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\ArtistRequest;
use App\Models\Song;
use App\Models\User;

class DashboardController extends Controller
{
    //

    public function index(){

        $users = User::count();
        $artistRequests = ArtistRequest::where('status', 'active')->count();
        $albums = Album::count();
        $songs = Song::count();
        return view('admin.dashboard', compact('users', 'artistRequests', 'albums', 'songs'));

    }
}
