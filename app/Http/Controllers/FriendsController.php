<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Strava;
use App\Friends;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $res = Friends::all();

        return view('layouts.friends', compact('res'));
    }


    public function friend($id) {

        $friend = Friends::all()->where('strava_id', $id)->first();

        $activity = Activity::All()->where('strava_id', $id);

        return view('layouts.friendsprofile', compact('friend', 'activity'));
    }

}
