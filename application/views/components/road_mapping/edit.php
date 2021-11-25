<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Road</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form class="form-horizontal" action="<?php echo get_url("road_mapping/road_mapping/edit_process/$rods->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Road Name <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="road_name" value="<?= $rods->road_name; ?>"  class="form-control" required>
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
