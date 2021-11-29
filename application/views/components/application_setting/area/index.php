<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Areas List</h1>
                </div>
                <a href="<?= get_url('/application_setting/area/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add Area
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="areaList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Area</th>
                                <th>Post Code</th>
                                <th>Thana/Upazila</th>
                                <th>District</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($areaList)){
                                    foreach($areaList as $key => $area){
                                        $district = get_name('districts', 'name', ['id'=> $area->district_id]);
                                        $thanaUpazila = get_name('upazilas', 'name', ['id'=> $area->upazila_id]);
                            ?>
                            <tr>
                                <td><?= ($key+1); ?></td>
                                <td><?= $area->name; ?></td>
                                <td><?= $area->post_code; ?></td>
                                <td><?= $thanaUpazila?></td>
                                <td><?= $district?></td>
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
                                        href="<?php echo get_url($action_menu->controller_path."/".$area->id); ?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        href="<?php echo get_url($action_menu->controller_path."/".$area->id) ;?>"><i
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
    $('#areaList').DataTable();
});
</script>