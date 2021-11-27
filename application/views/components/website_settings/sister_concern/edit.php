
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Sister Concern</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>  
                <form action="<?php echo get_url("sister_concern/sister_concern/edit_process"."/".$sister[0]->id); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="col-md-2">
                        <img src="<?php echo site_url($sister ? $sister[0]->path : '')?>" style="width:100%; margin-top: 4px;" alt="">
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title  <span class="req">*</span> </label>
                            <div class="col-md-7">
                                <input type="text" name="title" value="<?php echo $sister[0]->title; ?>" placeholder="Enter Title..." class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label"> URL <span class="req">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="url" value="<?php echo $sister[0]->url; ?>" placeholder="Enter url: https://www.google.com..." class="form-control" required>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label class="col-md-2 control-label">Photos <span class="req">&nbsp;</span></label>
                            <div class="col-md-7">
                                <input type="hidden" name="old_img" value="<?php echo isset($service[0]->path) ? $service[0]->path : ''; ?>" >
                                <input type="file" name="img" class="form-control" >
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-9">
                                <div class="pull-right">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    tinymce.init({ selector: '#mytextarea' });

    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

    $(document).ready(function(){
        $('select').on('change', function() {
            $.ajax({
            url  : '<?php echo site_url('client/commitment/customer'); ?>',
            type : 'POST',
            data : {
                key: this.value
            },
            dataType: 'json',
            success: function(data) {
                $("#mobile").val(data.mobile);
                $("#address").val(data.address);
                $("#partyCode").val(data.code);
            }
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>