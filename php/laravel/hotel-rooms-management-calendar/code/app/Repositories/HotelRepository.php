<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository
{
    protected $hotel;

    function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function getHotelDataByHotelId($id)
    {
        return $this->hotel->find($id);
    }

    public function getHotelRoomTypesDataByHotelId($id)
    {
        return $this->hotel->find($id)->roomTypes;
    }
}