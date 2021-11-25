<div class="container-fluid" ng-controller="roadMappingCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Road Mapping</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                    echo msg();
                ?>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" name="date[from]" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="From">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" name="date[to]" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="To">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" value="Show" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <table class="table table-bordered" ng-cloak>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Car Number</th>
                            <th>Engine No</th>
                            <th>Chassis No</th>
                            <th>Driver Name</th>
                            <th>Mobile</th>
                            <th>Road Mapping</th>
                            <th width="115" class="text-right">Action</th>
                        </tr>
                        
                        <?php 
                            foreach($road_maping as $key => $map){
                        ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $map->road_mapping_date; ?></td>
                            <td><?= $map->car_number; ?></td>
                            <td><?= $map->engine_no; ?></td>
                            <td><?= $map->chassis_no; ?></td>
                            <td><?= $map->driver_name; ?></td>
                            <td><?= $map->driver_mobile; ?></td>
                            <td><?= $map->road_name; ?></td>
                            <td class="text-right">
                                <a class="btn btn-warning" href="<?php echo site_url('road_mapping/road_mapping/edit_mapping/').$map->invoice; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a class="btn btn-danger" href="<?php echo site_url('road_mapping/road_mapping/deleteMapping/').$map->mapping_id; ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>

