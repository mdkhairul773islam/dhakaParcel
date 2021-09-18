<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Payment Method</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <input type="text" name="method" class="form-control" placeholder="Method">
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="text" name="number" class="form-control" placeholder="Number">
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="text" name="type" class="form-control" placeholder="Type">
                        </div>
                        <div class="col-md-2 form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </div>
                </form>
                <?php msg(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Photo</th>
                        <th>Payment Method</th>
                        <th>Number</th>
                        <th>Type</th>
                        <th width="120" class="none text-right">Action</th>
                    </tr>
                    <?php if(!empty($methods)) foreach($methods as $key=>$row){ ?>
                    <tr>
                        <td><?=(++$key)?></td>
                        <td><img src="<?=site_url($row->img)?>" height="25" alt=""></td>
                        <td><?=($row->method)?></td>
                        <td><?=($row->number)?></td>
                        <td><?=($row->type)?></td>
                        <td class="none text-right">
                            <?php
                                if($action_menus){
                                    foreach($action_menus as $action_menu){
                                        if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                        // -----------------------------------------------------------
                                        if(strtolower($action_menu->name) == "delete" ){?>
                                            <a class="btn btn-<?php echo $action_menu->type;?>" onclick="return confirm('Are your sure to proccess this action ?')"  href="<?php echo get_url($action_menu->controller_path."/".$row->id); ?>"><i class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                        <?php }else{ ?>
                                            <a class="btn btn-<?php echo $action_menu->type;?>"  href="<?php echo get_url($action_menu->controller_path."/".$row->id) ;?>"><i class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                        <!---------------------------------------->
                            <?php }}}} ?>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
