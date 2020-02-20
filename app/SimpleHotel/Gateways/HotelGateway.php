<?php

namespace App\SimpleHotel\Gateways;

use App\SimpleHotel\Interfaces\HotelRepositoryInterface;

class HotelGateway {

    public function __construct(HotelRepositoryInterface $hotelRepo)
    {
        $this->hotelRepo = $hotelRepo;
    }

    /**
     * @param $request
     *
     * @return bool
     */
    public function getSearchResults($request)
    {
        $searchTerm = $request->input('term');
        $dayin = date('Y-m-d', strtotime($request->input('check_in')));
        $dayout = date('Y-m-d', strtotime($request->input('check_out')));

        $results = $this->hotelRepo->getSearchResults($searchTerm);

        if (!$results) {
            return false;
        }

        foreach ($results as $result) {
            $this->checkRoomsAvailability($result->rooms, $dayin, $dayout);
        }

        if (count($results) > 0) {
            return $results;
        }
        return false;
    }

    /**
     * Check if room available on dates
     * @param $rooms
     * @param $dayin
     * @param $dayout
     *
     * @return mixed
     */
    private function checkRoomsAvailability($rooms, $dayin, $dayout)
    {
        foreach ($rooms as $k => $room)  {
            foreach ($room->reservations as $reservation) {
                if ($dayin >= $reservation->day_in && $dayin <= $reservation->day_out) {
                    $rooms->forget($k);
                } elseif ($dayout >= $reservation->day_in && $dayout <= $reservation->day_out) {
                    $rooms->forget($k);
                } elseif ($dayin <= $reservation->day_in && $dayout >= $reservation->day_out) {
                    $rooms->forget($k);
                }
            }
        }
        return $rooms;
    }
}


