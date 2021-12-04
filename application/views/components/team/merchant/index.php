<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Merchants List</h1>
                </div>
                <a href="<?= get_url('/team/merchant/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i> Add Merchants
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
                                <th>Company Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>COD</th>
                                <th>Area</th>
                                <th>Upazila</th>
                                <th>Distric</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($merchantList)){
                                    foreach($merchantList as $key => $row){
                                        $branch = get_name('branch', 'name', ['code'=> $row->branch, 'trash'=> 0]);
                                        $area   = get_name('area', 'name', ['id'=> $row->area_id, 'trash'=> 0]);
                                        $upazila = get_name('upazilas', 'name', ['id'=> $row->upazila_id, 'trash'=> 0]);
                                        $district = get_name('districts', 'name', ['id'=> $row->district_id, 'trash'=> 0]);
                                        
                            ?>
                            <tr>
                                <td><?= ($key+1); ?></td>
                                <td><?= $row->merchant_code; ?></td>
                                <td><?= $row->company_name; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $branch; ?></td>
                                <td><?= number_format($row->cod); ?>%</td>
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
                                        href="<?php echo get_url($action_menu->controller_path."/".$row->users_id); ?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        href="<?php echo get_url($action_menu->controller_path."/".$row->users_id) ;?>"><i
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