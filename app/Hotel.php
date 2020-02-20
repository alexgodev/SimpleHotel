<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use SimpleHotel\Presenters\HotelPresenter;

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room','hotel_id');
    }


}
