<style>
    .action_td {
        vertical-align: middle !important;
        padding: 2px 8px !important;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Customer</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search[subscriber_id]" placeholder="ID Number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search[mobile]" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </div>
                    </div>
                </form>

                <hr style="margin-top: 0;"/>

                <table class="table table-bordered">
                    <tr>
                        <th width="50" class="text-center">SL</th>
                        <th style="width: 140px;">ID Number</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th width="60" class="text-right">Action</th>
                    </tr>
                    <?php if(!empty($subscribers)) foreach($subscribers as $key=>$row){ ?>
                    <tr>
                        <td class="text-center"><?=(++$key)?></td>
                        <td><?= (!empty($user_data->subscriber_id) ? $user_data->subscriber_id: '')?></td>
                        <td><?=($row->name)?></td>
                        <td><?=($row->mobile)?></td>
                        <td><?=($row->email)?></td>
                        <td><?=($row->address)?></td>
                        <td class="text-right action_td" width="120">
                            <?php if($action_menus){
                                foreach($action_menus as $action_menu){
                                if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                if(strtolower($action_menu->name) == "delete" ){?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>" onclick="return confirm('Are your sure to proccess this action ?')"  href="<?php echo get_url($action_menu->controller_path."/".$row->id); ?>"><i class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                <?php }else if(strtolower($action_menu->name) == "deactive") { ?>
                                    <a class="btn btn-<?=($row->status=='deactive'?'success':'danger')?>" onclick="return confirm('Are your sure to proccess this action ?')"  href="<?php echo get_url($action_menu->controller_path."/".$row->id) ;?>" title="<?=($row->status=='deactive'?'Restore':'Deactive')?>"><i class="<?=($row->status=='deactive'?'fa fa-history':'fa fa-minus-circle')?>" aria-hidden="true"></i></a>
                                <?php }}}
                            }?>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
