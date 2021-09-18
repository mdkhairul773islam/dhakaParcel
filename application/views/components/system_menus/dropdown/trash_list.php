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
                <?php if ($menus_dropdown) { ?>   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 50px;">SL</th>
                                <th>Menu Name</th>
                                <th>Dropdown Name</th>
                                <th>Controller Path</th>
                                <th>Selector</th>
                                <th>Icon</th>
                                <th style="width: 110px;" class="none">Action</th>
                            </tr>
                                                                 
                            
                            <?php foreach ($menus_dropdown as $key => $value) { ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value->menu_name; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->controller_path; ?></td>
                                <td><?php echo $value->selector; ?></td>
                                <td><?php echo $value->icon; ?></td>
                                <td  class="none">
                                    <a class="btn btn-info"  href="<?php echo site_url('system_aside_menu/DropdownMenuController/restore/'.$value->id) ;?>"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?');" href="<?php echo site_url('system_aside_menu/DropdownMenuController/delete/'.$value->id) ;?>"><i class="fa fa-close" aria-hidden="true"></i></a>
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

