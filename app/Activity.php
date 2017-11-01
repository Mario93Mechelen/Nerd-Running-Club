<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function friend() {
        return $this->belongsTo('Friend');
    }
}
