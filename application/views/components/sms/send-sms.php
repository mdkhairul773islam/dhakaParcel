<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
.right {
    display: inline-block;
    float: right;
}

p span .sms {
    border: 1px solid transparent;
    width: 40px;
}

@media screen and (min-width: 992px) {
    .horizantal_button {
        margin-top: 25px;
    }
}
</style>

<div class="container-fluid" ng-controller="CustomSMSCtrl">
    <div class="row">
        <?php msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Send SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">

                    <form action="<?php echo site_url('sms/sendSms/send_sms')?>" method="post">
                        <div class="col-md-5 col-sm-6">
                            <label class="control-label">Person Type</label>
                            <div class="form-group">
                                <select name="person_number_type" ng-model="personNumberType"
                                    ng-change="getAllMobileFn(personNumberType)" class="form-control selectpicker"
                                    data-show-subtext="true" data-live-search="true" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="admin">Agent</option>
                                    <option value="user">Delivery Man</option>
                                    <option value="custommer_to">Custommer</option>
                                    <!-- <option value="custommer_from">Custommer From</option> -->
                                </select>
                            </div>
                        </div>

                        <!--  <div class="col-md-2 col-sm-6">
                            <div class="form-group horizantal_button">
                                <input type="submit" value="Show" name="show" class="btn btn-primary">
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Mobile No And SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <blockquote class="form-head">
                    <ol style="font-size: 14px;">
                        <li>Select Mobile No And Click To <mark>Send</mark> Button</li>
                        <li>Total SMS: <strong><?php echo $total_sms; ?> </strong> &nbsp; Total Sent SMS:
                            <strong><?php echo $sent_sms; ?></strong> &nbsp; Remaining SMS:
                            <strong><?php echo $total_sms-$sent_sms; ?></strong>
                        </li>
                    </ol>
                </blockquote>
                <form action="<?php echo site_url('sms/sendSms/send_sms');?>" method="post" ng-cloak>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Mobile No <span class="req">*</span></label>
                            <div class="form-group">
                                <div class="form-element" style="height: 215px;">
                                    <p ng-if="preloder===true">Loding........</p>

                                    <table class="table">
                                        <tr>
                                            <th ng-show="allMobileNumbers[0].booking_no">Booking .No</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                        </tr>

                                        <tr ng-repeat="item in allMobileNumbers">
                                            <td ng-show="allMobileNumbers[0].booking_no"> {{ item.booking_no }}</td>
                                            <td> {{ item.name }}</td>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" ng-value="item.mobile" name="mobile[]"
                                                            checked />
                                                        {{ item.mobile }}
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Message <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="message" ng-model="msgContant" class="form-control" cols="30" rows="10"
                                    placeholder="Type your message....." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="clearfix">
                                <p class="right">
                                    <span><strong>Total Letter: </strong>
                                        <input name="total_characters" ng-model="totalChar" class="sms text-right"
                                            type="text">
                                    </span>
                                    &nbsp;
                                    <span><strong>Total Messsage: </strong>
                                        <input class="sms text-right" name="total_messages" ng-model="msgSize"
                                            type="text">
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <div class="btn-group">
                                <input type="submit" name="sendSms" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
$(document).ready(function() {
    $(' input[name="type" ]').on('change', function(event) {
        if ($(this).val() == "member") {
            $('#member_name').slideDown();
        } else {
            $('#member_name').slideUp();
        }
    });
});
$(function() {
    $('.selectpicker').selectpicker();
});
</script>