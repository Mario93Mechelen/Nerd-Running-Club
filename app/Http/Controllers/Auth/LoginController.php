<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Strava;
use App\Friends;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showHome()
    {
        return view('login');
    }

    public function redirectToProvider()
    {
        $id = env("STRAVA_APP_ID");
        $redirecturi = env("STRAVA_REDIRECTURI");
        return redirect('https://www.strava.com/oauth/authorize?client_id='.$id.'&response_type=code&redirect_uri='.$redirecturi.'&scope=write&state=mystate&approval_prompt=force');
    }

    public function handleProviderCallback()
    {
        $code = request()->code;
        $strava = new Strava();
        //$url = "'https://www.strava.com/oauth/token?client_id=20594&client_secret=426f99ae57f2c243fdcc6e5fa320c011523c6161&code=".$code."'";
        $res = $strava->client->request('POST', '/oauth/token', [
            'form_params' => [
                'client_id' =>  env("STRAVA_APP_ID"),
                'client_secret' => env("STRAVA_APP_SECRET"),
                'code' => $code,
            ]
        ]);

        $result= json_decode($res->getBody());
        $athlete = $result->athlete;

        $user = User::firstOrNew(['strava_id' => $athlete->id]);
            $user->strava_id = $athlete->id;
            $user->firstname = $athlete->firstname;
            $user->lastname = $athlete->lastname;
            $user->email = $athlete->email;
            $user->avatar = $athlete->profile;
            $user->gender = $athlete->sex;
            $user->token = $result->access_token;
            $user->save();

        Auth::login($user);

        $token = Auth::user()->token;
        $strava_id = Auth::user()->strava_id;
        $user_id = Auth::id();

        $res = $strava->client->request('GET', '/api/v3/athletes/' . $strava_id . '/followers', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {

            /*// Check if friends id already exists
            $friendsId = Friends::All()->where('user_id', $user_id)->where('strava_id', $result->id)->first();

            // Als friends id reeds bestaat in tabel --> niets
            if ( $friendsId === null)
            {*/
            $friend = Friends::firstOrNew(['strava_id' => $result->id, 'user_id' => $user_id]);

            //$friend = new Friends;
            $friend->user_id = $user_id;
            $friend->strava_id = $result->id;
            $friend->firstname = $result->firstname;
            $friend->lastname = $result->lastname;
            $friend->avatar = $result->profile_medium;
            $friend->save();
        };

        $res = $strava->client->request('GET', '/api/v3/athlete/activities/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {
            if($result->average_speed < 7.5) {

                // Check if activity id already exists
                $activity = Activity::firstOrNew(['activityId' => $result->id]);
                $activity->strava_id = $result->athlete->id;
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

        $res = $strava->client->request('GET', '/api/v3/activities/following/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ]);
        $res = json_decode($res->getBody());
        foreach ($res as $result) {
            if($result->average_speed < 7.5) {


                // Check if activity id already exists
                $activity = Activity::firstOrNew(['activityId' => $result->id]);
                $activity->strava_id = $result->athlete->id;
                $activity->name = $result->name;
                $activity->activityId = $result->id;
                $activity->distance = $result->distance;
                $activity->time = $result->elapsed_time;
                $activity->averageSpeed = $result->average_speed;
                $activity->latitude = $result->start_latitude;
                $activity->longitude = $result->start_longitude;
                $activity->save();
            }

        }

        return redirect('profile');

    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
