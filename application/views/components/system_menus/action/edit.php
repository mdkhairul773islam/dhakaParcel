<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Edit Action Menu</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="<?php echo site_url("system_aside_menu/actionMenuController/edit_process/$action_menu_item->id"); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select id="parent_menu" name="parent_id" class="form-control">
                                            <option selected="true" disable="true">Select Parent Menu</option>
                                            <?php foreach($parent_menus as $row){ ?>
                                            <option value="<?php echo $row->id;?>" <?php echo ($action_menu_item->parent_id==$row->id ?"selected":"");?> ><?php echo $row->name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select id="dropdown_menu" name="dropdown_id" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Action Menu Name *" value="<?php echo $action_menu_item->name; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select  name="type" class="form-control" required>
                                            <option value="">-Select Option's Type- *</option>
                                            <option value="success" <?php echo ($action_menu_item->type=="success"?"selected":"");?>>Success</option>
                                            <option value="info" <?php echo ($action_menu_item->type=="info"?"selected":"");?>>Info</option>
                                            <option value="warning" <?php echo ($action_menu_item->type=="warning"?"selected":"");?>>Warning</option>
                                            <option value="danger" <?php echo ($action_menu_item->type=="danger"?"selected":"");?>>Danger</option>
                                            <option value="primary" <?php echo ($action_menu_item->type=="primary"?"selected":"");?>>Primary</option>
                                            <option value="secondary" <?php echo ($action_menu_item->type=="secondary"?"selected":"");?>>Secondary</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="controller_path" placeholder="Controller path *" value="<?php echo $action_menu_item->controller_path;?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input list="fa_icons" name="icon" placeholder="Menu Icon *" class="form-control" value="<?php echo $action_menu_item->icon;?>" required>
                                        <datalist id="fa_icons">
                                            <?php foreach(config_item("font_awesome_icon") as $key => $value){ ?>
                                                <option value="<?php echo $value; ?>">
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>


                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-primary pull-left">
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
    parent_menu.addEventListener('change', ()=>{
        getDropdown(parent_menu.value);
    });
    window.onload = ()=>{
        getDropdown(parent_menu.value);
    }

    function getDropdown(parent_id) {
        var options = '<option selected="true" disable="true">-Select Dropdown Menu-</option>';
        var xhttp   = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText!=0){
                    var option = JSON.parse(this.responseText);
                    option.forEach((value)=>{
                        if("<?php echo $action_menu_item->dropdown_id; ?>"==value.id){
                            options += `<option selected value="${value.id}">${value.name}</option>`;
                        }else{
                            options += `<option value="${value.id}">${value.name}</option>`;
                        }
                    });
                    dropdown_menu.innerHTML = options;
                }else{
                    dropdown_menu.innerHTML = "<option disabled value='' selected readonly>-Data Not Found-</option>";
                }
            }
        };
        xhttp.open("POST", "<?php echo site_url('system_aside_menu/actionMenuController/readDropdownMenuByAjax'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("aside_id="+parent_id);
    }
</script>
