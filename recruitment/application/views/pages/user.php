<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div id="main" class="card-block">
                <select id="userStatus" class="custom-select pull-right">
                    <option selected value="registered">Registered</option>
                    <option value="archived">Archived</option>
                </select>
                <div class="table-responsive">
                    <table class="table" id="usersTable">
                    </table>
                </div>
            </div>

            <div id="details" hidden class="card-block">
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Name: <span name="name" class="sInfo edtInfo" id="name"></span></p>
                            <p>ID Number: <span name="idnum" class="sInfo edtInfo" id="id_num"></span></p>
                            <p>User Type: <span name="usertype" class="sInfo edtInfo" id="user_type"></span></p>
                            <p>Course: <span name="course" class="sInfo edtInfo" id="course"></span></p>
                            <p>Year: <span class="sInfo edtInfo" name="year" id="year"></span></p>
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
<!-- End PAge Content -->
<!-- ============================================================== -->