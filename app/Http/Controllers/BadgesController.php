<?php

namespace App\Http\Controllers;

use App\Friends;
use Illuminate\Http\Request;

use App\Badges;
use App\User;
use App\Badges_User;
use Illuminate\Support\Facades\Auth;

class BadgesController extends Controller
{

    public function index()
    {

        $badge = Badges::all();
        return view('layouts.badges', compact('badge'));


    }

    public function achievedBadges()
    {

        $id = Auth::user()->id;
        $this->checkFriends1($id);
        $this->checkFriends2($id);
        $this->checkFriends3($id);

        $badge =  User::find($id)->badge;
        return view('layouts.achievements', compact('badge'));


    }

    public function checkFriends1($id)
    {

        $count = Friends::all()->where('user_id', $id)->count();

        if ($count >= 1) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 4]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 4;
            $userBadge->save();

        }

    }

    public function checkFriends2($id)
    {

        $count = Friends::all()->where('user_id', $id)->count();

        if ($count >= 3) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 5]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 5;
            $userBadge->save();

        }

    }

    public function checkFriends3($id)
    {

        $count = Friends::all()->where('user_id', $id)->count();

        if ($count >= 5) {

            $userBadge =  Badges_User::firstOrNew(['user_id' => $id, 'badge_id' => 6]);
            $userBadge->user_id = $id;
            $userBadge->badge_id = 6;
            $userBadge->save();

        }

    }
}
