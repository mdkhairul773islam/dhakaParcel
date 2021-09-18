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
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php msg(); ?>
                <div class="panal-header-title ">
                    <h1 class="pull-left">Trash List</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php if ($this->data['action_menus']) { ?>   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 50px;">SL</th>
                                <th>Parent</th>
                                <th>Menu Name</th>
                                <th>Controller Path</th>
                                <th>Type</th>
                                <th>Icon</th>
                                <th style="width: 110px;" class="none">Action</th>
                            </tr>
                                                                 
                            <?php 
                            foreach ($this->data['action_menus'] as $key => $value) { ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo ($value->menu_name) ? $value->menu_name : ""; ?></td>
                                <td><?php echo ($value->name) ? $value->name : ""; ?></td>
                                <td><?php echo ($value->controller_path) ? $value->controller_path : ""; ?></td>
                                <td><?php echo $value->type; ?></td>
                                <td><?php echo $value->icon; ?></td>
                                <td  class="none">
                                    <a class="btn btn-info" onclick="return confirm('Are you sure restore this data?');" href="<?php echo site_url('system_aside_menu/ActionMenuController/restore/'.$value->id) ;?>"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data?');" href="<?php echo site_url('system_aside_menu/ActionMenuController/delete/'.$value->id) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>                 
                            <?php } ?>
                        </table>
                    </div>
                <?php } ?>

            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

