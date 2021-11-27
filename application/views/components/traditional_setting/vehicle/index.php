<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Vehicles</h1>
                </div>
                <a href="<?= get_url('/traditionalSetting/vehicle/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add Vehicle
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="vehiclesList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Vehicle Name</th>
                                <th>Vehicle Sl No</th>
                                <th>Vehicle No</th>
                                <th>Vehicle Driver Name</th>
                                <th>Vehicle Driver Phone</th>
                                <th>Vehicle Root</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($vehicleList)){
                                    foreach($vehicleList as $key => $row){
                            ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= ucfirst($row->vehicle_name); ?></td>
                                <td><?= ucfirst($row->vehicle_sl_no); ?></td>
                                <td><?= ucfirst($row->vehicle_no); ?></td>
                                <td><?= ucfirst($row->driver_name); ?></td>
                                <td><?= ucfirst($row->driver_contact_number); ?></td>
                                <td><?= ucfirst($row->vehicle_road); ?></td>
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
                                <?php } } ?>
                            </tr>
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
    $('#vehiclesList').DataTable();
});
</script>