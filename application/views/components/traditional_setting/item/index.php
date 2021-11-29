<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Item List</h1>
                </div>
                <a href="<?= get_url('/traditionalSetting/item/add'); ?>" class="pull-right btn btn-success m-0"
                    style="font-size: 12px;">
                    <i class="fa fa-pencil "></i>
                    Add Item
                </a>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="itemList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Item Name</th>
                                <th>Item Category</th>
                                <th>Unit</th>
                                <th>OD Rate</th>
                                <th>HD Rate</th>
                                <th>Transit OD</th>
                                <th>Transit HD</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(!empty($itemList)){
                                    foreach($itemList as $key =>$row){
                                        $item_category = get_row('item_category', ['category_code'=> $row->item_category_name], 'category_name');
                            ?>
                            <tr>
                                <td><?= ($key+1); ?></td>
                                <td><?= $row->item_name; ?></td>
                                <td><?= (!empty($item_category->category_name) ? $item_category->category_name : ''); ?>
                                </td>
                                <td><?= $row->unit; ?></td>
                                <td><?= $row->od_rate; ?></td>
                                <td><?= $row->hd_rate; ?></td>
                                <td><?= $row->transit_od; ?></td>
                                <td><?= $row->transit_hd; ?></td>
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
                            <?php } } ?>
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
    $('#itemList').DataTable();
});
</script>