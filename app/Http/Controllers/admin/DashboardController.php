<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArtistRequest;
use App\Models\User;

class DashboardController extends Controller
{
    //

    public function index(){

        $users = User::count();
        $artistRequests = ArtistRequest::where('status', 'active')->count();
        return view('admin.dashboard', compact('users', 'artistRequests'));

    }
}
