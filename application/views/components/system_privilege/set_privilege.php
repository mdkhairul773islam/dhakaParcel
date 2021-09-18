<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
    }
    .table tr td{
        vertical-align: middle !important;
    }

    .panel-default .panel-title{
        cursor: pointer;
    }
    .panel-default .panel-title a{
        font-size: 16px;
        display: flex;
        padding: 0.4rem 0.8rem;
        margin: 0;
        align-items: center;
    }
    .panel-default .panel-title a .img{
        width: 60px;
        padding-top: 8%;
        position: relative;
        overflow: hidden;
        margin-right: 15px;
    }
    .panel-default .panel-title a .img img{
        display: block;
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    :root{
       font-size: 16px;
    }
    .switch {
    	 position: relative;
    	 display: inline-flex;
    	 align-items: center;
    	 justify-content: space-between;
    }
     .switch > span {
    	 border: 0.0625rem solid #ddd;
    	 display: inline-block;
    	 width: 2.0625rem;
    	 height: 1.25rem;
    	 border-radius: 1.875rem;
    	 cursor: pointer;
    	 position: relative;
    	 background: #fff;
    	 margin: 0 0.3125rem;
    }
     .switch > span::before {
    	 content: "";
    	 display: inline-block;
    	 position: absolute;
    	 top: 50%;
    	 left: 0;
    	 transform: translateY(-50%);
    	 width: 100%;
    	 height: 100%;
    	 transition: 0.2s cubic-bezier(0.24, 0, 0.5, 1);
    	 border-radius: 1.875rem;
    }
     .switch > span::after {
    	 content: "";
    	 display: inline-block;
    	 width: 1.25rem;
    	 height: 1.25rem;
    	 border-radius: 50%;
    	 background: #fff;
    	 position: absolute;
    	 top: 50%;
    	 left: calc(0% - 0.125rem);
    	 transform: translateY(-50%);
    	 box-shadow: 0 0 0 0.0625rem rgba(0, 0, 0, .1), 0 0.25rem 0 0 rgba(0, 0, 0, .04), 0 0.25rem 0.5625rem rgba(0, 0, 0, .13), 0 0.1875rem 0.1875rem rgba(0, 0, 0, .05);
    	 transition: 0.35s cubic-bezier(0.54, 1.6, 0.5, 1);
    }
     .switch > input[type='checkbox'] {
    	 position: absolute;
    	 top: 50%;
    	 left: 50%;
    	 transform: translate(-50%, -50%);
    	 opacity: 0;
    }
     .switch > input[type='checkbox']:checked + span::before {
    	 background: #00c4ff;
    }
     .switch > input[type='checkbox']:checked + span::after {
    	 left: calc(100% - 1.125rem);
    }
     .switch.x1 > span {
    	 transform: scale(1.1);
    }
     .switch.x2 > span {
    	 transform: scale(1.2);
    }
     .switch.x3 > span {
    	 transform: scale(1.3);
    }
     .switch.x4 > span {
    	 transform: scale(1.4);
    }
     .switch.x5 > span {
    	 transform: scale(1.5);
    }
     .switch.x6 > span {
    	 transform: scale(1.6);
    }
     
</style>

<div class="container-fluid">
    <div class="row">
        <?php msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Privilege</h1>
                </div>
            </div>
            <div class="panel-body">
                <h4 class="text-center hide" style="margin-top: -10px;">Set Privilege</h4>
                
                <?php 
                    if ($users) {foreach($users as $user_key => $user_value){ 
                        // get single user's privilege to activate checkbox
                        $privilegeOfUser = read('system_privileges', ['admin_id'=>$user_value->id]);
                        $aside_menu_array           = ($privilegeOfUser && isset($privilegeOfUser[0]->aside_menu_id)) ? json_decode($privilegeOfUser[0]->aside_menu_id, true) : '';
                        $aside_dropdown_menu_array  = ($privilegeOfUser && isset($privilegeOfUser[0]->aside_menu_dropdown_id)) ? json_decode($privilegeOfUser[0]->aside_menu_dropdown_id, true) : '';
                        $action_menu_array          = ($privilegeOfUser && isset($privilegeOfUser[0]->action_menu_id)) ? json_decode($privilegeOfUser[0]->action_menu_id, true) : '';
                ?> 
                
                    <form method="post" action="<?php echo site_url('system_privilege/PrivilegeController/process'); ?>" >
                    <input type="hidden" value="<?php echo $user_value->id; ?>" name="admin_id">
                    <div class="panel-group" id="accordion_<?php echo $user_key; ?>" role="tablist" aria-multiselectable="false">
                      <div class="panel panel-default">
                        <div class="" role="tab" id="headingOne_<?php echo $user_key; ?>" >
                          <div class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $user_key; ?>" href="#collapseOne_<?php echo $user_key; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <div class="img">
                                    <img src="<?php echo site_url($user_value->image); ?>">
                                </div>
                                <div>
                                    <table class="tabel">
                                        <tr>
                                            <th>Name</th>
                                            <th>:</th>
                                            <td><?php echo $user_value->name; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <th>:</th>
                                            <td><?php echo $user_value->privilege; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                          </div>
                        </div>
                        <div id="collapseOne_<?php echo $user_key; ?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne_<?php echo $user_key; ?>">
                          <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>SL</th>
                                    <th>Aside's Menu</th>
                                    <th>Aside's Dropdown Menu</th>
                                    <th>Action's Menu</th>
                                </tr>
                                <!--read menus from database start-->
                                <?php if($system_aside_menus){ foreach($system_aside_menus as $p_aside_menus_key => $p_aside_menus_value){ ?>
                                <!--read menus from database end-->
                                <tr>
                                    <td><?php echo $p_aside_menus_key+1; ?></td>
                                    <td>
                                        <div>
											<label class="switch">
												<input type="checkbox" <?php echo (!empty($aside_menu_array) && in_array($p_aside_menus_value->id, $aside_menu_array)) ? 'checked' : ''; ?> value="<?php echo $p_aside_menus_value->id;?>" name="aside_menu_id[]">
												<span></span>
												<?php echo $p_aside_menus_value->name;?>
											</label>
										</div>
                                    </td>
                                    <td>
                                        <?php
                                            $menus_dropdown = read('system_aside_menu_dropdowns', ['parent_id'=>$p_aside_menus_value->id, 'status'=>1]);
                                            if($menus_dropdown){foreach($menus_dropdown as $p_menus_dropdown_key => $p_menus_dropdown_value){
                                        ?>
                                        <div>
											<label class="switch" style="margin: 0.4rem 0">
												<input type="checkbox" <?php echo (!empty($aside_dropdown_menu_array) && in_array($p_menus_dropdown_value->id, $aside_dropdown_menu_array)) ? 'checked' : ''; ?> value="<?php echo $p_menus_dropdown_value->id;?>" name="aside_menu_dropdown_id[]">
												<span></span>
												<?php echo $p_menus_dropdown_value->name;?>
											</label>
										</div>
                                        <?php }} ?>
                                    </td>
                                    <td>
                                        <?php
                                            $action_menu = read('system_action_menus', ['parent_id'=>$p_aside_menus_value->id, 'status'=>1]);
                                            if($action_menu){foreach($action_menu as $p_action_menu_key => $p_action_menu_value){
                                        ?>
                                        <div>
											<label class="switch" style="margin: 0.4rem 0">
												<input type="checkbox" <?php echo (!empty($action_menu_array) && in_array($p_action_menu_value->id, $action_menu_array)) ? 'checked' : ''; ?> value="<?php echo $p_action_menu_value->id;?>" name="action_menu_id[]">
												<span></span>
												<?php echo $p_action_menu_value->name;?>
											</label>
										</div>
                                        <?php }} ?>
                                    </td>
                                </tr>
                                <?php }} ?>
                            </table>
                            <input type="submit" value="<?php echo (!empty($aside_menu_array)) ? "Update" : "Save"; ?>" name='<?php echo (!empty($aside_menu_array)) ? "update" : "save"; ?>' class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                <?php }} ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

