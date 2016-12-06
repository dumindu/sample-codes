<?php

namespace App\Repositories;

class CalendarWidgetRepository
{
    function getCalendarWidgetDataByMonth($month)
    {
        if ($month) {
            list($yearNo, $monthNo) = explode('-', $month);
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $monthNo, $yearNo);
            $dateTimeObj = new \DateTime($month . '-01');

            $calendarWidgetData = [
                'daysInMonth' => $daysInMonth,
                'startEmptyCells' => date("N", mktime(0, 0, 0, $monthNo, 1, $yearNo)) -1,
                'endEmptyCells' => 7 - date("N", mktime(0, 0, 0, $monthNo, $daysInMonth, $yearNo)),
                'calendarTitle' => date("F Y", mktime(0, 0, 0, $monthNo, 1, $yearNo)),
                'lastMonth' => $dateTimeObj->modify('-1 month')->format('Y-m'),
                'nextMonth' => $dateTimeObj->modify('+2 month')->format('Y-m')
            ];

            return $calendarWidgetData;
        }
    }
}