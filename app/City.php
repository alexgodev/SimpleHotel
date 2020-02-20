<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasManyThrough('App\Room', 'App\Hotel','city_id','hotel_id');
    }
}
