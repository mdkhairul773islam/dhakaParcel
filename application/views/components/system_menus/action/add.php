<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Add New Action Menu</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('system_aside_menu/actionMenuController/store'); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select id="parent_menu" name="parent_id" class="form-control">
                                            <option selected="true" disable="true">-Select Parent Menu-</option>
                                            <?php foreach($parent_menus as $row){ ?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select id="dropdown_menu" name="dropdown_id" class="form-control">
                                            <option selected="true" disable="true">-Select Dropdown Menu-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Action Menu Name *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <select  name="type" class="form-control" required>
                                            <option selected="" value="">-Select Option's Type- *</option>
                                            <option value="success">Success</option>
                                            <option value="info">Info</option>
                                            <option value="warning">Warning</option>
                                            <option value="danger">Danger</option>
                                            <option value="primary">Primary</option>
                                            <option value="secondary">Secondary</option>
                                        </select>
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
                                        <input type="submit" value="Save" class="btn btn-primary pull-left">
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

    function getDropdown(parent_id) {
        var options = '<option selected="true" disable="true">-Select Dropdown Menu-</option>';
        var xhttp   = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText!=0){
                    var option = JSON.parse(this.responseText);
                    option.forEach((value)=>{
                        options += `<option value="${value.id}">${value.name}</option>`;
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
