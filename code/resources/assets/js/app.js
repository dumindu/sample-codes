window.$ = window.jQuery = require('jquery');
global.Tether = require('tether');
require('bootstrap');
require('../x-editable/js/bootstrap-editable');

$( document ).ready(function() {
    $('.calendar__day__room_count').editable({
        type: 'number',
        pk: function() {
            var date = $(this).closest(".calendar__day").data('date');
            var roomType = $(this).closest(".calendar__day__room_data").data('room-type');
            return (date && roomType) ? {date: date, roomType: roomType} : '';
        },
        url: '/update',
        title: 'Change Availability',
        name: 'roomCount'
    });

    $('.calendar__day__room_price').editable({
        type: 'number',
        pk: function() {
            var date = $(this).closest(".calendar__day").data('date');
            var roomType = $(this).closest(".calendar__day__room_data").data('room-type');
            return (date && roomType) ? {date: date, roomType: roomType} : '';
        },
        url: '/update',
        title: 'Change Price',
        name: 'roomPrice'
    });
});