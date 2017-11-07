<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = [
        'activityId', 'name', 'distance', 'time', 'strava_id', 'averagespeed'
    ];
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function friend() {
        return $this->belongsTo('Friend');
    }
}
