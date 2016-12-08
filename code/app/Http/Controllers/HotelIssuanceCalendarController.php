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
            $calendarData = $this->hotelRoomTypeIssuanceCalendar->getCalendarDataByMonth($month, $hotelId);

            if ($hotelData && $hotelRoomTypesData && $calendarWidgetData) {
                $data = [
                    'month' => $month,
                    'hotelData' => $hotelData,
                    'hotelRoomTypesData' => $hotelRoomTypesData,
                    'calendarWidgetData' => $calendarWidgetData,
                    'calendarData' => $calendarData
                ];

                return view('hotels.calendar', $data);
            }
        }
    }

    public function store(Request $request)
    {
        if ($request->get('name') && $request->get('value')) {
            $this->cellUpdate($request);
        } else {
            $this->bulkUpdate($request);
        }
    }

    protected function cellUpdate(Request $request)
    {
        $name = $request->get('name');
        $value = $request->get('value');
        $otherData = $request->get('pk');
        $data = [
            'hotelRoomTypeId' => $otherData['hotelRoomTypeId'],
            'date' => $otherData['date'],
            'defaultCount' => isset($otherData['defaultCount']) && 'defaultPrice' == $name ? $otherData['defaultCount'] : $value,
            'defaultPrice' => isset($otherData['defaultPrice']) && 'defaultCount' == $name ? $otherData['defaultPrice'] : $value
        ];

        $this->hotelRoomTypeIssuanceCalendar->insertOrUpdateIfExists($data);
    }

    protected function bulkUpdate(Request $request)
    {
        $hotelRoomTypeId = $request->get('hotelRoomTypeId');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $defaultCount = $request->get('defaultCount');
        $defaultPrice = $request->get('defaultPrice');

        $selectedDayGroup = $request->get('selectedDayGroup');
        $selectedDays = 'custom' != $selectedDayGroup ? null : $request->get('selectedDays');

        if($hotelRoomTypeId && $startDate && $endDate && $defaultCount && $defaultPrice) {
            $data = [
                'hotelRoomTypeId' => $hotelRoomTypeId,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'defaultCount' => $defaultCount,
                'defaultPrice' => $defaultPrice,
                'selectedDayGroup' => $selectedDayGroup,
                'selectedDays' => $selectedDays
            ];
            $this->hotelRoomTypeIssuanceCalendar->insertOrUpdateIfExists($data);
        }

        $returnUrl = $request->get('returnUrl');
        header('Location: ' . $returnUrl);exit;
    }

    protected function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}