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

        $this->checkFriends1($id);
        $this->checkFriends2($id);
        $this->checkFriends3($id);

        // Checken van Time badge

        $this->checkTime1($id);
        $this->checkTime2($id);
        $this->checkTime3($id);

        // Checken van Miles badge

        $this->checkMiles1($id);
        $this->checkMiles2($id);
        $this->checkMiles3($id);


        // Checken van Run badge
        $this->checkRuns1($id);
        $this->checkRuns2($id);
        $this->checkRuns3($id);

        $badge =  User::find($id)->badge;
        $badges = Badges::all();
        return view('layouts.achievements', compact('badge', 'badges'));


    }

    public function checkFriends1($id)
    {

        $count = Friends::where(['user_id'=>$id, 'follow'=>true])->count();

        if ($count >= 1) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 4]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 4;
            $userBadge->save();

        }

    }

    public function checkFriends2($id)
    {

        $count = Friends::where(['user_id'=>$id, 'follow'=>true])->count();

        if ($count >= 3) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 5]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 5;
            $userBadge->save();

        }

    }

    public function checkFriends3($id)
    {

        $count = Friends::where(['user_id'=>$id, 'follow'=>true])->count();

        if ($count >= 5) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 6]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 6;
            $userBadge->save();

        }

    }

    public function checkTime1($id) {
        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->time) >= 900) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 1]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 1;
                $userBadge->save();

            }
        }

    }

    public function checkTime2($id) {

        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->time) >= 1800) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 2]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 2;
                $userBadge->save();

            }
        }

    }

    public function checkTime3($id) {

        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->time) >= 3600) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 3]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 3;
                $userBadge->save();

            }
        }

    }

    public function checkMiles1($id) {

        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->distance) >= 3000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 7]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 7;
                $userBadge->save();

            }
        }

    }

    public function checkMiles2($id) {

        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->distance) >= 6000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 8]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 8;
                $userBadge->save();

            }
        }

    }

    public function checkMiles3($id) {
        $miles = Activity::all()->where('user_id', $id);

        foreach ($miles as $m) {

            if (($m->distance) >= 10000) {

                $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 9]);
                $userBadge->user_id = $id;
                $userBadge->badge_id = 9;
                $userBadge->save();

            }
        }

    }



    public function checkRuns1($id) {
        $runs = Activity::all()->where('user_id', $id)->count();


        if ($runs >= 5) {
        $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 10]);
        $userBadge->user_id = $id;
        $userBadge->badge_id = 10;
        $userBadge->save();

        }
    }

    public function checkRuns2($id) {
        $runs = Activity::all()->where('user_id', $id)->count();


        if ($runs >= 10) {
            $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 11]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 11;
            $userBadge->save();

        }
    }

    public function checkRuns3($id) {
        $runs = Activity::all()->where('user_id', $id)->count();


        if ($runs >= 20) {
            $userBadge = Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 12]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 12;
            $userBadge->save();

        }
    }


}
