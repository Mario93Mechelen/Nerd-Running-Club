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
        $noFriendIDS = Friends::all()->where('user_id', $myID)->pluck('friend_id');
        $res = User::all()->whereNotIn('id', $noFriendIDS)->where('id','!=',$myID);
        $friends = User::all();
        return view('layouts.friends', compact('res', 'friends'));
    }


    public function friend($id) {

        $userid = Auth::id();
        $frienship = Friends::where(['user_id' => $userid, 'friend_id' => $id]);

        if($frienship->count()>0) {
            $friend = User::find($id);

            $activity = Activity::All()->where('user_id', $id);

            return view('layouts.friendsprofile', compact('friend', 'activity'));
        }else{
            return redirect('/friends');
        }
    }

    public function storeOrDelete(Request $request)
    {
        $myID = Auth::id();
        $friendID = $request->input('userid');
        $action = $request->input('action');

        if($action=="store")
        {
            $friend = Friends::firstOrNew(['friend_id' => $friendID, 'user_id' => $myID]);

            //$friend = new Friends;
            $friend->user_id = $myID;
            $friend->friend_id = $friendID;
            $friend->save();
        }else{
            $friendship = Friends::where(['user_id' => $myID, 'friend_id' => $friendID]);
            $friendship->delete();
        }
        return redirect('/friends');
    }


}
