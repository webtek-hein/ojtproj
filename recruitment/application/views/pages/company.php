<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <!-- Add company -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCompany">Add Company
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
<div id="addCompany" class="modal fade col-lg-12" role="dialog">
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
                                <div class="col-md-6">
                                    <label>Comapny Name</label>
                                    <input type="number" class="form-control">
                                    <label>Address</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="No">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Street">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Municipality/Province" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <label>Contact Person</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="Middle Name">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control">
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pull-right">
                                    <label>Contact No:</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" placeholder="Tel. No.">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" placeholder="Mobile No">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" placeholder="Alternative Mobile No">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" placeholder="Logo">
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