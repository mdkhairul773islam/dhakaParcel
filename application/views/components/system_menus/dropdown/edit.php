<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Edit Aside Dropdown</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="<?php echo site_url("system_aside_menu/DropdownMenuController/edit_process/".$menu_dropdowns[0]->id); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select name="parent_id" class="form-control" required>
                                            <option selected value=''>-Select Menu *-</option>
                                            <?php if($aside_menu_data){ foreach($aside_menu_data as $key => $value){ ?>
                                            <option <?php echo ($menu_dropdowns[0]->parent_id==$value->id) ? 'selected' : ''; ?> value='<?php echo $value->id; ?>'><?php echo $value->name; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" value="<?php echo $menu_dropdowns[0]->name; ?>" placeholder="Menu's Dropdown Name *" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="selector" value="<?php echo $menu_dropdowns[0]->selector; ?>" placeholder="Menu's Dropdown Selector *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="controller_path" value="<?php echo $menu_dropdowns[0]->controller_path; ?>" placeholder="Controller path *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input list="fa_icons" name="icon" placeholder="Menu Icon *" value="<?php echo $menu_dropdowns[0]->icon; ?>" class="form-control" required>
                                        <datalist id="fa_icons">
                                            <?php foreach(config_item("font_awesome_icon") as $key => $value){ ?>
                                                <option value="<?php echo $value; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary">
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
