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

             if(($s->distance) >= 3000) {

                    Schedule_User::where('schedule_id', 1)->delete();
             }
         }
    }

    public function goalsWeek2($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 5000) {

                Schedule_User::where('schedule_id', 2)->delete();
            }
        }
    }

    public function goalsWeek3($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 8000) {

                Schedule_User::where('schedule_id', 3)->delete();
            }
        }
    }

    public function goalsWeek4($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 9000) {

                Schedule_User::where('schedule_id', 4)->delete();
            }
        }
    }

    public function goalsWeek5($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 10000) {

                Schedule_User::where('schedule_id', 5)->delete();
            }
        }
    }

    public function goalsWeek6($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 11000) {

                Schedule_User::where('schedule_id', 6)->delete();
            }
        }
    }

    public function goalsWeek7($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 12000) {

                Schedule_User::where('schedule_id', 7)->delete();
            }
        }
    }

    public function goalsWeek8($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 14000) {

                Schedule_User::where('schedule_id', 8)->delete();
            }
        }
    }

    public function goalsWeek9($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 15000) {

                Schedule_User::where('schedule_id', 9)->delete();
            }
        }
    }

    public function goalsWeek10($strava_id) {

        $schedule = Activity::all()->where('strava_id', $strava_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 16000) {

                Schedule_User::where('schedule_id', 10)->delete();
            }
        }
    }


}
