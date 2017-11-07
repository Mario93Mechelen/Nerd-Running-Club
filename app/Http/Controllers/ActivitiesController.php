<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strava;
use App\Activity;
use Illuminate\Support\Facades\Auth;

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
        $token = Auth::user()->token;



        $res = $strava->client->request('GET', '/api/v3/athlete/activities/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            // Check if activity id already exists
            $activityId = Activity::All()->where('activityId', $result->id)->first();

            // Als activity id reeds bestaat in tabel --> niets
            if ( $activityId === null)
            {
                $activity = new Activity;
                $activity->strava_id = $result->athlete->id;
                $activity->name = $result->name;
                $activity->activityId = $result->id;
                $activity->distance = $result->distance;
                $activity->averageSpeed = $result->average_speed;
                $activity->save();
            }
        }

        $stravaId = Auth::user()->stravaId;

        $activity = Activity::All()->where('strava_id', $stravaId);

        return view('layouts.activities', compact('activity'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
