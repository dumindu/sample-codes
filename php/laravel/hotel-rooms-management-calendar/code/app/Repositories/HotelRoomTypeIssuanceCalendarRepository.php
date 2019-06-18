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
        if (!isset($data['startDate']) && !isset($data['endDate'])) {
            $sql = $this->hotelRoomTypeIssuanceCalendar->getInsertOrUpdateIfExistsQuery([$data]);
            $this->hotelRoomTypeIssuanceCalendar->getConnection()->statement($sql);
        } else {
            $processedDataArray = [];
            $selectedDaysArray = $this->getSelectedDaysArray($data['selectedDayGroup'], $data['selectedDays']);

            $begin = new \DateTime($data['startDate']);
            $end = new \DateTime($data['endDate']);
            $end = $end->modify( '+1 day' );

            $interval = new \DateInterval('P1D');
            $daterange = new \DatePeriod($begin, $interval ,$end);

            foreach($daterange as $date){
                if (in_array($date->format('N'), $selectedDaysArray)) {
                    $processedDataArray[] = [
                        'hotelRoomTypeId' => $data['hotelRoomTypeId'],
                        'date' => $date->format("Y-m-d"),
                        'defaultCount' => $data['defaultCount'],
                        'defaultPrice' => $data['defaultPrice']
                    ];
                }
            }

            $sql = $this->hotelRoomTypeIssuanceCalendar->getInsertOrUpdateIfExistsQuery($processedDataArray);
            $this->hotelRoomTypeIssuanceCalendar->getConnection()->statement($sql);
        }
    }

    protected function getSelectedDaysArray($selectedDayGroup, $selectedDays)
    {
        $result = [];
        switch ($selectedDayGroup) {
            case 'all_days':
                $result = range(1,7);
                break;
            case 'all_weekdays':
                $result = range(1,5);
                break;
            case 'all_weekends':
                $result = [6, 7];
                break;
            case 'custom':
                $result = $selectedDays;
        }
        return $result;
    }
}