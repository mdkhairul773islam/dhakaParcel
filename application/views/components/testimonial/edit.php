<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Product</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg();
                    if($testimonial==false){
                ?>
                <div class="alert alert_warning">
                    <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
	                <div class="content">
	                    <div>
	                        <strong>Warning!</strong> <br>
	                    </div>
	                    <div>No Resoult Found !</div>
	                </div>
	            </div>
                <?php return; } ?>
                <?php $id = isset($testimonial[0]->id) ? $testimonial[0]->id : ''; ?>

                <form action="<?php echo get_url("testimonial/testimonial/edit_process/{$testimonial[0]->id}"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <img src="<?php echo site_url($testimonial ? $testimonial[0]->path : '')?>" style="width:100%; margin-top: 4px;" alt="">
                            </div>
                        </div>
                        
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Name <span class="req">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="name" value="<?php echo isset($testimonial[0]->name) ? $testimonial[0]->name : ''; ?>" placeholder="Enter Product Name..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Designation <span class="req">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="designation" value="<?php echo isset($testimonial[0]->designation) ? $testimonial[0]->designation : ''; ?>" placeholder="Enter designation..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Photos</label>
                                    <div class="form-group">
                                        <input type="hidden" name="old_img" value="<?php echo isset($testimonial[0]->path) ? $testimonial[0]->path : ''; ?>" >
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label"> Description <span class="req">*</span></label>
                                    <div class="form-group">
                                        <textarea  name="description" rows="5" placeholder="Enter Description..." class="form-control" ><?php echo isset($testimonial[0]->description) ? $testimonial[0]->description : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
