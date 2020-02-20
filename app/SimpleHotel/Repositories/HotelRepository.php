<?php

namespace App\SimpleHotel\Repositories;

use App\SimpleHotel\Interfaces\HotelRepositoryInterface;
use App\Hotel;

class HotelRepository implements HotelRepositoryInterface  {

    public function getHotelsForMainPage()
    {
        return Hotel::with(['city','images'])->orderBy('id', 'desc')->paginate(6);
    }

    public function getHotel($id)
    {
        return Hotel::with(['city','images'])->find($id);
    }

    public function getSearchResults(string $search)
    {
        $results = Hotel::with(['city', 'images', 'rooms'])->where('name', 'LIKE', '%' .$search. '%')
            ->orWhere('description', 'LIKE', '%' .$search. '%')
            ->orWhereHas('city', function($q) use ($search) {
                return $q->where('name', 'LIKE', '%' . $search . '%');
            })->orWhereHas('rooms', function($q) use ($search) {
                return $q->where('description', 'LIKE', '%' . $search . '%');
            })->paginate(6);

        return $results;
    }
}


