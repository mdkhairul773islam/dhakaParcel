<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<style>
.clearfix p {
    display: inline-block;
    float: right;
}

p span .sms {
    border: 1px solid transparent;
    width: 40px;
}
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
                        <li>Total SMS: <strong><?php echo $total_sms; ?> </strong> &nbsp; Total Sent SMS:
                            <strong><?php echo $sent_sms; ?></strong> &nbsp; Remaining SMS:
                            <strong><?php echo $total_sms-$sent_sms; ?></strong>
                        </li>
                    </ol>
                </blockquote>
                <hr>
                <form action="<?php echo site_url('sms/sendSms/send_custom_sms')?>" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Mobile No <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="mobiles" class="form-control"
                                    placeholder="Without +88 And Use Comma(,) Separator" cols="30" rows="8"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Message <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="message" class="form-control"
                                    placeholder="Type Your Message. Maximum Characters Length 1080" cols="30" rows="8"
                                    ng-model="msgContant" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="clearfix">
                                <p>
                                    <span>
                                        <strong>Total Letter </strong>
                                        <input name="total_characters" class="sms" type="text" ng-model="totalChar">
                                    </span>
                                    &nbsp;
                                    <span>
                                        <strong>Total SMS</strong>
                                        <input class="sms text-right" name="total_messages" type="text"
                                            ng-model="msgSize">
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 text-right">
                            <div class="btn-group">
                                <input type="submit" value="Send" name="sendSms" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>