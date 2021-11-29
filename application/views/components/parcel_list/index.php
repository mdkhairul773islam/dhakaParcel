<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Parcels List</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="parcelList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice</th>
                                <th>Customer Name</th>
                                <th>Customer Contact</th>
                                <th>Customer Address</th>
                                <th>Districk</th>
                                <th>Area</th>
                                <th>Total Charge</th>
                                <th>Status</th>
                                <th class="text-center none">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>D-120</td>
                                <td>Amin</td>
                                <td>Shami@gmail.com</td>
                                <td>Imtiaz</td>
                                <td>Abdullah</td>
                                <td>Dhaka</td>
                                <td>Dhaka</td>
                                <td style="width: 120px;">
                                    <a href="#" class="text-success">
                                        <b>Active/Inactive</b>
                                    </a>
                                </td>
                                <td class="text-center none">
                                    <a href="#" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></a>
                                    <?php
                                        if($action_menus){
                                        foreach($action_menus as $action_menu){
                                            if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                            // -----------------------------------------------------------
                                            if(strtolower($action_menu->name) == "delete" ){?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        onclick="return confirm('Are your sure to proccess this action ?')"
                                        href="<?php echo get_url($action_menu->controller_path."/"); ?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        href="<?php echo get_url($action_menu->controller_path."/") ;?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <!---------------------------------------->
                                    <?php }}}} ?>
                                </td>
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
    $('#parcelList').DataTable();
});
</script>