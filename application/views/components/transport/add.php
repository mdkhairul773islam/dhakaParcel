<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Transport</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form class="form-horizontal" action="<?php echo get_url("transport/transport/add_process"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Car Number <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="car_number" placeholder="Car Number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Engine No <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="engine_no" placeholder="Engine No" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Chassis No <span class="req">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="chassis_no" placeholder="Chassis No" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Driver Name <span class="req">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="driver_name" placeholder="Driver Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Driver Mobile No <span class="req">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="driver_mobile" placeholder="Driver Mobile No" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8 text-right">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
