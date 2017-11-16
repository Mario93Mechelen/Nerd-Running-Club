<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\nerdrunningclub\Strava;
use App\Friends;
use App\User;
use App\Activity;
use App\Schedule;
use Carbon\Carbon;

class dbUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating strava info via api call into db';

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
    public function handle(Strava $strava)
    {
        //
        \Log::info('This is a database update which happened at ' . Carbon::now());

        $allUsers = User::all();

        foreach ($allUsers as $user) {
            $token = $user->token;

            $res = $strava->get('/api/v3/athlete/activities/', $token);
            foreach ($res as $result) {
                if($result->average_speed < 7.5) {

                    // Check if activity id already exists
                    $activity = Activity::firstOrNew(['activityId' => $result->id]);
                    $activity->user_id = $user->id;
                    $activity->name = $result->name;
                    $activity->activityId = $result->id;
                    $activity->time = $result->elapsed_time;
                    $activity->distance = $result->distance;
                    $activity->averageSpeed = $result->average_speed;
                    $activity->latitude = $result->start_latitude;
                    $activity->longitude = $result->start_longitude;
                    $activity->save();
                }

            }

        }
    }

}
