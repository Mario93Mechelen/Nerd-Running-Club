<?php
/**
 * Created by PhpStorm.
 * User: Caroline
 * Date: 22/11/2017
 * Time: 11:28
 */

namespace App\nerdrunningclub;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Googlemaps
{
    //public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://maps.googleapis.com/',
            'timeout' => 2.0,
        ]);
    }

    public function get($latitude, $longitude)
    {
        $res = $this->client->request('GET','maps/api/geocode/json?key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM&latlng='.$latitude.','.$longitude);
        return $res = \GuzzleHttp\json_decode($res->getBody());


        /*$client = new Client();
        $url = 'https://maps.googleapis.com/maps/api/staticmap?center=51.024779,4.484782&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C51.024779,4.484782&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM';
        return $res = $client->request('GET', $url)->getBody();*/

    }

}