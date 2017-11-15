<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'avatar', 'user_id', 'strava_id'
    ];
    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
