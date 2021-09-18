<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Service</h1>
                </div>
            </div>
            <div class="panel-body">
                <?=msg()?>
                <?php $id = isset($service[0]->id) ? $service[0]->id : ''; ?>
                <form action="<?php echo get_url("service/service/edit_process/{$service[0]->id}"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo site_url($service ? $service[0]->path : '')?>" style="width:100%; margin-top: 4px;" alt="">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Title <span class="req">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="title" value="<?php echo isset($service[0]->title) ? $service[0]->title : ''; ?>" placeholder="Enter Blog title..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Photos</label>
                                    <div class="form-group">
                                        <input type="hidden" name="old_img" value="<?php echo isset($service[0]->path) ? $service[0]->path : ''; ?>" >
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label"> Description <span class="req">*</span></label>
                                    <div class="form-group">
                                        <textarea  name="description" rows="15" placeholder="Enter Description..." class="form-control"><?php echo isset($service[0]->description) ? $service[0]->description : ''; ?></textarea>
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
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</div>
