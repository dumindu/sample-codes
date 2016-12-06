<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\HotelRepository;
use App\Repositories\CalendarWidgetRepository;
use App\Repositories\HotelRoomTypeIssuanceCalendarRepository;

class HotelIssuanceCalendarController extends Controller
{
    protected $hotel;
    protected $calendarWidget;
    protected $hotelRoomTypeIssuanceCalendar;

    function __construct(HotelRepository $hotel, CalendarWidgetRepository $calendarWidget, HotelRoomTypeIssuanceCalendarRepository $hotelRoomTypeIssuanceCalendar)
    {
        $this->hotel = $hotel;
        $this->calendarWidget = $calendarWidget;
        $this->hotelRoomTypeIssuanceCalendar = $hotelRoomTypeIssuanceCalendar;
    }

    public function show($hotelSlug, $month)
    {
        $hotelId = (int)substr(strrchr($hotelSlug, '-'), 1);
        $isValidMonth = $this->validateDate($month . '-01');
        if (is_int($hotelId) && $isValidMonth) {
            $hotelData = $this->hotel->getHotelDataByHotelId($hotelId);
            $hotelRoomTypesData = $this->hotel->getHotelRoomTypesDataByHotelId($hotelId);
            $calendarWidgetData = $this->calendarWidget->getCalendarWidgetDataByMonth($month);

            if ($hotelData && $hotelRoomTypesData && $calendarWidgetData) {
                $data = [
                    'month' => $month,
                    'hotelData' => $hotelData,
                    'hotelRoomTypesData' => $hotelRoomTypesData,
                    'calendarWidgetData' => $calendarWidgetData
                ];

                return view('hotels.calendar', $data);
            }
        }
    }

    public function store()
    {
        //
    }

    protected function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}