<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badges_User extends Model
{
    //
    protected $fillable = [
        'user_id', 'badge_id'
    ];
}
