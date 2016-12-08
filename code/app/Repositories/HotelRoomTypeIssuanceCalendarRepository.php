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

    public function getCalendarDataByMonth($month, $hotelId)
    {
        $rawData = $this->getRawCalendarDataByMonth($month, $hotelId);

        $result = [];
        if ($rawData) {
            foreach ($rawData as $row) {
                $result[$row['date']] = isset($result[$row['date']]) ? $result[$row['date']] : [];
                $result[$row['date']][$row['hotels_room_type_id']] = [
                    'defaultCount' => $row['default_count'],
                    'defaultPrice' => $row['default_price']
                ];
            }
        }

        return $result;
    }

    protected function getRawCalendarDataByMonth($month, $hotelId)
    {
        if ($month && $hotelId) {
            list($yearNo, $monthNo) = explode('-', $month);
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNo, $yearNo);

            return $this->hotelRoomTypeIssuanceCalendar
                ->select('hotels_room_types_issuance_calendar.*')
                ->join('hotels_room_types', 'hotels_room_types_issuance_calendar.hotels_room_type_id', '=', 'hotels_room_types.id')
                ->where([
                    ['hotels_room_types.hotel_id', '=', $hotelId],
                    ['date', '>=', $month . '-01'],
                    ['date', '<=', $month . '-' . $daysInMonth]
            ])->get();
        }
    }

    function insertOrUpdateIfExists($data)
    {
        $sql = $this->hotelRoomTypeIssuanceCalendar->getInsertOrUpdateIfExistsQuery($data);
        $this->hotelRoomTypeIssuanceCalendar->getConnection()->statement($sql);

    }
}