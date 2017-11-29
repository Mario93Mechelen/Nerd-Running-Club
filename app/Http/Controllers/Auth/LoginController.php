<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\nerdrunningclub\Strava;
use App\Friends;
use App\Activity;
use App\Schedule;
use App\Schedule_User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\nerdrunningclub\Googlemaps;

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
        return redirect('https://www.strava.com/oauth/authorize?client_id='.$id.'&response_type=code&redirect_uri='.$redirecturi.'&scope=write&state=mystate&approval_prompt=auto');
    }

    public function handleProviderCallback()
    {
        $code = request()->code;
        $strava = new Strava();
        //$url = "'https://www.strava.com/oauth/token?client_id=20594&client_secret=426f99ae57f2c243fdcc6e5fa320c011523c6161&code=".$code."'";
        $res = $strava->post( '/oauth/token', $code);
        $athlete = $res->athlete;

        $user = User::firstOrNew(['strava_id' => $athlete->id]);
            $user->strava_id = $athlete->id;
            $user->firstname = $athlete->firstname;
            $user->lastname = $athlete->lastname;
            $user->email = $athlete->email;
            if($athlete->profile == "" || $athlete->profile == NULL || $athlete->profile == "avatar/athlete/large.png"){
                $user->avatar = "https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png";
            } else {
                $user->avatar = $athlete->profile;
            }
            $user->gender = $athlete->sex;
            $user->token = $res->access_token;
            $user->save();

        Auth::login($user);
        $token = Auth::user()->token;
        $id = Auth::id();

        $res = $strava->get('/api/v3/athlete/activities/', $token);
        foreach ($res as $result) {
            if(Activity::where('activityId',$result->id)!=null) {
                if ($result->start_latitude != null && $result->start_longitude != null) {
                    $googlemaps = new Googlemaps();
                    $address = $googlemaps->get($result->start_latitude, $result->start_longitude);
                    $address = $address->results[1]->address_components[0]->long_name;
                } else {
                    $address = "no address";
                }
            }
                if ($result->average_speed < 7.5) {

                    // Check if activity id already exists
                    $activity = Activity::firstOrNew(['activityId' => $result->id]);
                    $activity->user_id = $id;
                    $activity->name = $result->name;
                    $activity->activityId = $result->id;
                    $activity->time = $result->elapsed_time;
                    $activity->distance = $result->distance;
                    $activity->averageSpeed = $result->average_speed;
                    $activity->address = $address;
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
