<?php
/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 18/10/2017
 * Time: 10:46
 */

namespace App;

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


}