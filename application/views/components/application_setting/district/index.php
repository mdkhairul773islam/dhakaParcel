<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Districts List</h1>
                </div>
                <a href="<?= get_url('/application_setting/district/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add District
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="districtList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Service Area</th>
                                <th>Home Delivery</th>
                                <th>Lock Down Service</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($districtList)){
                                    foreach($districtList as $key => $row){
                                        $service_area = get_name('service_area', 'name', ['service_area_code'=>$row->service_area_code,'trash'=> 0]);
                            ?>
                            <tr>
                                <td><?= ($key+1); ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $service_area; ?></td>
                                <td><?= $row->home_delivery; ?></td>
                                <td><?= $row->lock_down_service; ?></td>
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
    $('#districtList').DataTable();
});
</script>