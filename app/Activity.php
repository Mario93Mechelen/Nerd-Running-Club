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
        'activityId', 'name', 'distance', 'time', 'strava_id', 'averagespeed','date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function friend() {
        return $this->belongsTo('Friend');
    }


}
