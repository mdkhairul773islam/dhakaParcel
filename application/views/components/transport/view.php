<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Transport</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Car Number</th>
                        <th>Engine No</th>
                        <th>Chassis No</th>
                        <th>Driver Name</th>
                        <th>Mobile</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>
                    <?php 
                        foreach($transport as $key => $row){
                    ?>
                    <tr>
                        <td><?= ($key+1) ?></td>
                        <td><?= $row->car_number?></td>
                        <td><?= $row->engine_no?></td>
                        <td><?= $row->chassis_no?></td>
                        <td><?= $row->driver_name?></td>
                        <td><?= $row->driver_mobile?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?php echo get_url("transport/transport/edit/".$row->id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("transport/transport/delete/".$row->id); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
