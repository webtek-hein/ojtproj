<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div id="main" class="card-block">
                <!-- Add schedule -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSchedule">Add Schedule
                </button>
                <select id="schedTypeOpts" class="custom-select pull-right">
                    <option value="All">All</option>
                    <option value="Internship">Internship</option>
                    <option value="Employment">Employment</option>
                    <option value="DONE">Done</option>
                </select>
                <div class="table-responsive">
                    <table id="scheduleTable" data-search="true">
                    </table>
                </div>
            </div>

            <div hidden id="details" class="card-block">
                <div class="detail tabs">
                    <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info"
                           role="tab" aria-controls="home" aria-expanded="true">Schedule Information</a>
                        <a class="nav-item nav-link" id="nav-registered-tab" data-toggle="tab" href="#nav-registered"
                           role="tab" aria-controls="profile" aria-expanded="false">Registered</a>
                    </nav>


                    <div class="tab-content" id="nav-tabContent">
                        <hr>
                        <div class="tab-pane fade active show" id="nav-info"
                             role="tabpanel" aria-labelledby="nav-info-tab" aria-expanded="true">
                            <form method="POST" action="Recruitments/editSchedule/schedules">
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label>Company</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <p id="company"></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label>Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <p id="eventType"></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Date</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="date" name="date" id="date" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Time</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="time" type="text" id="time" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Location</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="location" type="text" id="location" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Room</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="room" type="text" id="room" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label>Slots</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="number" name="slots" id="slots" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="button" class="btn btn-default" onclick="toggleDiv($('#main'),
                                        $('#details'))">Close
                                        </button>
                                        <button type="submit" name="id" id="schedSub" class="btn btn-success">Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-registered"
                             role="tabpanel" aria-labelledby="nav-registered-tab" aria-expanded="false">
                            <div class="table-responsive">
                                <button onclick="printToPDF()" class="btn btn-success">Print</button>
                                <table id="appointments" data-search="true">
                                </table>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal -->
<!-- ============================================================== -->
    <div id="addSchedule" class="modal fade col-lg-12" role="dialog">
        <div class="modal-dialog modal-lg">
            <form class="valSched" method="POST" action="Recruitments/addSchedule/schedules">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Exam Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                            <label class="col-md-8">Company Name</label>
                            <label class="col-md-3">Type</label>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="company" class="form-control" id="companyOptions">
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="event" class="form-control">
                                        <option value="Internship">Internship</option>
                                        <option value="Employment">Employment</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="col-md-8">Date and Time</label>
                            <div class="row">
                                <div class="col-md-5">
                                    <input required type="date" name="date" id="schedDate" class="form-control">
                                </div>
                                <div>
                                    <p>From</p>
                                </div>
                                <div class="col-md-3">
                                    <input required type="time" name="start" id="start_time" class="form-control">
                                </div>
                                <div>
                                    <p>TO</p>
                                </div>
                                <div class="col-md-3">
                                    <input required type="time" name="end" id="end_time" class="form-control">
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-9">Location and Room</label>
                            <label class="col-md-2">Slots</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input required name="location" id="loc" type="text" placeholder="Location" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input required name="room" id="r" type="text" placeholder="Room" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input required min="0" name="slots" type="number" class="form-control">
                                </div>
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
                <!-- End of Modal content-->
                    
                    </form>
                </div> 
        </div>

<!-- ============================================================== -->
<!-- End of Modal -->
<!-- ============================================================== -->
</div>
</div>