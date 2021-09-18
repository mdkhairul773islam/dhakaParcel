<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add footer</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="<?php echo get_url("setting/setting/add_footer"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Location</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->location) ? $footer[0]->location : ''; ?>" name="location" placeholder="Enter location..." class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->email) ? $footer[0]->email : ''; ?>" name="email" placeholder="Enter email..." class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->phone) ? $footer[0]->phone : ''; ?>" name="phone" placeholder="Enter phone..." class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Facebook Link</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->fb_link) ? $footer[0]->fb_link : ''; ?>" name="fb_link" placeholder="Enter fb link..." class="form-control">
                        </div>
                    </div>
                    
                    <?php /* <div class="form-group">
                        <label class="col-md-2 control-label">Google Link</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->g_link) ? $footer[0]->g_link : ''; ?>" name="g_link" placeholder="Enter g_link..." class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Instagram Link</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->in_link) ? $footer[0]->in_link : ''; ?>" name="in_link" placeholder="Enter in_link..." class="form-control">
                        </div>
                    </div>*/ ?>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Twitter Link</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->tw_link) ? $footer[0]->tw_link : ''; ?>" name="tw_link" placeholder="Enter Twitter link..." class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Youtube Link</label>
                        <div class="col-md-5">
                            <input type="text" value="<?php echo isset($footer[0]->youtube) ? $footer[0]->youtube : ''; ?>" name="youtube" placeholder="Enter youtube link..." class="form-control">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-7">
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
</div>



<?php /*<div class="panel panel-default">
    <div class="panel-heading panal-header">
        <div class="panal-header-title pull-left">
            <h1>All Footer</h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <th width="50">SL</th>
                <th>Location</th>
                <th>Email</th>
                <th>phone</th>
                <th>FB Link</th>
                <th>Google Link</th>
                <th>Instagram Link</th>
                <th>Twitter</th>
            </tr>
           
            <?php if($footer != null){ foreach($footer as $key => $value){ ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo isset($value->location) ? $value->location : ''; ?></td>
                <td><?php echo isset($value->email) ? $value->email : ''; ?></td>
                <td><?php echo isset($value->phone) ? $value->phone : ''; ?></td>
                <td><?php echo isset($value->fb_link) ? $value->fb_link : ''; ?></td>
                <td><?php echo isset($value->g_link) ? $value->g_link : ''; ?></td>
                <td><?php echo isset($value->in_link) ? $value->in_link : ''; ?></td>
                <td><?php echo isset($value->tw_link) ? $value->tw_link : ''; ?></td>
            </tr>
            <?php }}else{ echo "<h2 class='text-center'>no data</h2>";} ?>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>*/ ?>