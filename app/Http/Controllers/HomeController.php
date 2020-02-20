<?php

namespace App\Http\Controllers;

use App\SimpleHotel\Interfaces\HotelRepositoryInterface;
use App\SimpleHotel\Gateways\HotelGateway;

class HomeController extends Controller
{
    public function __construct(HotelRepositoryInterface $hotelRepository, HotelGateway $hotelGateway)
    {
        $this->hotelRepo = $hotelRepository;
        $this->hotelGateway = $hotelGateway;
    }

    /**
     * Display a homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $hotels = $this->hotelRepo->getHotelsForMainPage();
        return view('search',['hotels' => $hotels]);
    }
}
