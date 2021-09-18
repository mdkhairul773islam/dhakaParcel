<style>
    ul li a span.icon {
        margin-right: 10px;
        float: right;
    }
    .aside-head {
        position: fixed;
        z-index: 2;
        width: 150px;
    }
    .sidebar-brand {
        position: fixed;
        width: 250px;
        z-index: 2;
    }
    .sidebar-brand.sidebar-slide {
        transition: all 0.4s ease-in-out;
        transform: translateX(-100%);
    }
    .aside-nav {
        margin-top: 65px;
        z-index: -3;
    }
    .sidebar-nav > .sidebar-brand {
        text-align: left;
        padding: 0 10px;
    }
    @media screen and (max-width: 768px){
        .sidebar-brand {
            transform: translateX(-100%);
            transition: all 0.4s ease-in-out;
        }
        .sidebar-brand.sidebar-slide{
            transform: translateX(0%);
            transition: all 0.4s ease-in-out;
        }
    }
</style>

<!-- don't delete this -->
<aside id="sidebar-wrapper">
    <div class="sidebar-nav">
        <h3 class="sidebar-brand <?php if($this->data['width'] == 'full-width') {echo 'sidebar-slide';} ?>">
			<a style="font-size: 23px !important;" href="<?php echo site_url('admin'); ?>">Dhaka Courier Ltd</a>
		</h3>
    </div>
    <nav class="aside-nav">
        <ul class="sidebar-nav">
            <li id="dashboard">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-home"></i> &nbsp; Dashboard
                </a>
            </li>
            <?php $user_data = $this->session->userdata(); ?>

            <?php if($user_data['privilege']=='president'){ ?>
            <li class="developer aside_menu">
                <a href="javascript:void(0)" data-toggle="collapse">
                    <i class="fa fa-list-alt"></i>
                    &nbsp; Aside Menu
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul class="sidebar-nav collapse">
                    <li class="create">
                        <a href="<?php echo site_url('system_aside_menu/menuController/add');?>">
                            <i class="fa fa-angle-right"></i>
                            Create
                        </a>
                    </li>

                    <li class="list">
                        <a href="<?php echo site_url('system_aside_menu/menuController');?>">
                            <i class="fa fa-angle-right"></i>
                            List
                        </a>
                    </li>

                    <li class="trash_list">
                        <a href="<?php echo site_url('system_aside_menu/menuController/trash_list');?>">
                            <i class="fa fa-angle-right"></i>
                            Trash List
                        </a>
                    </li>

                    <li class="alignment">
                        <a href="<?php echo site_url('system_aside_menu/menuController/alignment');?>">
                            <i class="fa fa-angle-right"></i>
                            Alignment
                        </a>
                    </li>
                </ul>
            </li>


            <li class="developer aside_dropdown">
                <a href="javascript:void(0)">
                    <i class="fa fa-list-alt"></i>
                    &nbsp; Dropdown Menu
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul class="sidebar-nav collapse">
                    <li class="create">
                        <a href="<?php echo site_url('system_aside_menu/dropdownMenuController/add');?>">
                            <i class="fa fa-angle-right"></i>
                            Create
                        </a>
                    </li>

                    <li class="list">
                        <a href="<?php echo site_url('system_aside_menu/dropdownMenuController');?>">
                            <i class="fa fa-angle-right"></i>
                            List
                        </a>
                    </li>

                    <li class="alignment">
                        <a href="<?php echo site_url('system_aside_menu/dropdownMenuController/alignment');?>">
                            <i class="fa fa-angle-right"></i>
                            Alignment
                        </a>
                    </li>

                    <li class="trash_list">
                        <a href="<?php echo site_url('system_aside_menu/dropdownMenuController/trash_list');?>">
                            <i class="fa fa-angle-right"></i>
                            Trash List
                        </a>
                    </li>
                </ul>
            </li>


            <li class="developer aside_action_menu">
                <a href="javascript:void(0)">
                    <i class="fa fa-list-alt"></i>
                    &nbsp; Action Menu
                    <span class="icon"><i class="fa fa-sort-desc"></i></span>
                </a>

                <ul class="sidebar-nav collapse">
                    <li class="create">
                        <a href="<?php echo site_url('system_aside_menu/actionMenuController/add');?>">
                            <i class="fa fa-angle-right"></i>
                            Create
                        </a>
                    </li>

                    <li class="list">
                        <a href="<?php echo site_url('system_aside_menu/actionMenuController');?>">
                            <i class="fa fa-angle-right"></i>
                            List
                        </a>
                    </li>

                    <li class="trash_list">
                        <a href="<?php echo site_url('system_aside_menu/actionMenuController/trash_list');?>">
                            <i class="fa fa-angle-right"></i>
                            Trash List
                        </a>
                    </li>

                    <li class="alignment">
                        <a href="<?php echo site_url('system_aside_menu/actionMenuController/alignment');?>">
                            <i class="fa fa-angle-right"></i>
                            Alignment
                        </a>
                    </li>
                </ul>
            </li>

            <li class="developer privilege">
                <a href="<?php echo site_url('system_privilege/privilegeController'); ?>">
                    <i class="fa fa-users"></i>
                    &nbsp; Privilege
                </a>
            </li>
            <?php } ?>

            <?php
                if(isset($_GET["system_id"])){
                    $system_id = base64_decode($_GET["system_id"]);
                    $system_id = explode('_',$system_id);
                    $aside_menu_id          = $system_id[0];
                    $aside_menu_dropdown_id = isset($system_id[1]) ? $system_id[1] : '';
                }else{
                    $aside_menu_id          = '';
                    $aside_menu_dropdown_id = '';
                }
            ?>

            <!--read menu from database start-->
            <?php
                $menu = read('system_aside_menus', ['status'=>1], 'position ASC');
                if($menu){ foreach($menu as $menu_key => $menu_value){
                    if($user_data['privilege']=='president' xor (!empty($aside_menu_array) && in_array($menu_value->id,$aside_menu_array) && $user_data['privilege']!=='president')){
                    // ---------------------------------------------------------------------
            ?>
            <li class="<?php echo (!empty($aside_menu_id) && $menu_value->id==$aside_menu_id) ? "active" : ''; ?>">
                <a href="<?php echo ($menu_value->has_sub_menu==1) ? "javascript:void(0)" : site_url($menu_value->controller_path).'?system_id='.base64_encode($menu_value->id); ?>">

                    <?php echo (!empty($menu_value->icon)) ? '<i class="'.$menu_value->icon.'"></i>' : ''; ?>

                    &nbsp; <?php echo (!empty($menu_value->name)) ? $menu_value->name : ''; ?>

                    <?php if($menu_value->has_sub_menu==1){ ?>
                        <span class="icon"><i class="fa fa-sort-desc"></i></span>
                    <?php } ?>
                </a>

                <!--dropdown menu start -->
                <?php
                    if($menu_value->has_sub_menu==1){
                        // read dropdown from database
                        $aside_dropdown = read('system_aside_menu_dropdowns', ['parent_id'=>$menu_value->id, 'status'=>1], 'position ASC');
                        if($aside_dropdown){
                ?>
                <ul class="sidebar-nav collapse">
                    <?php
                        foreach($aside_dropdown as $aside_dropdown_key => $aside_dropdown_value){
                            if($user_data['privilege']=='president' xor (!empty($aside_dropdown_menu_array) && in_array($aside_dropdown_value->id,$aside_dropdown_menu_array) && $user_data['privilege']!=='president')){
                        // ------------------------------------------------------------------------------
                    ?>
                    <li class="<?php echo (!empty($aside_menu_dropdown_id) && $aside_dropdown_value->id==$aside_menu_dropdown_id) ? "active" : ''; ?>">
                        <a href="<?php echo ($aside_dropdown_value->controller_path) ? site_url().$aside_dropdown_value->controller_path.'?system_id='.base64_encode($menu_value->id."_".$aside_dropdown_value->id) : '';?>">
                            <i class="<?php echo ($aside_dropdown_value->icon) ? $aside_dropdown_value->icon : ''; ?>"></i>
                            <?php echo (!empty($aside_dropdown_value->name)) ? $aside_dropdown_value->name : ''; ?>
                        </a>
                    </li>
                    <?php }} ?>
                </ul>
                <?php }} ?>
                <!--dropdown menu end -->
            </li>
            <?php }}} ?>
            <!--read menu from database end-->

            <br>
            <br>
            <br>
            <br>
        </ul>
    </nav>
</aside>
<!-- /don't delete this -->


<script>
    var sidebar_nav = document.querySelectorAll(".sidebar-nav>li>a");

    if(sidebar_nav){
        window.onload = ()=>{
            var activated_dropdown = document.querySelector(".sidebar-nav>li.active>ul.collapse")
            if(activated_dropdown){
                activated_dropdown.style.cssText = `height:${activated_dropdown.scrollHeight}px`;
            }
        }

        sidebar_nav.forEach((value, index)=>{
            value.addEventListener('click', (event)=>{
                if(event.target.closest('li').classList.contains('active')){
                    event.target.closest('li').classList.remove('active');
                    if(event.target.nextElementSibling){
                        event.target.nextElementSibling.style.cssText = ``;
                    }
                }else{
                    sidebar_nav.forEach((value1)=>{
                        value1.parentElement.classList.remove('active');
                        value1.parentElement.lastElementChild.style.cssText = ``;
                    });

                    event.target.closest('li').classList.add('active')

                    if(event.target.nextElementSibling){
                        event.target.nextElementSibling.style.cssText = `height:${event.target.nextElementSibling.scrollHeight}px`;
                    }
                }
            });
        });
    }
</script>
