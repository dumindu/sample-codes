window.$ = window.jQuery = require('jquery');
global.Tether = require('tether');
require('bootstrap');
require('../x-editable/js/bootstrap-editable');

$( document ).ready(function() {
    $.fn.editable.defaults.params = function (params) {
        params._token = csrf_token;
        return params;
    };

    $('.calendar__day__room_count').editable({
        type: 'number',
        pk: function() {
            var date = $(this).closest(".calendar__day").data('date');
            var hotelRoomTypeId = $(this).closest(".calendar__day__data_section").data('hotel-room-type-id');
            var defaultPrice = $(this).closest(".calendar__day__data_section").find(".calendar__day__room_price").html();

            return (date && hotelRoomTypeId && defaultPrice) ? {date: date, hotelRoomTypeId: hotelRoomTypeId, defaultPrice: defaultPrice} : '';
        },
        url: hotel_calendar_update_url,
        title: 'Change Availability',
        name: 'defaultCount'
    });

    $('.calendar__day__room_price').editable({
        type: 'number',
        pk: function() {
            var date = $(this).closest(".calendar__day").data('date');
            var hotelRoomTypeId = $(this).closest(".calendar__day__data_section").data('hotel-room-type-id');
            var defaultCount = $(this).closest(".calendar__day__data_section").find(".calendar__day__room_count").html();

            return (date && hotelRoomTypeId && defaultCount) ? {date: date, hotelRoomTypeId: hotelRoomTypeId, defaultCount: defaultCount} : '';
        },
        url: hotel_calendar_cell_update_url,
        title: 'Change Price',
        name: 'defaultPrice'
    });
});