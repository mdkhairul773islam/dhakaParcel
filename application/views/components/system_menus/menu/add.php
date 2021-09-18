<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
	            <?php msg(); ?>
                <div class="panal-header-title pull-left">
                    <h1>Add New Menu</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="<?php echo site_url('system_aside_menu/MenuController/store'); ?>" class="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Menu Name *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="selector" placeholder="Class name without dot(example: category_list) *" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="controller_path" placeholder="Controller path (optional)" disable="true" readonly="true" class="form-control">
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
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-control">
                                            <input type="checkbox" name="has_sub_menu" value="1" checked="true">&nbsp; This Menu Has Sub Menu ?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-control">
                                            <input type="checkbox" name="has_action_menu" value="1" checked="true">&nbsp; This Menu Has Action Menu ?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="submit" value="Create" class="btn btn-primary pull-right">
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
