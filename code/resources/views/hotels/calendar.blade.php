@extends('layouts.app')

@section('title', $hotelData->name . ' - ' . $month . ' Issuance')

@php
    $hotelUrl = '/hotels/' . str_replace(' ', '-', strtolower($hotelData->name)) . '-' . $hotelData->id;
@endphp

@section('content')
    <div class="container">

        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="/">Home</a>
            <a class="breadcrumb-item" href="{{ $hotelUrl }}"> {{ $hotelData->name }}</a>
            <span class="breadcrumb-item active">{{ $calendarWidgetData['calendarTitle'] . ' Room Issuance' }}</span>
        </nav>

        <section class="calendar">

            <div class="row">
                <div class="col-sm-6">
                    <h1>{{ $calendarWidgetData['calendarTitle'] }}</h1>
                </div>

                <div class="col-sm-6">
                    <div class="btn-toolbar calendar__toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group hidden-sm-down" role="group" aria-label="Basic example">
                            <a class="btn btn-primary active"><i class="icon-grid"></i></a>
                            <a class="btn btn-primary"><i class="icon-list"></i></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example" data-toggle="modal" data-target="#mod_bulk_operations">
                            <a class="btn btn-primary"><i class="icon-edit"></i></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="{{ $hotelUrl }}/issuance-calendar/{{ $calendarWidgetData['lastMonth'] }}"><i class="icon-left"></i></a>
                            <a class="btn btn-primary" href="{{ $hotelUrl }}/issuance-calendar/{{ $calendarWidgetData['nextMonth'] }}"><i class="icon-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row calendar__dates_wrapper hidden-sm-down">
                <div class="calendar__date">Mon</div>
                <div class="calendar__date">Tue</div>
                <div class="calendar__date">Web</div>
                <div class="calendar__date">Thu</div>
                <div class="calendar__date">Fri</div>
                <div class="calendar__date">Sat</div>
                <div class="calendar__date">Sun</div>
            </div>

            <div class="row calendar__days_wrapper">

                @for ($i = 0; $i < $calendarWidgetData['startEmptyCells']; $i++)
                    <div class="calendar__day calendar__day_empty"></div>
                @endfor

                @for ($i = 1; $i <= $calendarWidgetData['daysInMonth']; $i++)
                    @php
                        $calendarDate = $month . '-' . str_pad($i, 2, "0", STR_PAD_LEFT);
                    @endphp
                    <div class="calendar__day" data-date="{{ $calendarDate }}">
                        <div class="calendar__day__date">{{ $i }}</div>
                        <div>
                            @foreach ($hotelRoomTypesData as $hotelRoomTypeData)
                                @php
                                    $roomCount = isset($calendarData[$calendarDate][$hotelRoomTypeData['room_type_id']]['defaultCount']) ? $calendarData[$calendarDate][$hotelRoomTypeData['room_type_id']]['defaultCount'] : $hotelRoomTypeData['default_count'];
                                    $roomPrice = isset($calendarData[$calendarDate][$hotelRoomTypeData['room_type_id']]['defaultPrice']) ? $calendarData[$calendarDate][$hotelRoomTypeData['room_type_id']]['defaultPrice'] : $hotelRoomTypeData['default_price'];
                                @endphp
                                <div class="calendar__day__data_section left_border_{{ $hotelRoomTypeData['room_type_id'] }}" data-hotel-room-type-id="{{ $hotelRoomTypeData['id'] }}">
                                    <div>
                                        <i class="icon-book"></i>
                                        <a class="calendar__day__room_count" href="#">{{ $roomCount }}</a>
                                    </div>
                                    <div>
                                        <i class="icon-shop"></i>
                                        <a class="calendar__day__room_price" href="#">{{ $roomPrice }}</a> IDR
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor

                @for ($i = 0; $i < $calendarWidgetData['endEmptyCells']; $i++)
                    <div class="calendar__day calendar__day_empty"></div>
                @endfor
            </div>
        </section>

        @include('hotels.calendar_bulk_insertion_form')

    </div>
@endsection


@section('globaljs')
var hotel_url = '{{ $hotelUrl  }}';
var hotel_calendar_cell_update_url = '{{ $hotelUrl  }}/issuance-calendar';
var csrf_token = '{{ csrf_token() }}';
@endsection