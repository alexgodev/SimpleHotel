<?php

namespace App\SimpleHotel\Presenters;
use Illuminate\Support\Str;

trait HotelPresenter {

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->description, 20, '...');
    }
}

