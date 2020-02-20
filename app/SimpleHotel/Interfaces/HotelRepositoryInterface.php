<?php

namespace App\SimpleHotel\Interfaces;

interface HotelRepositoryInterface {

    public function getHotelsForMainPage();

    public function getHotel($id);
}


