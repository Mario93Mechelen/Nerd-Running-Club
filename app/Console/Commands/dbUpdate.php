<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Strava;
use App\Friends;
use App\User;
use App\Activity;
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
            $strava_id =$user->strava_id;
            $user_id = $user->id;

            $res = $strava->client->request('GET', '/api/v3/athletes/' . $strava_id . '/followers', [
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                ]
            ]);
            $res = json_decode($res->getBody());
            foreach ($res as $result) {

                // Check if friends id already exists
                $friendsId = Friends::All()->where('user_id', $user_id)->where('strava_id', $result->id)->first();

                // Als friends id reeds bestaat in tabel --> niets
                if ( $friendsId === null)
                {
                    $friend = new Friends;
                    $friend->user_id = $user_id;
                    $friend->strava_id = $result->id;
                    $friend->firstname = $result->firstname;
                    $friend->lastname = $result->lastname;
                    $friend->avatar = $result->profile_medium;
                    $friend->save();
                }
            }
        }
    }
}
