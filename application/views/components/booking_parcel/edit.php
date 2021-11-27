<style>
    fieldset {
        border: 1px solid #3A3F51;
        padding: 5px 12px 0;
        margin: 8px 0 10px;
    }
    legend {
        background-color: #3A3F51;
        margin-bottom: 0;
        font-size: 17px;
        color: #fff;
        font-weight: 500;
        width: auto;
        padding: 2px 10px;
        display: inline-block;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Booking Parcel</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Parcel Booking Type <span class="req">*</span></label>
                                <select name="booking_type" class="form-control" data-live-search="true" required>
                                    <option value="Cash" selected disabled>Cash</option>
                                    <option value="To Pay">To Pay</option>
                                    <option value="Credit">Credit</option>
                                    <option value="Condition">Condition</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Pickup <span class="req">*</span></label>
                                <select name="booking_type" class="form-control" data-live-search="true" required>
                                    <option value="Yes" selected disabled>Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Merchant <span class="req">*</span></label>
                                <select name="merchant" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Merchant</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Rider <span class="req">*</span></label>
                                <select name="rider" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Rider</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <legend>Sender Information</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Contact Number <span class="req">*</span></label>
                                            <input type="text" name="sender_contact" placeholder="Contact Number" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Name <span class="req">*</span></label>
                                            <input type="text" name="sender_name" placeholder="Sender Name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Address <span class="req">*</span></label>
                                            <input type="text" name="sender_address" placeholder="Sender Address" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">National ID <span class="req">*</span></label>
                                            <input type="text" name="sender_national_id" placeholder="Sender National ID" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Division <span class="req">*</span></label>
                                            <select name="sender_division" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Division</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span class="req">*</span></label>
                                            <select name="sender_district" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select District</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Upazila/Thana <span class="req">*</span></label>
                                            <select name="sender_upazila" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Upazila/Thana</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Area <span class="req">*</span></label>
                                            <select name="sender_area" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Area</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <legend>Receiver Information</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Contact Number <span class="req">*</span></label>
                                            <input type="text" name="receiver_contact" placeholder="Contact Number" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Name <span class="req">*</span></label>
                                            <input type="text" name="receiver_name" placeholder="Receiver Name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Address <span class="req">*</span></label>
                                            <input type="text" name="receiver_address" placeholder="Receiver Address" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">National ID <span class="req">*</span></label>
                                            <input type="text" name="receiver_national_id" placeholder="Receiver National ID" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Division <span class="req">*</span></label>
                                            <select name="receiver_division" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Division</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">District <span class="req">*</span></label>
                                            <select name="receiver_district" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select District</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Upazila/Thana <span class="req">*</span></label>
                                            <select name="receiver_upazila" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Upazila/Thana</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Area <span class="req">*</span></label>
                                            <select name="receiver_area" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Area</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <legend>Destination Branch & Parcel Type</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Destination Branch <span class="req">*</span></label>
                                            <select name="destination_branch" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Branch</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Delivery Type <span class="req">*</span></label>
                                            <select name="delivery_type" class="form-control" data-live-search="true" required>
                                                <option value="" selected disabled>Select Type</option>
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Note <span class="req">*</span></label>
                                            <input type="text" name="note" placeholder="Enter Note" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 45px;">SL.No</th>
                                <th>Category Name</th>
                                <th>Item Name</th>
                                <th style="width: 70px;" class="text-center">Unit</th>
                                <th style="width: 100px;" class="text-center">Unit Price</th>
                                <th style="width: 90px;" class="text-center">Quantity</th>
                                <th style="width: 100px;" class="text-right">Total</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Book and Stationary</td>
                                <td>Book</td>
                                <td class="text-center">6</td>
                                <td class="text-center">600</td>
                                <td class="text-center">10</td>
                                <td class="text-right">6900</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Book and Stationary</td>
                                <td>Book</td>
                                <td class="text-center">6</td>
                                <td class="text-center">600</td>
                                <td class="text-center">10</td>
                                <td class="text-right">6900</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Book and Stationary</td>
                                <td>Book</td>
                                <td class="text-center">6</td>
                                <td class="text-center">600</td>
                                <td class="text-center">10</td>
                                <td class="text-right">6900</td>
                            </tr>
                            <tr>
                                <td colspan="3" rowspan="10"></td>
                                <th class="text-right" colspan="3">Total</th>
                                <th class="text-right">6900</th>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="3">Grand Total</th>
                                <th class="text-right">6900</th>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="3">Discount Percentage(%)</th>
                                <th class="text-right">6900</th>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="3">Discount Amount</th>
                                <th class="text-right">230</th>
                            </tr>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>