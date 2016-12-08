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
                                <input type="number" name="defaultCount" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="defaultPrice">Price</label>
                                <br/>
                                <input type="number" name="defaultPrice" required>
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