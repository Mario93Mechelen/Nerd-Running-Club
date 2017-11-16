<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mapper;

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
        Mapper::map($latitude, $longitude, ['zoom' => 15, 'ui' => false, 'streetViewControl' => false, 'mapTypeControl' => false ]);
    }

}
