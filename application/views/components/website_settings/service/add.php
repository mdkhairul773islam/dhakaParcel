<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Service</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("service/service/add_process"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Title  <span class="req">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" name="title" placeholder="Enter Title..." class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Photos <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="file" name="img" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"> Description <span class="req">*</span></label>
                        <div class="col-md-7">
                            <textarea  name="description" rows="15"  placeholder="Enter Description..." class="form-control" ></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="pull-right">
                                <input type="submit" value="Save" class="btn btn-primary">
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

<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

    $(document).ready(function(){
        $('select').on('change', function() {
            $.ajax({
            url: '<?php echo site_url('client/commitment/customer'); ?>',
            type: 'POST',
            data: {
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
