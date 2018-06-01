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
                    <option value="pending">Pending</option>
                    <option value="archived">Archived</option>
                </select>
                <div class="table-responsive">
                    <table class="table" id="usersTable">
                    </table>
                </div>
            </div>

            <div id="details" hidden class="card-block">
                <h2><small>User Information</small></h2>
                <hr>
                <form action="Accounts/editUser" method="POST">
                    <div class="form-group">
                        <label for="idnumber">ID Number</label>
                        <input type="text" class="form-control" name="idnum" id="id_num">
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="type">User Type</label>
                        <select class="form-control" id="user_type" name="usertype">
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                            <option value="alumni">Alumni</option>
                        </select>
                    </div>
                    <div id="userDv" class="form-group">
                        <label for="course">Course</label>
                        <input type="text" class="form-control" id="course" name="course">
                    </div>
                    <div id="yearDv" class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <button name='user_id' id="saveBtn" type="submit" class="btn btn-success">Save</button>
                    <button type="button" id="archive" class="btn btn-danger">Archive</button>
                    <button id="detailBack" type="button" class="btn btn-info"
                            onclick="toggleDiv($('#main'),$('#details'))">Back
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->