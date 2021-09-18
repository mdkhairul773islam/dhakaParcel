<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Edit Menu</h1>
                </div>
            </div>
            <?php
                $menu_item = $this->data['menu_item'][0];
            ?>
            <div class="panel-body">
                <form action="<?php echo site_url("system_aside_menu/MenuController/edit_process/$menu_item->id"); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Menu Name" value="<?php echo $menu_item->name;?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="selector" placeholder="Menu Selector" value="<?php echo $menu_item->selector;?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="controller_path" placeholder="Controller path Controller path (optional)" <?php echo (empty($menu_item->controller_path) ? "disable='true' readonly='true' ":"");?> value="<?php echo $menu_item->controller_path;?>" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input list="fa_icons" name="icon" placeholder="Menu Icon *" value="<?php echo $menu_item->icon;?>" class="form-control" required>
                                        <datalist id="fa_icons">
                                            <?php foreach(config_item("font_awesome_icon") as $key => $value){ ?>
                                                <option value="<?php echo $value; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-control">
                                            <input type="checkbox" name="has_sub_menu" value="1"  <?php echo ($menu_item->has_sub_menu == '1' ? "checked" : ""); ?> >&nbsp; This Menu Has Sub Menu ?
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-control">
                                            <input type="checkbox" name="has_action_menu" value="1" <?php echo ($menu_item->has_action_menu == '1' ? "checked" : ""); ?> >&nbsp; This Menu Has Action Menu ?
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary pull-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    var has_sub_menu = document.querySelector("input[name=has_sub_menu]");
    var controller_path = document.querySelector("input[name=controller_path]");
    has_sub_menu.onclick=()=>{
        if(has_sub_menu.checked == false){
            controller_path.removeAttribute("disable");
            controller_path.removeAttribute("readonly");
        }else{
            controller_path.value="";
            controller_path.setAttribute("disable","true");
            controller_path.setAttribute("readonly","true");
        }
    }
</script>
