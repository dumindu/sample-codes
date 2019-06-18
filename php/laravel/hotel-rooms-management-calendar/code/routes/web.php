<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('room-types', 'RoomTypeController');

Route::resource('hotels', 'HotelController');
Route::resource('hotels.room-types', 'HotelRoomTypeController');

Route::resource('hotels.issuance-calendar', 'HotelIssuanceCalendarController');
Route::resource('hotels.issuance-calendar.room_types', 'HotelIssuanceCalendarRoomTypeController');

Route::resource('hotels.reservation-calendar', 'HotelReservationCalendarController');
Route::resource('hotels.reservation-calendar.room_types', 'HotelReservationCalendarRoomTypeController');

Route::resource('hotels.reservations', 'HotelReservationsController');