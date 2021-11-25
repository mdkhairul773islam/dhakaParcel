<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Road</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form class="form-horizontal" action="<?php echo get_url("road_mapping/road_mapping/add_process"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <label class="control-label">Road Name <span class="req">*</span> </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="road_name" placeholder="Road Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8 text-right">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Road</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Road Name</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>
                    <?php 
                        foreach($rods as $key => $road){
                            
                    ?>
                    <tr>
                        <td width="40"><?= ($key+1); ?></td>
                        <td><?php echo filter($road->road_name); ?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?php echo get_url("road_mapping/road_mapping/edit/$road->id"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("road_mapping/road_mapping/delete/$road->id"); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
