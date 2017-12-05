<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
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
        $user_id = Auth::id();
            $goals = Schedule::all();

            foreach ($goals as $g) {

                $completed = Schedule_User::firstOrNew(['user_id' => $user_id, 'schedule_id' => $g->id]);
                $completed->user_id = $user_id;
                $completed->schedule_id = $g->id;
                $completed->confirmed = "not yet";
                $completed->save();

            }

                $schedule = Activity::all()->where('user_id', $user_id);

                $this->goals($schedule,$goals,$user_id);

    }

    public function goals($schedule,$goals,$user_id) {
        foreach($goals as $goal) {
            foreach ($schedule as $s) {

                if (($s->distance) >= $goal->distance && (Carbon::parse($s->date)) <= (Carbon::parse($goal->end_date))) {

                    Schedule_User::where(['schedule_id' => $goal->id, 'user_id' => $user_id])->update(['confirmed' => 'yes']);
                } elseif (Carbon::parse($s->date) > Carbon::parse($goal->end_date)) {
                    Schedule_User::where(['schedule_id' => $goal->id, 'user_id' => $user_id])->update(['confirmed' => 'no']);
                } elseif (Carbon::now() > Carbon::parse($goal->end_date)) {
                    Schedule_User::where(['schedule_id' => $goal->id, 'user_id' => $user_id])->update(['confirmed' => 'no']);
                }
            }
        }
    }

}
