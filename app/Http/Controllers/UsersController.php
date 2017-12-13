<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

use App\Strava;
use App\Activity;
use App\Schedule;
use App\Schedule_User;
use App\Friends;
use App\Badges;
use App\User;
use App\Badges_User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $myID = Auth::id();
        Artisan::call('update:schedule');
        Artisan::call('update:badges');

        // Schedule

        $schedule = Schedule_User::all()->where('user_id',$myID);
        $goalnow = Schedule::where('end_date','>',Carbon::now())->orderBy('end_date')->first();
        $successusers = Schedule_User::all()->where('confirmed','==','yes');

        // Ranking of the distances

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


        // Ranking of the badges

        $reachedBadges = Badges_User::orderBy('id', 'desc')->take(3)->get();
        $badges = Badges::all();
        $reachedUser = User::all();

        return view('layouts.profile', compact('user', 'goalnow','schedule', 'winners','successusers','reachedUser', 'badges', 'reachedBadges', 'winningActivities'));

    }

    public function showHall()

    {
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

    public function runs()
    {




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
