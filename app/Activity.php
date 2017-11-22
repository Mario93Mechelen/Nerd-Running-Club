<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\nerdrunningclub\Googlemaps;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Activity extends Model
{
    //
    protected $fillable = [
        'activityId', 'name', 'distance', 'time', 'strava_id', 'averagespeed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function friend() {
        return $this->belongsTo('Friend');
    }

    public function mapsActivity( $latitude, $longitude ) {
        Mapper::map($latitude, $longitude, [
            'zoom' => 9,
            'ui' => false,
            'streetViewControl' => false,
            'mapTypeControl' => false,
            'fullscreenControl' => false,
            'scaleControl' => false,
            'zoomControl' => false,
            'scrollWheelZoom' => false
        ]);
    }

    public function googleMaps ( $latitude, $longitude ) {
        //$url = 'https://maps.googleapis.com/maps/api/staticmap?center=' . $latitude . ',' . $longitude . '&zoom=13&size=200x200&maptype=roadmap&markers=color:blue%7Clabel:S%7C' . $latitude . ',' . $longitude .'&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM';
        //$url = 'https://maps.googleapis.com/maps/api/staticmap?center=51.024779,4.484782&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C51.024779,4.484782&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM';
        /*$maps = new Googlemaps();
        $res = $maps->get($latitude, $longitude);
        return $res;*/

        $client = new Client();
        $url = 'https://maps.googleapis.com/maps/api/staticmap?center=51.024779,4.484782&zoom=13&size=200x200&maptype=roadmap&markers=color:blue%7Clabel:S%7C51.024779,4.484782&key=AIzaSyAuVtcvIZX0MMqEZrJ2_ghI2MsWQ5MmvPM';
        $res = $client->request('GET', $url)->getBody()->getContents();
        $result = json_decode(json_encode($res));
        return $result;

    }

}
