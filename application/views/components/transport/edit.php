<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Transport</h1>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo site_url('/transport/transport/edit_process/').$transport->id; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Car Number <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="car_number" value="<?= $transport->car_number; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Engine No <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="engine_no" value="<?= $transport->engine_no; ?>" placeholder="Engine No" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Chassis No <span class="req">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="chassis_no" value="<?= $transport->chassis_no; ?>"  class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Driver Name <span class="req">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="driver_name" value="<?= $transport->driver_name; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Driver Mobile No </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="driver_mobile" value="<?= $transport->driver_mobile; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 text-right">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
