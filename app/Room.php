<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use SimpleHotel\Presenters\HotelPresenter;

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel','hotel_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
