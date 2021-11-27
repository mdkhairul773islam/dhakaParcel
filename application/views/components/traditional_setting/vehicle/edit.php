<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Vheicle
                    </h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vehicle Name <span class="req">*</span></label>
                                <input type="text" name="name" placeholder="Vehicle Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vehicle Sl No <span class="req">*</span></label>
                                <input type="text" name="vehicle_sl_no" placeholder="Vehicle Sl No" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vehicle No<span class="req">*</span></label>
                                <input type="text" name="vehicle_no" placeholder="Vehicle No" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vehicle Driver Name<span class="req">*</span></label>
                                <input type="text" name="vehicle_driver_name" placeholder="Vehicle Driver Name"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Driver Contact Number<span class="req">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">+88</span>
                                    <input type="text" class="form-control" placeholder="Username"
                                        aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Vehicle Road <span class="req">*</span></label>
                                <input type="text" name="vehicle_road" placeholder="Vehicle Road" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>