<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strava;
use App\Activity;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //https://www.strava.com/api/v3/athlete/activities?before=&after=&page=&per_page=" "Authorization: Bearer [[token]]
        $strava = new Strava();
        $token = auth()->user()->token;

        $res = $strava->client->request('GET', '/api/v3/athlete/activities/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            // Check if activity id already exists
            $activityId = Activity::all()->where('activityId', $result->id)->first();

            $user = auth()->user();
            // Als activity id reeds bestaat in tabel --> niets
            if ( $activityId === null)
            {
                $activity = new Activity;
                $activity->name = $result->name;
                $activity->activityId = $result->id;
                $activity->user_id = $user->id;
                $activity->distance = $result->distance;
                $activity->averageSpeed = $result->average_speed;
                $activity->save();
            }
        }

        $activity = Activity::find(1)->user;
        dd($activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
