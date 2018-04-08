<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <!-- Add schedule -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSchedule">Add Schedule
                </button>
                <select id="schedTypeOpts" class="custom-select pull-right">
                    <option value="All">All</option>
                    <option value="Exam">Exam</option>
                    <option value="Orientation">Orientation</option>
                    <option value="Seminar">Seminar</option>
                </select>
                <div class="table-responsive">
                    <table id="scheduleTable" data-search="true">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<!-- Modal -->
<div id="addSchedule" class="modal fade col-lg-12" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="Recruitments/addSchedule">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Company Name</label>
                        <div class="row">
                            <div class="col-md-10">
                                <select name="company" class="form-control" id="companyOptions">
                                </select>
                            </div>
                        </div>
                        <label>Type and Purpose</label>
                        <div class="row">
                            <div class="col-md-5">
                                <select name="type" class="form-control">
                                    <option value="Exam">Exam</option>
                                    <option value="Orientation">Orientation</option>
                                    <option value="Seminar">Seminar</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="event" class="form-control">
                                    <option value="Internship">Internship</option>
                                    <option value="Employment">Employment</option>
                                </select>
                            </div>
                        </div>
                        <label>Date and Time</label>
                        <div class="row">

                            <div class="col-md-4">
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div>
                                <p>From</p>
                            </div>
                            <div class="col-md-2">
                                <input type="time" name="start" class="form-control">
                            </div>
                            <div>
                                <p>TO</p>
                            </div>
                            <div class="col-md-3">
                                <input type="time" name="end" class="form-control">
                            </div>

                        </div>
                        <div class="row">

                        </div>
                        <label>Location and Room</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="location" type="text" placeholder="Location" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input name="room" type="text" placeholder="Room" class="form-control">
                            </div>
                        </div>
                        <label>Slots</label>
                        <div class="row">
                            <div class="col-md-5">
                                <input name="slots" type="number" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>