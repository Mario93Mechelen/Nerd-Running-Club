<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use App\Schedule;
use App\Schedule_User;
use App\User;
use App\Activity;

class UpdateSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $allUsers = User::all();
        $user_id = Auth::id();
            $goals = Schedule::all();

            foreach ($goals as $g) {

                $completed = Schedule_User::firstOrNew(['user_id' => $user_id, 'schedule_id' => $g->id]);
                $completed->user_id = $user_id;
                $completed->schedule_id = $g->id;
                $completed->save();

                $this->goalsWeek1($user_id);
                $this->goalsWeek2($user_id);
                $this->goalsWeek3($user_id);
                $this->goalsWeek4($user_id);
                $this->goalsWeek5($user_id);
                $this->goalsWeek6($user_id);
                $this->goalsWeek7($user_id);
                $this->goalsWeek8($user_id);
                $this->goalsWeek9($user_id);
                $this->goalsWeek10($user_id);

        }
    }
    public function goalsWeek1($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 3000) {

                Schedule_User::where('schedule_id', 1)->delete();
            }
        }
    }

    public function goalsWeek2($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 5000) {

                Schedule_User::where('schedule_id', 2)->delete();
            }
        }
    }

    public function goalsWeek3($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 8000) {

                Schedule_User::where('schedule_id', 3)->delete();
            }
        }
    }

    public function goalsWeek4($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 9000) {

                Schedule_User::where('schedule_id', 4)->delete();
            }
        }
    }

    public function goalsWeek5($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 10000) {

                Schedule_User::where('schedule_id', 5)->delete();
            }
        }
    }

    public function goalsWeek6($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 11000) {

                Schedule_User::where('schedule_id', 6)->delete();
            }
        }
    }

    public function goalsWeek7($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 12000) {

                Schedule_User::where('schedule_id', 7)->delete();
            }
        }
    }

    public function goalsWeek8($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 14000) {

                Schedule_User::where('schedule_id', 8)->delete();
            }
        }
    }

    public function goalsWeek9($user_id) {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s){

            if(($s->distance) >= 15000) {

                Schedule_User::where('schedule_id', 9)->delete();
            }
        }
    }

    public function goalsWeek10($user_id)
    {

        $schedule = Activity::all()->where('user_id', $user_id);

        foreach ($schedule as $s) {

            if (($s->distance) >= 16000) {

                Schedule_User::where('schedule_id', 10)->delete();
            }
        }
    }
}
