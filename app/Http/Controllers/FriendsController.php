<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Strava;
use App\Friends;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $myID = Auth::id();
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]
        $res = User::all()->where('id','!=',$myID);
        return view('layouts.friends', compact('res'));
    }


    public function friend($id) {

        $friend = User::find($id);

        $activity = Activity::All()->where('user_id', $id);

        return view('layouts.friendsprofile', compact('friend', 'activity'));
    }

    public function store(Request $request)
    {
        $myID = Auth::id();
        $friendID = $request->input('userid');

        $friend = Friends::firstOrNew(['friend_id' => $friendID, 'user_id' => $myID]);

        //$friend = new Friends;
        $friend->user_id = $myID;
        $friend->friend_id = $friendID;
        $friend->save();

        return redirect('/friends');
    }

}
