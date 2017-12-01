<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schedule;
use App\Activity;
use App\Schedule_User;

use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function goalsSchedule() {

        $id = Auth::user()->id;
        $strava_id = Auth::user()->strava_id;

        $goals = Schedule::all();

        foreach ($goals as $g) {

            $completed = Schedule_User::firstOrNew(['user_id' => $id, 'schedule_id' => $g->id]);
            $completed->user_id = $id;
            $completed->schedule_id = $g->id;
            $completed->save();

            $this->goalsWeek1($strava_id);
            $this->goalsWeek2($strava_id);
            $this->goalsWeek3($strava_id);
            $this->goalsWeek4($strava_id);
            $this->goalsWeek5($strava_id);
            $this->goalsWeek6($strava_id);
            $this->goalsWeek7($strava_id);
            $this->goalsWeek8($strava_id);
            $this->goalsWeek9($strava_id);
            $this->goalsWeek10($strava_id);

        }

        $goal = Schedule_User::all()->where('user_id', $id);
        return view('layouts.goals', compact('goal'));
    }


    public function goalsWeek1($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 3000&&($s->date)<='2017-10-15') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek2($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 5000&&($s->date)<='2017-11-05') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek3($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 8000&&($s->date)<='2017-11-26') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek4($strava_id) {

        $schedule = Activity::all();

        foreach ($schedule as $s){

            if(($s->distance) >= 9000&&($s->date)<='2017-10-15') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek5($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 10000&&($s->date)<='2017-12-03') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek6($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 11000&&($s->date)<='2017-12-24') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek7($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 12000&&($s->date)<='2018-01-14') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek8($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 14000&&($s->date)<='2018-02-04') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek9($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 15000&&($s->date)<='2018-02-25') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek10($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 16000&&($s->date)<='2018-03-18') {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'yes']);
            }else{
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$strava_id])->update(['confirmed'=>'no']);
            }
        }
    }


}
