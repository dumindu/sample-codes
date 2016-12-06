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
                            <a class="btn btn-secondary active"><i class="icon-grid"></i></a>
                            <a class="btn btn-secondary"><i class="icon-list"></i></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example" data-toggle="modal" data-target="#mod_bulk_operations">
                            <a class="btn btn-secondary"><i class="icon-edit"></i></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary" href="{{ $hotelUrl }}/issuance-calendar/{{ $calendarWidgetData['lastMonth'] }}"><i class="icon-left"></i></a>
                            <a class="btn btn-secondary" href="{{ $hotelUrl }}/issuance-calendar/{{ $calendarWidgetData['nextMonth'] }}"><i class="icon-right"></i></a>
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
                    <div class="calendar__day"></div>
                @endfor

                @for ($i = 1; $i <= $calendarWidgetData['daysInMonth']; $i++)
                    <div class="calendar__day" data-date="{{ $month . '-' . $i}}">
                        <div class="calendar__day__date">{{ $i }}</div>
                        <div>
                            @foreach ($hotelRoomTypesData as $hotelRoomTypeData)
                                <div class="row calendar__day__room_data bg_{{ $hotelRoomTypeData['room_type_id'] }}" data-room-type="1">
                                    <div class="col-lg-4">
                                        <button type="button" class="btn btn-secondary btn-round">
                                            <i class="icon-bed"></i>
                                            <span class="tag tag-round-text tag-warning">{{ $hotelRoomTypeData['room_type_id'] }}</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-8">
                                        <div>
                                            <i class="icon-book"></i>
                                            <a class="calendar__day__room_count" href="#">{{ $hotelRoomTypeData['default_count'] }}</a>
                                        </div>
                                        <div>
                                            <i class="icon-shop"></i>
                                            <a class="calendar__day__room_price" href="#">{{ $hotelRoomTypeData['default_price'] }}</a> IDR
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endfor

                @for ($i = 0; $i < $calendarWidgetData['endEmptyCells']; $i++)
                    <div class="calendar__day"></div>
                @endfor
            </div>
        </section>

        <div class="modal fade" id="mod_bulk_operations">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form name="fm_bulk_operations" method="post" href="$hotelUrl">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Bulk Operations</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="hotelRoomType">Select Room</label>
                                <select class="form-control" name="hotelRoomType">
                                    <option value="1">Single Room</option>
                                    <option value="1">Double Room</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="startDate">Start Date</label>
                                        <input type="date" name="startDate" min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="endDate">End Date</label>
                                        <input type="date" name="endDate" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="radio" name="days" value="all_days" checked> All Days
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="radio" name="days" value="all_weekdays"> All Weekdays
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="radio" name="days" value="all_weekends"> All Weekends
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="radio" name="days" value="custom"> Custom
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="mondays"> Mondays
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="tuesdays"> Tuesdays
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="wednesdays"> Wednesdays
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="thursdays"> Thursdays
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="fridays"> Fridays
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="saturdays"> Saturdays
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="checkbox" name="days" value="sundays"> Sundays
                                        </div>
                                        <div class="col-xs-3">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="defaultCount">Availability</label>
                                        <br/>
                                        <input type="number" name="defaultCount">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="defaultPrice">Price</label>
                                        <br/>
                                        <input type="number" name="defaultPrice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection