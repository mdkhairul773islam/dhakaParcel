<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<div class="container-fluid">
    <div class="row">
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
                <div class="form-group">
                    <label class="col-md-3 control-label">Date <span class="req">*</span></label>
                    <div class="col-md-5">
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="created_at" class="form-control" placeholder="YYYY-MM-DD" required>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Zone <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="zone" class="selectpicker form-control" required data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled>Select Zone</option>
                            <option value="">Zone One</option>
                            <option value="">Zone Two</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Agente Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="agent_name" class="selectpicker form-control" required data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled>Select Agente</option>
                            <option value="">Agente One</option>
                            <option value="">Agente Two</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Balance (TK) <span class="req">*</span></label>
                    <div class="col-md-3">
                        <input type="number" name="balance" ng-model="balance" class="form-control" step="any" readonly>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="sign" ng-model="sign" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transaction Type <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="payment_type" ng-init="transactionBy = 'cash'" ng-model="transactionBy" class="form-control" required>
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
							<input type="text" name="meta[bankname]" class="form-control">
	                    </div>
	                </div>

					<div class="form-group">
	                    <label class="col-md-3 control-label">
							Branch name <span class="req">*</span>
						</label>

	                    <div class="col-md-5">
							<input type="text" name="meta[branchname]" class="form-control">
	                    </div>
	                </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Account No. <span class="req">*</span>
                        </label>

                        <div class="col-md-5">
                            <input type="text" name="meta[account_no]" class="form-control">
                        </div>
                    </div>

					<div class="form-group">
	                    <label class="col-md-3 control-label">
							Cheque No. <span class="req">*</span>
						</label>

	                    <div class="col-md-5">
							<input type="text" name="meta[chequeno]" class="form-control">
	                    </div>
	                </div>

					<div class="form-group">
	                    <label class="col-md-3 control-label">
							Pass Date <span class="req">*</span>
						</label>

	                    <div class="col-md-5">
                            <input type="text" name="meta[passdate]" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo date("Y-m-d"); ?>">
							<input type="hidden" name="meta[status]" value="pending">
	                    </div>
	                </div>
				</div>
                <!-- cheque option end  -->

                <div class="form-group">
                    <label class="col-md-3 control-label">Payment (TK) <span class="req">*</span></label>
                    <div class="col-md-5 {{class_meassure}}">
                        <input type="number" name="payment" ng-model="payment" placeholder="0.00" class="form-control" step="any" min="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">
                        Total Balance (TK) <span class="req">*</span>
                    </label>

                    <div class="col-md-3">
                        <input type="number" name="totalBalance" ng-value="getTotalFn()" placeholder="0.00" class="form-control" step="any" readonly>
                    </div>

                    <div class="col-md-2">
                        <input type="text" name="csign" ng-model="csign" class="form-control" readonly>
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

<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>