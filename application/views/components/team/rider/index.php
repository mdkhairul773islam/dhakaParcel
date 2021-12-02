<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Riders List</h1>
                </div>
                <a href="<?= get_url('/team/rider/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add Rider
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="branchList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>Area</th>
                                <th>Upazila</th>
                                <th>District</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($riderList)){
                                    foreach($riderList as $key => $rider){
                                        $branch = get_row('branch', ['code'=>$rider->branch, 'trash'=>0]);
                                        $upazila = get_name('upazilas', 'name', ['id'=>$branch->upazila_id, 'trash'=>0]);
                                        $district = get_name('districts', 'name', ['id'=>$branch->district_id, 'trash'=>0]);
                                        $area = get_name('area', 'name', ['id'=>$branch->area_id, 'trash'=>0]);
                            ?>
                            <tr>
                                <td><?= ($key+1); ?></td>
                                <td><?= $rider->rider_code; ?></td>
                                <td><?= $rider->name; ?></td>
                                <td><?= $rider->username; ?></td>
                                <td><?= $rider->email; ?></td>
                                <td><?= $branch->name; ?></td>
                                <td><?= $area; ?></td>
                                <td><?= $upazila; ?></td>
                                <td><?= $district; ?></td>
                                <td>
                                    <a href="#" class="text-success">
                                        <b>Active/Inactive</b>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if($action_menus){
                                        foreach($action_menus as $action_menu){
                                            if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                            // -----------------------------------------------------------
                                            if(strtolower($action_menu->name) == "delete" ){?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        onclick="return confirm('Are your sure to proccess this action ?')"
                                        href="<?php echo get_url($action_menu->controller_path."/".$rider->id); ?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        href="<?php echo get_url($action_menu->controller_path."/".$rider->id) ;?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <!---------------------------------------->
                                    <?php }}}} ?>
                                </td>
                            </tr>
                            <?php }} ?>
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