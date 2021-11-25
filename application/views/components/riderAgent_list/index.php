<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Rider Or Agent List </h1>
                </div>
            </div>

            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group date" id="datetimepickerFrom">
                                <input type="text" name="date[from]" class="form-control" placeholder="From">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
        
                        <div class="col-md-3">
                            <div class="input-group date" id="datetimepickerTo">
                                <input type="text" name="date[to]" class="form-control" placeholder="To">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th width="40">Sl</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                       <th width="115" class="text-right">Action</th>
                    </tr>
                    <?php foreach($rider_or_agent_registration as $key => $row){ ?>
                    <tr>
                        <td><?= ($key+1); ?></td>
                        <td><?= $row->date; ?></td>
                        <td><?= $row->name; ?></td>
                        <td><?= $row->phone; ?></td>
                        <td><?= $row->email; ?></td>
                        <td class="text-right">
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete This Data??')" href="<?php echo site_url('/riderAgent_list/RiderAgent_list/delete/').$row->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>