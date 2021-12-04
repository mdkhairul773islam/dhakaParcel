<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Warehouse</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo site_url('team/warehouseUser/update/'.$info->id); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" value="<?php echo $info->name; ?>" placeholder="Warehouse Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address <span class="req">*</span></label>
                                <input type="text" name="address" value="<?php echo $info->address; ?>" placeholder="Warehouse Address" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Warehouse <span class="req">*</span></label>
                                <select name="warehouse_code" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Warehouse</option>
                                    <?php if(!empty($warehouseList)){
                                        foreach($warehouseList AS $item){?>
                                            <option value="<?php echo $item->code; ?>" <?php echo ($info->branch == $item->code ? 'selected' : ''); ?>><?php echo $item->name .' - '. filter($item->type); ?></option>
                                        <?php }
                                    }?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="req">*</span></label>
                                <input type="text" name="mobile" value="<?php echo $info->mobile; ?>" placeholder="Warehouse Contact Number"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" value="<?php echo $info->email; ?>" placeholder="Email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Username <span class="req">*</span></label>
                                <input type="text" name="username" value="<?php echo $info->username; ?>" placeholder="Password" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Password </label>
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Status <span class="req">*</span></label>
                                <select name="status" class="form-control" data-live-search="true" required>
                                    <option value="active" <?php echo ($info->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                    <option value="inactive" <?php echo ($info->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Image <span class="req"></span></label>
                                <input type="file" name="image" placeholder="Image" class="form-control">
                                <input type="hidden" name="old_image" value="<?php echo $info->image; ?>">
                            </div>
                        </div>


                        <?php if(!empty($info->image)) { ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="<?php echo site_url($info->image); ?>" alt="" style="width: 80px; height: 80px;">
                            </div>
                        </div>
                        <?php } ?>
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