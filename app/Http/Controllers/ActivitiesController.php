<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nerdrunningclub\Strava;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\nerdrunningclub\Googlemaps;
use App\Friends;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stravaId = Auth::id();

        $activity = Activity::All()->where('user_id', $stravaId);


        return view('layouts.activities', compact('activity'));
    }

    public function ranking() {

        $myID = Auth::id();
        Artisan::call('update:schedule');

        $friendIDS = Friends::where(['user_id' => $myID, 'follow' => true])->pluck('friend_id');
        $followerIDS = Friends::where(['friend_id' => $myID, 'follow' => true])->pluck('user_id');

        $friendIDS->push($myID);
        $followerIDS->push($myID);

        $winners = Activity::all()->whereIn('user_id',$followerIDS)->whereIn('user_id',$friendIDS)->sortByDesc('distance')->groupBy('user_id');
        $winningActivities = [];
        $i=1;

        foreach($winners as $winner){

            $winningActivities[$i]=$winner[0];
            if($i++==5){
                break;
            }
        }

        $user = User::all();

        return view('layouts.ranking', compact('winningActivities','user'));
    }

    public function showHall(){
        $winners = Activity::all()->sortByDesc('distance')->groupBy('user_id');
        $winningActivities = [];
        $i=1;

        foreach($winners as $winner){

            $winningActivities[$i]=$winner[0];
            if($i++==5){
                break;
            }
        }

        $user = User::all();

        return view('layouts.ranking', compact('winningActivities','user'));
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
