<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    public function roomTypes()
    {
        return $this->hasMany('App\Models\HotelRoomType');
    }
}