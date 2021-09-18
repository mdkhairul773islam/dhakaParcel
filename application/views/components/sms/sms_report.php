<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<style>
    .form-head ol li {margin-bottom: 0 !important;}
    .status_btn .btn {
        transition: all .2s;
        border-radius: 4px;
        padding: 6px 12px;
    }
    .status_btn .btn-success {cursor: default;;}
    .status_btn .btn i {margin-right: 4px;}
    @media screen and (min-width: 992px) {
        .horizantal_button {margin-top: 25px;}
    }
</style>

<div class="panel panel-default none">
    <div class="panel-heading panal-header">
        <div class="panal-header-title">
            <h1>SMS Report</h1>
        </div>
    </div>
    <div class="panel-body">
        <blockquote class="form-head">
            <ol style="font-size: 14px;">
                <li>Total SMS:  <strong><?php echo $total_sms; ?> </strong> &nbsp;  Total Sent SMS: <strong><?php echo $sent_sms; ?></strong> &nbsp;  Remaining SMS: <strong><?php echo $total_sms-$sent_sms; ?></strong></li>
            </ol>
        </blockquote>

        <div class="row">
            <form action="<?php echo site_url('sms/sendSms/sms_report?system_id=NTZfMTAx')?>" method="post">
                <div class="col-md-3 col-sm-4">
                    <div class="form-group">
                        <label class="control-label">Form</label>
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
                            <option value="1">Success</option>
                            <option value="0">Failed</option>
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
        <div class="panal-header-title">
            <h1>Report Status</h1>
        </div>
    </div>

    <div class="panel-body">
        <blockquote class="form-head">
            <ol style="font-size: 14px;">
                <li>Total Send SMS:  <strong>152</strong> &nbsp;  Success Send SMS: <strong>254</strong> &nbsp;  Failed SMS: <strong>45</strong></li>
            </ol>
        </blockquote>
        <table class="table table-bordered">
            <tr>
                <th width="50">SL</th>
                <th width="100">Date</th>
                <th>Mobile</th>
                <th>Message</th>
                <th width="140">Number of SMS</th>
                <th class="text-right" width="140">Status</th>
            </tr>
            <!-- <?php foreach($sms_record as $key=>$all_sms){?>
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
                <td class="status_btn text-right">
                    <?php echo ($all_sms->delivery_report==1?'Send':'Not Send'); ?>
                </td>
            </tr>
            <?php } ?> -->

            <tr>
                <td>01</td>
                <td>12/2/2021</td>
                <td>01910217482</td>
                <td>Lorem Ipsum</td>
                <td>321321</td>
                <td class="status_btn text-right">
                    <span class="btn btn-success"><i class="fa fa-check-square-o"></i> Success</span>
                </td>
            </tr>
            <tr>
                <td>01</td>
                <td>12/2/2021</td>
                <td>01910217482</td>
                <td>Lorem Ipsum</td>
                <td>321321</td>
                <td class="status_btn text-right">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i> Failed</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
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
