<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Blog</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php  msg();
                    if($blog==false){
                ?>
                <div class="alert alert_warning">
                    <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
	                <div class="content">
	                    <div>
	                        <strong>Warning!</strong>
	                    </div>
	                    <div>No Resoult Found !</div>
	                </div>
	            </div>
                <?php return; } ?>

                <?php $id = isset($blog[0]->id) ? $blog[0]->id : ''; ?>
                <form action="<?php echo get_url("blog/blog/edit_process/{$blog[0]->id}"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo site_url($blog ? $blog[0]->path : '')?>" style="width:100%; margin-top: 4px;" alt="">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Date <span class="req">*</span></label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker">
                                            <input type="text" name="date" class="form-control" value="<?php echo $blog[0]->date; ?>" placeholder="YYYY-MM-DD" required>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Title <span class="req">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" value="<?php echo isset($blog[0]->title) ? $blog[0]->title : ''; ?>" placeholder="Enter Blog title..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Photo</label>
                                    <div class="form-group">
                                        <input type="hidden" name="old_img" value="<?php echo isset($blog[0]->path) ? $blog[0]->path : ''; ?>" >
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Description <span class="req">*</span></label>
                                    <div class="form-group">
                                        <textarea  name="description" rows="15" placeholder="Enter Description..." class="form-control"><?php echo isset($blog[0]->description) ? $blog[0]->description : ''; ?></textarea>
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
    <script>
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        });

        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</div>
