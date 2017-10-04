<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return redirect('https://www.strava.com/oauth/authorize?client_id=20594&response_type=code&redirect_uri=http://homestead.app/oauth/code_callback&scope=write&state=mystate&approval_prompt=force');
    }

    public function handleProviderCallback()
    {
        $code = request()->code;
        $client = new \GuzzleHttp\Client();
        //$url = "'https://www.strava.com/oauth/token?client_id=20594&client_secret=426f99ae57f2c243fdcc6e5fa320c011523c6161&code=".$code."'";
        $res = $client->request('POST', 'https://www.strava.com/oauth/token', [
            'form_params' => [
                'client_id' => '20594',
                'client_secret' => '426f99ae57f2c243fdcc6e5fa320c011523c6161',
                'code' => $code,
            ]
        ]);

        $result= json_decode($res->getBody());
        var_dump($result);

    }
}
