<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activity()
    {
        return $this->hasMany('App\Activity','user_id','id');
    }

    public function friends()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')->orderBy('firstname');
    }

    public function badge() {

        return $this->belongsToMany('App\Badges', 'badges__users','user_id', 'badge_id');
    }

    public function goals() {

        return $this->belongsToMany('App\Schedule', 'schedule__users','user_id', 'schedule_id');

    }




}
