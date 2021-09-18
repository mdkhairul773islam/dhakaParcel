<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<style>
    .form-head ol li {margin-bottom: 0 !important;}
    .clearfix {margin-bottom: 8px;}
    .clearfix p {
        display: inline-block;
        float: right;
    }
    p span .sms {
        margin-left: 5px;
        width: 50px;
        outline: none;
    }
    textarea {resize: vertical;}
    .status_btn .btn {
        transition: all .2s;
        border-radius: 4px;
        padding: 6px 12px;
    }
    .status_btn .btn-success {cursor: default;;}
    .status_btn .btn i {margin-right: 4px;}
</style>

<div class="container-fluid" ng-controller="CustomSMSCtrl">
    <div class="row">
         <?php msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Custom SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <blockquote class="form-head">
                    <ol style="font-size: 14px;">
                        <li>Total SMS:  <strong><?php echo $total_sms; ?> </strong> &nbsp;  Total Sent SMS: <strong><?php echo $sent_sms; ?></strong> &nbsp;  Remaining SMS: <strong><?php echo $total_sms-$sent_sms; ?></strong></li>
                    </ol>
                </blockquote>
                <hr>
                <form action="<?php echo site_url('sms/sendSms/send_custom_sms')?>" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Mobile Number <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="mobiles" class="form-control" placeholder="Without +88 And Use Comma(,) Separator" cols="30" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Message <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Type Your Message. Maximum Characters Length 1080"
                                        cols="30" rows="8" ng-model="msgContant" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="clearfix">
                                <p>
                                    <span>
                                        <strong>Total Characters </strong>
                                        <input name="total_characters" class="sms" type="text" ng-model="totalChar">
                                    </span>
                                    &nbsp;
                                    <span>
                                        <strong>Total Messages</strong>
                                        <input class="sms text-right" name="total_messages" type="text" ng-model="msgSize">
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 text-right">
                            <div class="btn-group">
                                <input type="submit" value="Send SMS" name="sendSms" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>SMS Status</h1>
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
                        <th width="40">SL</th>
                        <th width="100">Date</th>
                        <th>Mobile</th>
                        <th>Message</th>
                        <th width="140">Number of SMS</th>
                        <th class="text-right" width="140">Status</th>
                    </tr>
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
    </div>
</div>
