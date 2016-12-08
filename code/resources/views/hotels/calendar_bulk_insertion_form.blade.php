<div class="modal fade" id="mod_bulk_operations">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="fm_bulk_operations" method="post" href="$hotelUrl" action="{{ $hotelUrl  }}/issuance-calendar">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Bulk Operations</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="hotelRoomType">Select Room</label>
                        <select class="form-control" name="hotelRoomTypeId">
                            <option value="1">Single Room</option>
                            <option value="2">Double Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="startDate">Start Date</label>
                                <input type="date" name="startDate" min="{{ date('Y-m-d') }}" required placeholder='YYYY-MM-DD' pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                            </div>
                            <div class="col-xs-6">
                                <label for="endDate">End Date</label>
                                <input type="date" name="endDate" min="{{ date('Y-m-d') }}" required placeholder='YYYY-MM-DD' pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-3">
                                <input type="radio" name="selectedDayGroup" value="all_days" checked> All Days
                            </div>
                            <div class="col-xs-3">
                                <input type="radio" name="selectedDayGroup" value="all_weekdays"> All Weekdays
                            </div>
                            <div class="col-xs-3">
                                <input type="radio" name="selectedDayGroup" value="all_weekends"> All Weekends
                            </div>
                            <div class="col-xs-3">
                                <input type="radio" name="selectedDayGroup" value="custom"> Custom
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="1"> Mondays
                                </div>
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="2"> Tuesdays
                                </div>
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="3"> Wednesdays
                                </div>
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="4"> Thursdays
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="5"> Fridays
                                </div>
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="6"> Saturdays
                                </div>
                                <div class="col-xs-3">
                                    <input type="checkbox" name="selectedDays[]" value="7"> Sundays
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
                                <input type="number" name="defaultCount" required min="0" max="255">
                            </div>
                            <div class="col-xs-6">
                                <label for="defaultPrice">Price</label>
                                <br/>
                                <input type="number" name="defaultPrice" required  min="0" max="4294967294">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="returnUrl" type="hidden" value="http://{{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>