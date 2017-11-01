<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Strava;
use App\Friends;
use App\Activity;

class FriendsController extends Controller
{
    public function index()
    {
        //https://www.strava.com/api/v3/athletes/{id}/followers" "Authorization: Bearer [[token]]
        $strava = new Strava();
        $token = auth()->user()->token;
        $strava_id = auth()->user()->strava_id;
        $user_id = auth()->user()->id;

        $res = $strava->client->request('GET', '/api/v3/athletes/' . $strava_id . '/followers', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            // Check if friends id already exists
            $friendsId = Friends::All()->where('user_id', $user_id)->where('strava_id', $result->id)->first();

            // Als friends id reeds bestaat in tabel --> niets
            if ( $friendsId === null)
            {
                $friend = new Friends;
                $friend->user_id = $user_id;
                $friend->strava_id = $result->id;
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

        $friend = Friends::all()->where('strava_id', $id)->first();

        //get activity from followers : https://www.strava.com/api/v3/activities/following
        $strava = new Strava();
        $token = auth()->user()->token;

        $res = $strava->client->request('GET', '/api/v3/activities/following/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            // Check if activity id already exists
            $activityId = Activity::all()->where('activityId', $result->id)->first();

            //$user = auth()->user();

            // Als activity id reeds bestaat in tabel --> niets
            if ( $activityId === null)
            {
                $activity = new Activity;
                $activity->strava_id = $result->athlete->id;
                $activity->name = $result->name;
                $activity->activityId = $result->id;
                $activity->distance = $result->distance;
                $activity->time = $result->moving_time;
                $activity->averageSpeed = $result->average_speed;
                $activity->save();
            }
        }

        $activity = Activity::All()->where('strava_id', $id);

        return view('layouts.friendsprofile', compact('friend', 'activity'));
    }

}
