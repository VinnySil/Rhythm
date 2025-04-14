<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ArtistRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){

        $users = User::count();
        $artistRequests = ArtistRequest::count();
        return view('admin.dashboard', compact('users', 'artistRequests'));

    }
}
