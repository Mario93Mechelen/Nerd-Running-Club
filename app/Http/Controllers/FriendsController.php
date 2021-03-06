<?php

namespace App\Http\Controllers;

use App\Badges_User;
use App\Schedule;
use App\Schedule_User;
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
    public function index($type)
    {
        $myID = Auth::id();
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]
        $friendIDS = Friends::where(['user_id' => $myID, 'follow' => true])->pluck('friend_id');

        $followerIDS = Friends::where(['friend_id' => $myID, 'follow' => true])->pluck('user_id');

        $friends = User::all()->whereIn('id', $friendIDS)->whereIn('id',$followerIDS)->sortBy('firstname');

        $following = User::all()->whereIn('id', $friendIDS)->whereNotIn('id',$followerIDS)->sortBy('firstname');

        $followers = User::all()->whereIn('id',$followerIDS)->whereNotIn('id',$friendIDS)->sortBy('firstname');

        $res = User::all()->whereNotIn('id', $friendIDS)->whereNotIn('id',$followerIDS)->where('id','!=',$myID)->sortBy('firstname');

        return view('layouts.friends', compact('res', 'following', 'followers', 'friends', 'type'));
    }


    public function friend($id) {

        $userid = Auth::id();
        $frienship = Friends::where(['user_id' => $userid, 'friend_id' => $id, 'follow'=>true]);

        if($frienship->count()>0||$id==$userid) {
            $friend = User::find($id);

            $activity = Activity::All()->where('user_id', $id);

            $badge =  User::find($id)->badge;

            $numpoints = 0;
            $badgePoints = User::find($id)->badge;
            if($badgePoints!=null) {
                foreach ($badgePoints as $xp) {
                    $numpoints += $xp->xpPoints;
                }
            }
            $achievements = Schedule_User::all()->where('confirmed','yes')->where("user_id",$id)->pluck('schedule_id');
            if($achievements!=null){
            $achievementPoints = Schedule::all()->wherein('id', $achievements);
                foreach($achievementPoints as $xp){
                    $numpoints+=$xp->xpPoints;
                }
            }

            if($numpoints==0){
                $xpPoints = 0;
                $level = 0;
            } else{
                $level = ltrim(floor($numpoints/100),'.0');
                if($level==0){
                    $xpPoints = $numpoints;
                }else {
                    $xpPoints = $numpoints - $level * 100;
                }
            }
            $imageurl="";
            if($level<3){
                $imageurl = "/img/nerdlevel/eerste.png";
            }elseif($level<5&&$level>3){
                $imageurl = "/img/nerdlevel/derde.png";
            }elseif($level<7&&$level>5){
                $imageurl = "/img/nerdlevel/vijfde.png";
            }elseif($level<9&&$level>7){
                $imageurl = "/img/nerdlevel/zevende.png";
            }elseif($level==9){
                $imageurl = "/img/nerdlevel/negende.png";
            }elseif($level==10){
                $imageurl = "/img/nerdlevel/elfde.png";
            }



            return view('layouts.friendsprofile', compact('friend', 'activity', 'badge','userid','id','level','xpPoints','imageurl'));
        }else{
            return redirect('/users/type/friends');
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
        return redirect()->back();
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
