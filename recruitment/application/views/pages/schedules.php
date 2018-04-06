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
                <select class="custom-select pull-right">
                    <option selected>Registered</option>
                    <option value="1">Archived</option>
                </select>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Settings</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                        </tr>
                        </tbody>
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
        <form method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Company Name</label>
                                <input type="number" class="form-control">

                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Exam</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control">
                                            <option>Internship</option>
                                        </select>
                                    </div>
                                </div>
                                <label>Date</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Date" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Day" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Year" class="form-control">
                                    </div>
                                </div>
                                <label>Time</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" placeholder="00:00" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control">
                                            <option>AM</option>
                                            <option>PM</option>
                                        </select>
                                    </div>
                                    <div>
                                        <p>TO</p>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="00:00" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control">
                                            <option>AM</option>
                                            <option>PM</option>
                                        </select>
                                    </div>
                                </div>
                                <label>Location</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" >
                                    </div>
                                    <label>Room</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <label>Slots</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" >
                                    </div>
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
                            <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                        </div>



                    </div>
                </div>
            </div>
        </form>
    </div>
</div>