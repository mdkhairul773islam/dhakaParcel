<style>
.action_td {
    vertical-align: middle !important;
    padding: 2px 8px !important;
}

.action_td .btn {
    padding-right: 12px;
    padding-left: 12px;
}
</style>

<div class="panel panel-default">
    <div class="panel-heading panal-header">
        <div class="panal-header-title pull-left">
            <h1>All Booking</h1>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input name="booking_no" placeholder="Booking No" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="from_mobile" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="booking_status" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected disabled>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <select name="zone" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected disabled>Select Zone</option>
                            <?php 
                                foreach($zone_list as $key => $zone_name){
                            ?>
                            <option value="<?= $zone_name->zone ?>"><?= filter($zone_name->zone); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="agent_name" class="form-control selectpicker" data-live-search="true">
                            <option value="" selected disabled>Select Agent</option>
                            <?php 
                                foreach($agent_list as $key => $agent){
                            ?>
                            <option value="<?= $agent->name ?>"><?= filter($agent->name); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
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

        <?php msg(); ?>

        <?php if(!empty($bookingList)) {?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <tr style="background: #ECEFF4;">
                    <th rowspan="2" style="width: 45px;">SL</th>
                    <th rowspan="2" style="width: 45px;">Date</th>
                    <th rowspan="2">Boking No</th>

                    <th colspan="3" class="text-center">From Address</th>
                    <th colspan="3" class="text-center">To Address</th>

                    <th rowspan="2" style="width: 80px;">Service Charge</th>
                    <th rowspan="2" style="width: 80px;">Zone</th>
                    <th rowspan="2" style="width: 80px;">Agent Name</th>
                    <th rowspan="2" style="width: 120px;">Status</th>
                    <th rowspan="2" class="text-center">Action</th>
                </tr>
                <tr style="background: #ECEFF4;">
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>
                <?php
            foreach ($bookingList as $key => $list) {
                
                if($this->session->userdata['privilege']=='super' || $this->session->userdata['privilege']=='president'){
                ?>
                <tr>
                    <td><?php echo($key + 1); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($list->date)); ?></td>
                    <td><?php echo $list->booking_no; ?></td>
                    <td><?php echo filter($list->from_name); ?></td>
                    <td><?php echo filter($list->from_mobile); ?></td>
                    <td><?php echo filter($list->from_address); ?></td>
                    <td><?php echo filter($list->to_name); ?></td>
                    <td><?php echo filter($list->to_mobile); ?></td>
                    <td><?php echo filter($list->to_address); ?></td>
                    <td>0</td>
                    <td><?php echo $list->agent_zone_name; ?></td>
                    <td>

                        <?php
                         echo $list->agent_name;
                    ?>
                    </td>
                    <td>
                        <select name="status" class="form-control" id="status<?= $list->id ?>"
                            onchange="updateStatus('<?= $list->id; ?>')">
                            <option value="" selected disabled>Select Status</option>
                            <option <?= ($list->booking_status == 'pending' ? 'selected' : '') ?> value="pending">
                                Pending
                            </option>
                            <option <?= ($list->booking_status == 'processing' ? 'selected' : '') ?> value="processing">
                                Processing
                            </option>
                            <option <?= ($list->booking_status == 'delivered' ? 'selected' : '') ?> value="delivered">
                                Delivered
                            </option>
                        </select>
                    </td>
                    <td width="115" class="action_td text-center">
                        <a class="btn btn-primary"
                            href="<?php echo site_url('booking/booking/view/' . $list->booking_no) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="return confirm('Are your sure to proccess this action ?')"
                            href="<?php echo site_url('booking/booking/delete/' . $list->booking_no) ?>"><i
                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php }else{ 
                 if($this->session->userdata['privilege']=='admin' && $this->session->userdata['username']==$list->agent_username){
                     
            ?>

                <tr>
                    <td><?php echo($key + 1); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($list->date)); ?></td>
                    <td><?php echo $list->booking_no; ?></td>
                    <td><?php echo filter($list->from_name); ?></td>
                    <td><?php echo filter($list->from_mobile); ?></td>
                    <td><?php echo filter($list->from_address); ?></td>
                    <td><?php echo filter($list->to_name); ?></td>
                    <td><?php echo filter($list->to_mobile); ?></td>
                    <td><?php echo filter($list->to_address); ?></td>
                    <td>0</td>
                    <td><?php echo $list->agent_zone_name; ?></td>
                    <td><?php echo $list->agent_name; ?></td>
                    <td>
                        <select name="status" class="form-control" id="status<?= $list->id ?>"
                            onchange="updateStatus('<?= $list->id; ?>')">
                            <option value="" selected disabled>Select Status</option>
                            <option <?= ($list->booking_status == 'pending' ? 'selected' : '') ?> value="pending">
                                Pending
                            </option>
                            <option <?= ($list->booking_status == 'processing' ? 'selected' : '') ?> value="processing">
                                Processing
                            </option>
                            <option <?= ($list->booking_status == 'delivered' ? 'selected' : '') ?> value="delivered">
                                Delivered
                            </option>
                        </select>
                    </td>
                    <td width="115" class="action_td text-center">
                        <a class="btn btn-primary"
                            href="<?php echo site_url('booking/booking/view/' . $list->booking_no) ?>"><i
                                class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="return confirm('Are your sure to proccess this action ?')"
                            href="<?php echo site_url('booking/booking/delete/' . $list->booking_no) ?>"><i
                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>

                <?php }}}?>
                <tr>
                    <th class="text-right" colspan="9">Total Service Charge</th>
                    <th colspan="4">0 Tk</th>
                </tr>
            </table>
        </div>
        <?php }else{ ?>
        <div class="alert alert-info" role="alert" style="text-align: center;">
            Record not found </br>
            <img style="width: 30%;height: 30vh;" src="<?php echo site_url('public/images/datanotfound.gif'); ?>" />
        </div>
        <?php } ?>
    </div>
    <div class="panel-footer">&nbsp;</div>
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

function updateStatus(id) {

    var status = $('#status' + id).val();

    $.ajax({
        type: "POST",
        url: "<?php echo site_url('booking/booking/status_update'); ?>",
        data: {
            id: id,
            status: status,
        }
    }).then(function(response) {
        if (response == 'success') {
            toastr.success('Booking status successfully updated.', 'Success')
        } else {
            toastr.error('Some thing wrong check again.', 'Error')
        }
    });
}
</script>