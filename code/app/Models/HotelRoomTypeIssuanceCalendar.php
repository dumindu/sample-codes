<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomTypeIssuanceCalendar extends Model
{
    protected $table = 'hotels_room_types_issuance_calendar';

    public function getInsertOrUpdateIfExistsQuery($data)
    {
        $sql = 'INSERT INTO hotels_room_types_issuance_calendar '
            . '(hotels_room_type_id, date, default_count, default_price) VALUES ';

        $valuesQuery = '';
        foreach ($data as $row) {
            $valuesQuery .= "('" . implode("', '", $row) . "'), ";
        }
        $valuesQuery = substr($valuesQuery, 0, -2) . ' ';

        $sql .= $valuesQuery
            . 'ON DUPLICATE KEY UPDATE '
            . 'default_count = VALUES(default_count), default_price = VALUES(default_price)';

        return $sql;
    }
}
