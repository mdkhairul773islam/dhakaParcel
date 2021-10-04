<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<style>
.payment_img {
    text-align: center;
    max-width: 220px;
    width: 100%;
    margin-bottom: 15px;
}

.payment_img img {
    border-radius: 25px / 100px;
    border: 1px solid #00A8FF;
    max-width: 100%;
    width: 100%;
    margin-bottom: 10px;
}

@media screen and (min-width: 992px) {
    .payment_img {
        position: absolute;
        top: 0;
        left: 20%;
        width: 100%;
    }
}
</style>
<div class="container-fluid" ng-controller="agnetInfoCtrl">
    <div class="row" ng-cloak>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Agente Payment</h1>
                </div>
            </div>

            <div class="panel-body">
                <!-- horizontal form -->
                <?php
                    $attr = array("class"=>"form-horizontal");
                    echo form_open('', $attr);
                ?>
                <?php 
                    echo msg();
                ?>
                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" value="<?= date('Y-m-d'); ?>" class="form-control"
                                placeholder="YYYY-MM-DD" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="payment_img">
                            <img ng-src="<?php echo site_url('') ?>{{agentInformation[0].agent_image}}" alt="">
                            <p><strong>Name :</strong> <span>{{agentInformation[0].agent_name}}</span></p>
                            <p><strong>Mobile :</strong> <span>{{agentInformation[0].agent_mobile}}</span></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Agente Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select ng-model="agent_id" ng-change="agentInfoFn(agent_id);" name="agent_id"
                            class="selectpicker form-control" required data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled>Select Agente</option>
                            <?php 
                                foreach($agent_list as $agent){
                            ?>
                            <option value="<?= $agent->id ?>"><?= ucfirst($agent->agnet_name).' - '.$agent->mobile; ?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Balance (TK) <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" ng-model="totalCommisionBalance" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Total Paid Amount (TK) <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" ng-model="totalPaidAmount" class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transaction Type <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="payment_type" ng-init="transactionBy = 'cash'" ng-model="transactionBy"
                            class="form-control" required>
                            <option value="" selected disabled>&nbsp;</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="bkash">bKash</option>
                            <option value="TT">T.T</option>
                            <option value="cash_to_tt">Cash To T.T</option>
                            <option value="commission">Commission</option>
                        </select>
                    </div>
                </div>

                <!-- for selecting cheque -->
                <div ng-if="transactionBy == 'cheque'">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bank name <span class="req">*</span></label>

                        <div class="col-md-5">
                            <input type="text" name="bankname" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Branch name <span class="req">*</span>
                        </label>

                        <div class="col-md-5">
                            <input type="text" name="branchname" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Account No. <span class="req">*</span>
                        </label>

                        <div class="col-md-5">
                            <input type="text" name="account_no" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Cheque No. <span class="req">*</span>
                        </label>

                        <div class="col-md-5">
                            <input type="text" name="chequeno" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Pass Date <span class="req">*</span>
                        </label>

                        <div class="col-md-5">
                            <input type="text" name="passdate" placeholder="YYYY-MM-DD" class="form-control"
                                value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                </div>
                <!-- cheque option end  -->

                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="number" name="payment" ng-model="paymentAmount" class="form-control" step="any"
                            min="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Total Balance (TK) <span class="req">*</span>
                    </label>

                    <div class="col-md-5">
                        <input type="number" ng-model="totalCommisionBalance-totalPaidAmount-paymentAmount"
                            class="form-control" step="any" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Paid By <span class="req">&nbsp;</span></label>
                    <div class="col-md-5">
                        <textarea name="comment" cols="15" rows="1" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="btn-group pull-right">
                        <input type="submit" name="save" value="Save" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
$('#datetimepicker').datetimepicker({
    format: 'YYYY-MM-DD',
    useCurrent: false
});


app.controller("agnetInfoCtrl", [
    "$scope",
    "$log",
    "$http",
    function($scope, $log, $http) {

        $scope.agentInformation = [];

        $scope.totalCommisionBalance = 0;
        $scope.totalPaidAmount = 0;
        $scope.paymentAmount = 0.0;

        $scope.agentInfoFn = (agentId) => {

            var bookingWhere = {
                tableFrom: 'booking',
                tableTo: ['booking_agent_records', 'users'],
                joinCond: ['booking.booking_no=booking_agent_records.booking_no',
                    'booking_agent_records.agent_id=users.id'
                ],
                cond: {
                    'booking.trash': 0,
                    'booking_agent_records.agent_id': agentId,
                    //'users.privilege': 'admin'
                },
                select: ['booking.booking_no', 'booking.service_charge',
                    'booking_agent_records.booking_no as agent_recived_booking_no',
                    'booking_agent_records.agent_id', 'users.name as agent_name',
                    'users.image as agent_image', 'users.mobile as agent_mobile'
                ]
            }


            $http({
                method: "POST",
                url: angularUrl + "join",
                data: bookingWhere,

            }).success(function(bookingResponse) {

                if (bookingResponse.length > 0) {
                    $scope.agentInformation = bookingResponse;

                    var commission = 0;
                    var totalCommision = 0;
                    angular.forEach(bookingResponse, function(row, key) {
                        commission = parseFloat(parseFloat(row.service_charge) * 25 / 100);
                        totalCommision += commission;
                    });

                    $scope.totalCommisionBalance = totalCommision;

                } else {
                    $scope.agentInformation = [];
                    $scope.totalCommisionBalance = 0;
                }
            });

            var where = {
                table: "agent_transactions",
                cond: {
                    'agent_id': agentId,
                    'trash': 0
                },
                select: ['agent_transactions.agent_id', 'agent_transactions.debit as amount'],
            };
            $http({
                method: "POST",
                url: angularUrl + "result",
                data: where,
            }).success(function(response) {

                if (response.length > 0) {
                    var totalDebit = 0;
                    angular.forEach(response, function(row, key) {
                        totalDebit += parseFloat(row.amount);
                    });

                    $scope.totalPaidAmount = totalDebit;

                } else {
                    $scope.totalPaidAmount = 0;
                }

            });
        };
    },
]);
</script>