<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 18/10/2017
 * Time: 10:46
 */

namespace App\nerdrunningclub;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Strava
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.strava.com/',
            'timeout' => 2.0,
        ]);
    }

    public function get($url,$token)
    {
        $params = [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ]
        ];
        $res = $this->client->request('GET',$url,$params);
        return $res = \GuzzleHttp\json_decode($res->getBody());
    }

    public function post($url,$code)
    {
        $params =[
            'form_params' => [
                'client_id' =>  env("STRAVA_APP_ID"),
                'client_secret' => env("STRAVA_APP_SECRET"),
                'code' => $code,
            ]
        ];
        $res = $this->client->request('POST',$url,$params);
        return $res = \GuzzleHttp\json_decode($res->getBody());
    }

}