<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Add Aside Dropdown</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="<?php echo site_url('system_aside_menu/DropdownMenuController/store'); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select name="parent_id" class="form-control" required>
                                            <option selected value=''>Select Menu *</option>
                                            <?php if($aside_menu_data){ foreach($aside_menu_data as $key => $value){ ?>
                                            <option value='<?php echo $value->id; ?>'><?php echo $value->name; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Menu's Dropdown Name *" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="selector" placeholder="Class name without dot, (example: category_list) *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="controller_path" placeholder="Controller path *" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input list="fa_icons" name="icon" placeholder="Menu Icon *" class="form-control" required>
                                        <datalist id="fa_icons">
                                            <?php foreach(config_item("font_awesome_icon") as $key => $value){ ?>
                                                <option value="<?php echo $value; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-primary">
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
