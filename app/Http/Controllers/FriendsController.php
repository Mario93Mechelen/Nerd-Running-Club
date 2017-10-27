<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Strava;
use App\Friends;

class FriendsController extends Controller
{
    public function index()
    {
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]]
        $strava = new Strava();
        $token = auth()->user()->token;
        $strava_id = auth()->user()->stravaId;
        $user_id = auth()->user()->id;

        $res = $strava->client->request('GET', '/api/v3/athletes/' . $strava_id . '/followers', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            // Check if friends id already exists
            $friendsId = Friends::all()->where('user_id', $user_id)->where('friends_strava_id', $result->id)->first();

            // Als friends id reeds bestaat in tabel --> niets
            if ( $friendsId === null)
            {
                $friend = new Friends;
                $friend->user_id = $user_id;
                $friend->friends_strava_id = $result->id;
                $friend->firstname = $result->firstname;
                $friend->lastname = $result->lastname;
                $friend->avatar = $result->profile_medium;
                $friend->save();
            }
        }
        return view('layouts.friends', compact('res'));
        //$user = Friends::find(1)->user;
        //dd($user);
    }

    public function friend($id) {

        $friend = Friends::all()->where('friends_strava_id', $id)->first();

        return view('layouts.friendsprofile', compact('friend'));
    }

}
