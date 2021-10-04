<style>
.table>tbody>tr>td,
.table>tbody>tr>th,
.table>tfoot>tr>td,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>thead>tr>th {
    vertical-align: middle;
    text-align: center;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Agente Trasaction </h1>
                </div>
            </div>

            <div class="panel-body">
                <?php msg(); ?>
                <!-- horizontal form -->
                <?php
                    $attr = array("class"=>"form-horizontal");
                    echo form_open('', $attr);
                ?>
                <?php 
                    echo msg();
                ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2 control-label">Date From <span class="req">*</span></label>
                        <div class="col-md-2">
                            <div class="input-group date" id="datetimepicker">
                                <input type="text" name="date[from]" value="<?= date('Y-m-d'); ?>" class="form-control"
                                    placeholder="YYYY-MM-DD" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <label class="col-md-1 control-label">Date To <span class="req">*</span></label>
                        <div class="col-md-2">
                            <div class="input-group date" id="datetimepicker2">
                                <input type="text" name="date[to]" value="<?= date('Y-m-d'); ?>" class="form-control"
                                    placeholder="YYYY-MM-DD" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <hr>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th>Sl.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Payment Type</th>
                        <th>Amount (Tk)</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>

                    <?php 
                        $total = 0;
                        foreach($agent_transactions as $key => $row) {
                            $name = get_name('users', 'name', ['id'=> $row->agent_id]);
                            $total += $row->debit;
                    ?>
                    <tr>
                        <td><?= ++$key; ?></td>
                        <td><?= $row->date; ?></td>
                        <td><?= ucfirst($name); ?></td>
                        <td><?= $row->payment_type; ?></td>
                        <td><?= $row->debit; ?></td>
                        <td class="text-right">
                            <!--  <a class="btn btn-warning" href=""><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></a> -->
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete This Data??')"
                                href="<?=site_url('agent/agent/delete/'.$row->id)?>"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="4" style="text-align: right">Total = </th>
                        <th><?= $total; ?> Tk</th>
                        <td></td>
                    </tr>
                </table>
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