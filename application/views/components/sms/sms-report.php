<style>
    .table tr th:last-child,
    .table tr td:last-child {text-align: right;}
    @media screen and (min-width: 992px) {
        .horizantal_button {margin-top: 25px;}
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<div class="panel panel-default none">
    <div class="panel-heading panal-header">
        <div class="panal-header-title">
            <h1>SMS Report</h1>
        </div>
    </div>
    <div class="panel-body">
        <blockquote class="form-head">
            <p style="font-size: 16px;">  Total SMS : <strong><?php echo $total_sms; ?></strong> &nbsp; Total Sent SMS   : <strong><?php echo $sent_sms; ?></strong> &nbsp;   Remaining SMS : <strong><?php echo $total_sms-$sent_sms; ?></strong></p>
        </blockquote>
        <div class="row">
            <form action="<?php echo site_url('sms/sendSms/sms_report')?>" method="post">
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label class="control-label">From</label>
                        <div class="input-group date" id="datetimepickerSMSFrom">
                            <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label class="control-label">To</label>
                        <div class="input-group date" id="datetimepickerSMSTo">
                            <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="1">Send</option>
                            <option value="0">Not Send</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="form-group horizantal_button">
                         <input type="submit" value="Show" name="show_between" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

    
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>All Record</h1>
        </div>
        <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
    </div>
    
    <?php if($sms_record!=null){?>
    <div class="panel-body">
        <!-- print banner start -->
            <?php // $this->load->view('print', $this->data); ?>
        <!-- print banner end -->
            
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th width="100">Date</th>
                <th>Mobile</th>
                <th>Message</th>
                <th width="100">Total Letter </th>
                <th>Status</th>
            </tr>
            <?php foreach($sms_record as $key=>$all_sms){?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $all_sms->delivery_date; ?></td>
                <td><?php echo $all_sms->mobile; ?></td>
                <td><?php echo $all_sms->message; ?></td>
                <td>
                <?php 
                    echo $all_sms->total_characters;
                ?>
                </td>
                <td><?php echo ($all_sms->delivery_report==1?'Send':'Not Send'); ?></td>
            </tr>
         <?php } ?>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
<?php } ?>
</div>
    
<script>
    // linking between two date
    $('#datetimepickerSMSFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $('#datetimepickerSMSTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });
</script>
