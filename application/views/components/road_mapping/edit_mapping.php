<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Mapping</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                    echo msg();
                ?>
                <form action="#" method="POST">
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
                        </tr>
                        <?php 
                            foreach($road_maping as $key => $map){
                        ?>
                        <tr>
                            <td>
                                <?= $key+1 ?>
                                <input type="hidden" name="mapping_id[]" value="<?= $map->id; ?>"/>
                            </td>
                            <td><?= $map->road_mapping_date; ?></td>
                            <td><?= $map->car_number; ?></td>
                            <td><?= $map->engine_no; ?></td>
                            <td><?= $map->chassis_no; ?></td>
                            <td><?= $map->driver_name; ?></td>
                            <td><?= $map->driver_mobile; ?></td>
                            <td><?= $map->road_name; ?></td>
                            <td>
                                <select name="road[]" class="form-control" required>
                                    <option value="">Select Road</option>
                                    <?php 
                                        foreach($roads as $road){
                                    ?>
                                    <option <?php echo ($road->id==$map->roads_id ? 'selected' : '') ?> value="<?php echo $road->id; ?>"><?= filter($road->road_name); ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <hr />
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" value="update" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>

