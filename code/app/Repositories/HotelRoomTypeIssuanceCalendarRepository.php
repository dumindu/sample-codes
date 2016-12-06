<?php

namespace App\Repositories;

use App\Models\HotelRoomTypeIssuanceCalendar;

class HotelRoomTypeIssuanceCalendarRepository
{
    protected $hotelRoomTypeIssuanceCalendar;

    function __construct(HotelRoomTypeIssuanceCalendar $hotelRoomTypeIssuanceCalendar)
    {
        $this->hotelRoomTypeIssuanceCalendar = $hotelRoomTypeIssuanceCalendar;
    }
}