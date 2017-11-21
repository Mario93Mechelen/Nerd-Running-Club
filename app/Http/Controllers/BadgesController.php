<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Friends;
use Illuminate\Http\Request;

use App\Badges;
use App\User;
use App\Badges_User;
use Illuminate\Support\Facades\Auth;

class BadgesController extends Controller
{

    public function achievedBadges()
    {

        $id = Auth::user()->id;
        $strava_id = Auth::user()->strava_id;

        // Checken van Friends badge

        $this->checkFriends($id);

        // Checken van Time badge

        $this->checkTime($id);

        // Checken van Miles badge

        $this->checkMiles($id);


        // Checken van Run badge
        $this->checkRuns($id);

        $myBadges =  User::find($id)->badge->pluck('id')->toArray();
        $badges = Badges::all();
<<<<<<< HEAD
        return view('layouts.achievements', compact('myBadges', 'badges'));
=======

        return view('layouts.achievements', compact('badge', 'badges'));
>>>>>>> RankingLink


    }

    public function checkFriends($id)
    {

        $count = Friends::where(['user_id'=>$id, 'follow'=>true])->count();

        if ($count >= 1) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 4]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 4;
            $userBadge->save();

        } else if ($count >= 3) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 5]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 5;
            $userBadge->save();

        } else if ($count >= 5) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 6]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 6;
            $userBadge->save();

        }

    }

    public function checkTime($id) {
        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->time) >= 900) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 1]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 1;
                $userBadge->save();

            } else if (($m->time) >= 1800) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 2]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 2;
                $userBadge->save();

            } else  if (($m->time) >= 3600) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 3]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 3;
                $userBadge->save();

            }
        }

    }

    public function checkMiles($id) {

        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->distance) >= 3000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 7]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 7;
                $userBadge->save();

            } else if (($m->distance) >= 6000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 8]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 8;
                $userBadge->save();

            } else  if (($m->distance) >= 10000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 9]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 9;
                $userBadge->save();

            }
        }

    }



    public function checkRuns($id) {
        $runs = Activity::all()->where('user_id', $id)->count();

        if ($runs >= 5) {
        $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 10]);
        $userBadge->user_id = $id;
        $userBadge->badge_id = 10;
        $userBadge->save();

        } else  if ($runs >= 10) {
            $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 11]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 11;
            $userBadge->save();

        } else  if ($runs >= 20) {
            $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 12]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 12;
            $userBadge->save();

        }
    }

}
