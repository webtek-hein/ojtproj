<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div id="main" class="card-block">
                <!-- Add company -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCompany">Add Company
                </button>
                <select class="custom-select pull-right">
                    <option selected>Registered</option>
                    <option value="1">Archived</option>
                </select>
                <div class="table-responsive">
                    <table id="companyTable" data-search="true" class="table-no-bordered table">
                    </table>
                </div>

            </div>
            <div id="details" hidden class="card-block">
                <!--Back Button-->
                <button type="button" class="btn btn-info" onclick="toggleDiv($('#main'),$('#details'))">
                    Back to main Page</button>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <img src="assets/images/logo-icon.png">
                            <h1 id="company_name"></h1>
                        </div>
                        <div class="col-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<form method="POST" action='Recruitments/newCompany'>
    <!-- Modal -->
    <div id="addCompany" class="modal fade col-lg-12" role="dialog">
        <div class="modal-dialog modal-lg">
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
                                <input name="company" type="text" class="form-control">
                                <label>Address</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" name="add_num" class="form-control" placeholder="No">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="street" class="form-control" placeholder="Street">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="province" placeholder="Municipality/Province"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="city" placeholder="City" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <label>Contact Person</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="contact_firstname" class="form-control"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="contact_lastname" class="form-control"
                                               placeholder="First Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="contact_middlename" class="form-control"
                                               placeholder="Middle Name">
                                    </div>
                                    <div class="col-md-4">
                                        <select name="suffix" class="form-control">
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
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="tel" class="form-control" placeholder="Tel. No.">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="alt_mobile" class="form-control"
                                               placeholder="Alternative Mobile No">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="file" name="logo" class="form-control" placeholder="Logo">
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
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
