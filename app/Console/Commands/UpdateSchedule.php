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
        $allUsers = User::all();
        $user_id = Auth::id();
            $goals = Schedule::all();

            foreach ($goals as $g) {

                $completed = Schedule_User::firstOrNew(['user_id' => $user_id, 'schedule_id' => $g->id]);
                $completed->user_id = $user_id;
                $completed->schedule_id = $g->id;
                $completed->confirmed = "not yet";
                $completed->save();

                $schedule = Activity::all()->where('user_id', $user_id);
                $goaldates = Schedule::all()->pluck('end_date');

                $this->goalsWeek1($schedule,$goaldates,$user_id);
                $this->goalsWeek2($schedule,$goaldates,$user_id);
                $this->goalsWeek3($schedule,$goaldates,$user_id);
                $this->goalsWeek4($schedule,$goaldates,$user_id);
                $this->goalsWeek4($schedule,$goaldates,$user_id);
                $this->goalsWeek5($schedule,$goaldates,$user_id);
                $this->goalsWeek6($schedule,$goaldates,$user_id);
                $this->goalsWeek7($schedule,$goaldates,$user_id);
                $this->goalsWeek8($schedule,$goaldates,$user_id);
                $this->goalsWeek9($schedule,$goaldates,$user_id);
                $this->goalsWeek10($schedule,$goaldates,$user_id);

        }
    }
    public function goalsWeek1($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 1610&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[0]))) {

                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[0])){
                Schedule_User::where(['schedule_id'=> 1,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek2($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 3220&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[1]))) {

                Schedule_User::where(['schedule_id'=> 2,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[1])){
                Schedule_User::where(['schedule_id'=> 2,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek3($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 4830&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[2]))) {

                Schedule_User::where(['schedule_id'=> 3,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[2])){
                Schedule_User::where(['schedule_id'=> 3,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek4($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 6440&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[3]))) {

                Schedule_User::where(['schedule_id'=> 4,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[3])){
                Schedule_User::where(['schedule_id'=> 4,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek5($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 8050&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[4]))) {

                Schedule_User::where(['schedule_id'=> 5,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[4])){
                Schedule_User::where(['schedule_id'=> 5,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek6($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 9660&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[5]))) {

                Schedule_User::where(['schedule_id'=> 6,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[5])){
                Schedule_User::where(['schedule_id'=> 6,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek7($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 11230&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[6]))) {

                Schedule_User::where(['schedule_id'=> 7,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[6])){
                Schedule_User::where(['schedule_id'=> 7,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek8($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 12870&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[7]))) {

                Schedule_User::where(['schedule_id'=> 8,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[7])){
                Schedule_User::where(['schedule_id'=> 8,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek9($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 14490&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[8]))) {

                Schedule_User::where(['schedule_id'=> 9,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[8])){
                Schedule_User::where(['schedule_id'=> 9,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }

    public function goalsWeek10($schedule,$goaldates,$user_id) {

        foreach ($schedule as $s){

            if(($s->distance) >= 16100&&(Carbon::parse($s->date))<=(Carbon::parse($goaldates[9]))) {

                Schedule_User::where(['schedule_id'=> 10,'user_id'=>$user_id])->update(['confirmed'=>'yes']);
            }elseif(Carbon::parse($s->date)>Carbon::parse($goaldates[9])){
                Schedule_User::where(['schedule_id'=> 10,'user_id'=>$user_id])->update(['confirmed'=>'no']);
            }
        }
    }
}
