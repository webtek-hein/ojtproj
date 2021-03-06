<!-- ============================================================== -->
<!-- Start of Page Content -->
<!-- ============================================================== -->

<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div id="main" class="card-block">
                <!-- Add company -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCompany">Add Company
                </button>
                <select id="compStatus" class="custom-select pull-right">
                    <option value="0" selected>Registered</option>
                    <option value="1">Archived</option>
                </select>
                <div class="table-responsive">
                    <table id="companyTable" data-search="true" class="table-no-bordered table">
                    </table>
                </div>

            </div>
            <div id="details" hidden class="card-block">
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <img id="companyImage" height="42" width="42">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="edtInfo" id="company_name"></h3>
                        </div>
                        <div class="col-sm-12">
                            <h3>Address:</h3>
                        </div>
                        <div class="col-sm-12">
                            <p name="address" class="edtInfo" id="address"></p>
                        </div>
                        <div class="col-sm-12">
                            <h3>Contact Person</h3>
                        </div>
                        <div class="col-sm-12">
                            <p class="edtInfo" id="contact_person"></p>
                        </div>
                        <div class="col-sm-12">
                            <h3>Contact Information</h3>
                        </div>
                        <div class="col-sm-12">
                            <p>Contact Number: <span name="mobile" class="sInfo edtInfo" id="mobile_num"></span></p>
                            <p>Telephone Number: <span name="tel" class="sInfo edtInfo" id="tel"></span></p>
                            <p>Alternate Contact Number: <span name="alt" class="sInfo edtInfo" id="alt_number"></span>
                            </p>
                            <p>Email: <span class="sInfo edtInfo" name="email" id="email"></span></p>
                        </div>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#about">More Description</a>
                                    </h4>
                                </div>
                                <div id="about" class="panel-collapse collapse">
                                    <p id="desc">No Description</p>
                                </div>
                            </div>
                        </div>
                        <div hidden id="editButtons" class="col-sm-12">
                            <button id="saveBtn" type="button" class="btn btn-success">Save</button>
                            <button id="canceltBtn" type="button" class="btn btn-warning">Cancel</button>
                        </div>
                        <div id="mainButtons" class="col-sm-12">
                            <button id="editBtn" type="button" class="btn btn-warning">Edit</button>
                            <button type="button" id="archive" class="btn btn-danger">Archive</button>
                            <button id="detailBack" type="button" class="btn btn-info"
                                    onclick="toggleDiv($('#main'),$('#details'))">Back
                            </button>
                            <button type="button" hidden id="revert" class="btn btn-danger">Revert</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End of Page Content -->
<!-- ============================================================== -->

<form method="POST" action='Recruitments/newCompany'  enctype="multipart/form-data">
<!-- ============================================================== -->
<!-- Modal -->
<!-- ============================================================== -->
    <div id="addCompany" class="modal fade col-lg-12" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label>Company Name</label>
                        <input required name="company" type="text" class="col-md-11 form-control" required>
                    </div>
                    <p class="col-md-12">Address</p>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-3">No</label>
                        <label class="col-md-8">Street</label>
                        <input required type="number" name="add_num" class="col-md-3 form-control" required>
                        <input required type="text" name="street" class="col-md-8 form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Municipality/Province</label>
                        <input required type="text" name="province" class="col-md-11 form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">City</label>
                        <input required type="text" name="city" class="col-md-11 form-control" required>
                    </div>
                    <p>Contact Person</p>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label class="col-md-0">First Name</label>
                            <input type="text" name="contact_firstname" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="col-md-0">Last Name</label>
                            <input type="text" name="contact_lastname" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="col-md-0">Middle Name</label>
                            <input type="text" name="contact_middlename" class="form-control">
                        </div>
                        <div class="col-md-2">
                        <label class="col-md-2">Suffix</label>
                            <select name="suffix" class="form-control">
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Ms</option>
                            </select>
                        </div>
                        
                    </div>
                    <p>Contact Information</p>
                    <hr>
                    <div class="form-group">
                        <label>Email</label>
                        <input required type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Telephone No.</label>
                        <input type="text" name="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mobile No.</label>
                        <input required type="text" name="mobile" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alternative Mobile No.</label>
                        <input type="text" name="alt_mobile" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control" size="20" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button id="companySub" type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
<!-- ============================================================== -->
<!-- End of Modal -->
<!-- ============================================================== -->
    </div>
    </div>
</form>
