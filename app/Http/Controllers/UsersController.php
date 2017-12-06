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

        $schedule = Schedule_User::all()->where('user_id',$myID);
        $goalnow = Schedule::where('end_date','>',Carbon::now())->orderBy('end_date')->first();
        $successusers = Schedule_User::all()->where('confirmed','==','yes');

        $friendIDS = Friends::where(['user_id' => $myID, 'follow' => true])->pluck('friend_id');
        $followerIDS = Friends::where(['friend_id' => $myID, 'follow' => true])->pluck('user_id');
        $friendIDS->push($myID);
        $followerIDS->push($myID);
        $winners = Activity::all()->whereIn('user_id',$followerIDS)->whereIn('user_id',$friendIDS)->groupBy('user_id');

        //hierna moet je op één of andere manier nog checken welke de hoogste is van elke groep, das moeilijk als de users fake zijn
        //maar ik zal mijn token hier zetten, plak die bij 1 van de fake users en zet de scheduler in Kernel.php even op everyMinute();
        //token: 4594438fcaf0110a3acf4cbfa23be88db0f083ab

        $reachedBadges = Badges_User::orderBy('id', 'desc')->take(3)->get();
        $badges = Badges::all();
        $reachedUser = User::all();

        return view('layouts.profile', compact('user', 'goalnow','schedule', 'winners','successusers','reachedUser', 'badges', 'reachedBadges'));

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
