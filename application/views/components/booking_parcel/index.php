<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Booking Parcel List</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch</label>
                                <select name="branch_name" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option value="" disabled selected>Select Branch</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Booking Type</label>
                                <select name="booking_type" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option value="" disabled selected>Select Booking Type</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Delivery Type</label>
                                <select name="delivery_type" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option value="" disabled selected>Select Delivery Type</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select name="status" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">From Date</label>
                                <div class="input-group date" id="datetimepickerFrom">
                                    <input type="text" name="form_date" class="form-control" placeholder="From">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">From To</label>
                                <div class="input-group date" id="datetimepickerTo">
                                    <input type="text" name="form_to" class="form-control" placeholder="To">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <hr>

                <?php msg(); ?>
                <div class="table-responsive">
                    <table id="parcelList" class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Parcel No</th>
                                <th>Sender Contact</th>
                                <th>Sender Branch</th>
                                <th>Receiver Contact</th>
                                <th>Receiver Branch</th>
                                <th>Net Amount</th>
                                <th>Delivery Type</th>
                                <th>Status</th>
                                <th class="text-center none" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>10/12/2020</td>
                                <td>D-1023</td>
                                <td>01910217482</td>
                                <td>Mymensingh</td>
                                <td>01910217482</td>
                                <td>Mymensingh</td>
                                <td>320</td>
                                <td>KG</td>
                                <td>
                                    <a href="#" class="text-success">
                                        <b>Confirmed Booking</b>
                                    </a>
                                </td>
                                <td class="text-center none">
                                    <a href="<?php echo site_url('booking_parcel/booking_parcel/print')?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                    <?php
                                        if($action_menus){
                                        foreach($action_menus as $action_menu){
                                            if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                            // -----------------------------------------------------------
                                            if(strtolower($action_menu->name) == "delete" ){?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        onclick="return confirm('Are your sure to proccess this action ?')"
                                        href="<?php echo get_url($action_menu->controller_path."/"); ?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                    <a class="btn btn-<?php echo $action_menu->type;?>"
                                        href="<?php echo get_url($action_menu->controller_path."/") ;?>"><i
                                            class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                    <!---------------------------------------->
                                    <?php }}}} ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
    $(document).ready(function() {
        $('#parcelList').DataTable();
    });

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