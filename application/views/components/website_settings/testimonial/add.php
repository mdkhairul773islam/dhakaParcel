<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Testimonial</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("testimonial/testimonial/add_process"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">Name <span class="req">*</span> </label>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Designation <span class="req">*</span> </label>
                            <div class="form-group">
                                <input type="text" name="designation" placeholder="Enter Designation" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Photos <span class="req">*</span></label>
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label"> Description <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea  name="description" rows="5"  placeholder="Enter Description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>




</div>
