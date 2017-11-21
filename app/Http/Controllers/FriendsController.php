<?php

namespace App\Http\Controllers;

use App\Badges_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Strava;
use App\Friends;
use App\User;
use App\Badges;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $myID = Auth::id();
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]
        $friendIDS = Friends::where(['user_id' => $myID, 'follow' => true])->pluck('friend_id');

        $followerIDS = Friends::where(['friend_id' => $myID, 'follow' => true])->pluck('user_id');

        $friends = User::all()->whereIn('id', $friendIDS)->whereIn('id',$followerIDS)->sortBy('firstname');

        $following = User::all()->whereIn('id', $friendIDS)->whereNotIn('id',$followerIDS)->sortBy('firstname');

        $followers = User::all()->whereIn('id',$followerIDS)->whereNotIn('id',$friendIDS)->sortBy('firstname');

        $res = User::all()->whereNotIn('id', $friendIDS)->whereNotIn('id',$followerIDS)->where('id','!=',$myID)->sortBy('firstname');
        
        return view('layouts.friends', compact('res', 'following', 'followers', 'friends'));
    }


    public function friend($id) {

        $userid = Auth::id();
        $frienship = Friends::where(['user_id' => $userid, 'friend_id' => $id, 'follow'=>true]);

        if($frienship->count()>0) {
            $friend = User::find($id);

            $activity = Activity::All()->where('user_id', $id);

            $badge =  User::find($id)->badge;

            return view('layouts.friendsprofile', compact('friend', 'activity', 'badge'));
        }else{
            return redirect('/friends');
        }
    }

    public function storeOrDelete(Request $request)
    {
        $myID = Auth::id();
        $friendID = $request->input('userid');
        $action = $request->input('action');
        $check = Friends::where(['friend_id' => $friendID, 'user_id' => $myID])->pluck('follow');

        if($action=="store")
        {
            if($check->count() == 0) {
                $friend = Friends::firstOrNew(['friend_id' => $friendID, 'user_id' => $myID]);

                //$friend = new Friends;
                $friend->user_id = $myID;
                $friend->friend_id = $friendID;
                $friend->follow = true;
                $friend->save();
            }else{
                $friendship = Friends::where(['user_id' => $myID, 'friend_id' => $friendID]);
                $friendship->update(['follow'=>true]);
            }
        }else{
            $friendship = Friends::where(['user_id' => $myID, 'friend_id' => $friendID]);
            $friendship->update(['follow'=>false]);
        }
        return redirect('/friends');
    }

    public function store(Request $request){
        $myID = Auth::id();
        $friendID = $request->input('userid');
        $check = Friends::where(['friend_id' => $friendID, 'user_id' => $myID])->pluck('follow');
        if($check->count() == 0) {
            $friend = Friends::firstOrNew(['friend_id' => $friendID, 'user_id' => $myID]);

            //$friend = new Friends;
            $friend->user_id = $myID;
            $friend->friend_id = $friendID;
            $friend->follow = true;
            $friend->save();
        }else{
            $friendship = Friends::where(['user_id' => $myID, 'friend_id' => $friendID]);
            $friendship->update(['follow'=>true]);
        }

        return Redirect::back();
    }


}
