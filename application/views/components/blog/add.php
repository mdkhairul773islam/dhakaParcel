<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Blog</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("blog/blog/add_process"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Date  <span class="req">*</span></label>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" name="date" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="<?= date('Y-m-d'); ?>">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Title  <span class="req">*</span> </label>
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Enter Title..." class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Photo <span class="req">*</span></label>
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Description <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea  name="description" rows="15"  placeholder="Enter Description..." class="form-control" id="mytextarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
