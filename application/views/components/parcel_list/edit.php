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
    fieldset ul li strong {
        display: inline-block;
        min-width: 120px;
    }
    fieldset ul li {
        border-bottom: 1px solid #ccc;
        min-width: calc(220px - 20px);
        display: inline-block;
        margin: 2px 10px;
        width: calc(50% - 20px);
        padding: 5px 0;
    }
    fieldset ul::after {
        width: calc(100% - 20px);
        display: inline-block;
        content: '';
        height: 1px;
        left: 10px;
        top: 0;
        background: #ccc;
        position: absolute;
    }
    fieldset ul {
        margin-bottom: 15px;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        margin-left: -10px;
        margin-right: -10px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit New Parcel</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Parcel Information</legend>
                        <ul>
                            <li><strong>Invoice</strong> : 20211115-00036</li>
                            <li><strong>Date</strong> : 28/11/2021</li>
                            <li><strong>Current Status</strong> : 	Delivery Rider Request Accept</li>
                        </ul>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Pickup Branch <span class="req">*</span></label>
                                    <select name="pickup_branch" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Pickup Branch</option>
                                        <option value="Main Branch">Main Branch</option>
                                        <option value="Uttara Branch">Uttara Branch</option>
                                        <option value="Aftabnagar">Aftabnagar</option>
                                        <option value="Raipur">Raipur</option>
                                        <option value="Bhaluka">Bhaluka</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Pickup Rider <span class="req">*</span></label>
                                    <select name="pickup_rider" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Pickup Rider</option>
                                        <option value="Main Branch">Nur Islam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Delivery Branch <span class="req">*</span></label>
                                    <select name="delivery_branch" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Delivery Branch</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Delivery Rider <span class="req">*</span></label>
                                    <select name="pickup_rider" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Delivery Rider</option>
                                        <option value="Main Branch">Nur Islam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Parcel Status <span class="req">*</span></label>
                                    <select name="pickup_rider" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Parcel Status</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Merchant Information</legend>
                        <ul>
                            <li><strong>Merchant Name</strong> : Md. Shaokat Hossain</li>
                            <li><strong>Merchant Contact</strong> : 01910217482</li>
                            <li><strong>Branch</strong> : Main Branch</li>
                            <li><strong>Branch Contact Number</strong> : 01910217482</li>
                            <li><strong>Branch Address</strong> : 68/F, Level-1-2,Green Road,</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>Parcel Charge</legend>
                        <ul>
                            <li><strong>Weight Package</strong> : 4 kg to 5 kg</li>
                            <li><strong>Cod Percent</strong> : 1%</li>
                            <li><strong>Weight Charge</strong> : 100.00</li>
                            <li><strong>Cod Charge</strong> : 0.00</li>
                            <li><strong>Delivery Charge</strong> : 130.00</li>
                            <li><strong>Total Charge</strong> : 230.00</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>Customer Information</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Customer Name</label>
                                    <input type="text" name="customer_name" placeholder="Customer Name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Customer Contact Number</label>
                                    <input type="text" name="customer_contact_number" placeholder="Customer Contact Number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Customer Address</label>
                                    <input type="text" name="customer_address" placeholder="Customer Address" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">District <span class="req">*</span></label>
                                    <select name="district" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select District</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Upazila/Thana <span class="req">*</span></label>
                                    <select name="upazila" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Upazila/Thana</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Area <span class="req">*</span></label>
                                    <select name="area" class="form-control" data-live-search="true" required>
                                        <option value="" selected disabled>Select Area</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Parcel Information</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Weight Package</label>
                                    <select name="weight_package" class="form-control" data-live-search="true">
                                        <option value="" selected disabled>Select Weight Package</option>
                                        <option value="0"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Delivery Option</label>
                                    <select name="delivery_option" class="form-control" data-live-search="true">
                                        <option value="Cash On Delivery" selected>Cash On Delivery</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Bank">Bank</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Product(s) Brief</label>
                                    <input type="text" name="product_brief" placeholder="Product Details" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Total Collection Amount</label>
                                    <input type="text" name="collection_amount" placeholder="0.00" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>

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