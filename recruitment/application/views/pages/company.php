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
<div id="addCompany" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="POST">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                        </div>
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>