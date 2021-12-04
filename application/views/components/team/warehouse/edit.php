<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Rider</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo site_url('team/warehouse/update/'. $info->id); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Warehouse Name <span class="req">*</span></label>
                                <input type="text" name="name" value="<?php echo $info->name; ?>" placeholder="Warehouse Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Warehouse Type <span class="req">*</span></label>
                                <select name="type" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="division" <?php echo ($info->type == 'division' ? 'selected' : ''); ?>>Division</option>
                                    <option value="district" <?php echo ($info->type == 'district' ? 'selected' : ''); ?>>District</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Update" name="update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>