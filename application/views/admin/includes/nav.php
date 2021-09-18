<?php
    if(isset($_GET["system_id"])){
        $system_id = base64_decode($_GET["system_id"]);
        $system_id = explode('_',$system_id);
        $aside_menu_id          = $system_id[0];
        $aside_menu_dropdown_id = isset($system_id[1]) ? $system_id[1] : '';
    ?>
    <div class="container-fluid none" style="margin-bottom: 10px;">
        <div class="row">
            <?php
                $dropdown_menus = read('system_aside_menu_dropdowns',['status'=>1, 'parent_id'=>$aside_menu_id], 'position ASC');
                if($dropdown_menus){
                    foreach($dropdown_menus as $nav_menus){
                        if($user_data['privilege']=='president' xor (!empty($aside_dropdown_menu_array) && in_array($nav_menus->id,$aside_dropdown_menu_array) && $user_data['privilege']!=='president')){
                    ?>
                    <a href="<?php echo site_url($nav_menus->controller_path."?system_id=".base64_encode($nav_menus->parent_id."_".$nav_menus->id)); ?>" class="btn btn-default <?php echo ($nav_menus->id==$aside_menu_dropdown_id) ? "active" : '';?>">
                		<?php echo $nav_menus->name;?>
            		</a>
            <?php }}} ?>
        </div>
    </div>
<?php } ?>
