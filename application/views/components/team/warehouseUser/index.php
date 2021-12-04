<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Warehouse Users List</h1>
                </div>
                <a href="<?= get_url('/team/warehouseUser/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add Warehouse Users
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="branchList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Warehouse</th>
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($results)){
                                foreach($results AS $key => $row){?>
                                <tr>
                                    <td><?php echo ++$key; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td>
                                        <img src="<?php echo site_url($row->image); ?>" style="width: 80px; height: 80px;" alt="">
                                    </td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo get_name('warehouse', 'name', ['code' => $row->branch]); ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo filter($row->status); ?></td>
                                    <td class="text-center">
                                        <?php
                                            if($action_menus){
                                            foreach($action_menus as $action_menu){
                                                if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                                // -----------------------------------------------------------
                                                if(strtolower($action_menu->name) == "delete" ){ ?>
                                        <a class="btn btn-<?php echo $action_menu->type;?>"
                                            onclick="return confirm('Are your sure to proccess this action ?')"
                                            href="<?php echo get_url($action_menu->controller_path."/".$row->id); ?>"><i
                                                class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                        <?php }else{ ?>
                                        <a class="btn btn-<?php echo $action_menu->type;?>"
                                            href="<?php echo get_url($action_menu->controller_path."/".$row->id) ;?>"><i
                                                class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                        <!---------------------------------------->
                                        <?php }}}} ?>
                                    </td>
                                </tr>
                            <?php } 
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#branchList').DataTable();
});
</script>