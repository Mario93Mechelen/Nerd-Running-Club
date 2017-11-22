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

        /*$client = new Client();
        $url = 'https://maps.googleapis.com/maps/api/staticmap?center=51.024779,4.484782&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C51.024779,4.484782&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM';
        $res = $client->request('GET', $url)->getBody();
        $result = json_decode(json_encode($res));
        dd($result);*/
        //$result = \GuzzleHttp\json_decode($res->getBody());

        return view('layouts.activities', compact('activity'));

    }

    public function ranking() {

        $user = Auth::user();
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
            if($i++==3){
                break;
            }
        }
        return view('layouts.ranking', compact('winningActivities','users'));
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
