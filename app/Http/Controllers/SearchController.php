<?php

namespace App\Http\Controllers;

use App\SimpleHotel\Gateways\HotelGateway;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(HotelGateway $hotelGateway)
    {
        $this->hotelGateway = $hotelGateway;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $this->validate(request(), [
            'term' => 'required',
        ]);
        $hotels = $this->hotelGateway->getSearchResults($request);

        return view('search',
            [
                'hotels' => $hotels,
                'input' => $request->all()
            ]
        );
    }
}
