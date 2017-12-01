<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule_User extends Model
{
    //
    protected $fillable = [
        'user_id', 'schedule_id'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}

