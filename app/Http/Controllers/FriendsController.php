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
<<<<<<< HEAD
        $res = Friends::all();

=======
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]]
        $id = Auth::id();
        $res = Friends::all()->where("user_id", $id);
>>>>>>> 401ba94f658c29ff63756d6d8e105dffffe144ab
        return view('layouts.friends', compact('res'));
    }


    public function friend($id) {

        $friend = Friends::all()->where('strava_id', $id)->first();

        $activity = Activity::All()->where('strava_id', $id);

        return view('layouts.friendsprofile', compact('friend', 'activity'));
    }

}
