<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Merchant</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Company Name<span class="req">*</span></label>
                                <input type="text" name="company_name" placeholder="Company Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" placeholder="Branch Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address <span class="req">*</span></label>
                                <textarea name="address" class="form-control" placeholder="Full Address"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Address <span class="req">*</span></label>
                                <textarea name="business_address" class="form-control"
                                    placeholder="Business Address"></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Districts <span class="req">*</span></label>
                                <select name="districts" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Districts</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Thana/Upazila <span class="req">*</span></label>
                                <select name="thana_upazila" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Thana/Upazila</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Area <span class="req">*</span></label>
                                <select name="area" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Area</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch <span class="req">*</span></label>
                                <select name="area" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Branch</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="req">*</span></label>
                                <input type="text" name="contact_number" placeholder="Branch Contact Number"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Facebook<span class="req">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">http://</span>
                                    <input type="text" name="Facebook" class="form-control"
                                        placeholder="Merchant Facebook Url" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Website<span class="req">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">http://</span>
                                    <input type="text" name="Facebook" class="form-control"
                                        placeholder="Merchant Website Url" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Image <span class="req">*</span></label>
                                <input type="file" name="image" placeholder="Image" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Password <span class="req">*</span></label>
                                <input type="password" name="password" placeholder="Password" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">COD % <span class="req">*</span></label>
                                <input type="number" name="cod" placeholder="COD %" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Service Area Delivery Charge</label>
                            <hr class="my-1" style="border: 1px dotted #111">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Inside Dhaka Delivery Charge<span
                                        class="req">*</span></label>
                                <input type="number" name="inside_dhaka_charge" value="35"
                                    placeholder="Inside Dhaka Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Dhaka Sub Delivery Charge<span class="req">*</span></label>
                                <input type="number" name="dhaka_sub_delivery_charge" value="100"
                                    placeholder="Dhaka Sub Delivery Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Outside Dhaka Delivery Charge<span
                                        class="req">*</span></label>
                                <input type="number" name="outside_dhaka_delivery_charge" value="130"
                                    placeholder="Outside Dhaka Delivery Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Test Delivery Charge<span class="req">*</span></label>
                                <input type="number" name="test_delivery_charge" value="15"
                                    placeholder="Test Delivery Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label">Service Area Delivery Charge</label>
                            <hr class="my-1" style="border: 1px dotted #111">
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Inside Dhaka Return Charge<span
                                        class="req">*</span></label>
                                <input type="number" name="inside_dhaka_return_charge"
                                    placeholder="Inside Dhaka Return Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Dhaka Sub Return Charge<span class="req">*</span></label>
                                <input type="number" name="dhaka_sub_return_charge"
                                    placeholder="Dhaka Sub Return Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Outside Dhaka Return Charge<span
                                        class="req">*</span></label>
                                <input type="number" name="outside_dhaka_return_charge"
                                    placeholder="Outside Dhaka Return Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Test Return Charge<span class="req">*</span></label>
                                <input type="number" name="test_return_charge" placeholder="Test Return Charge"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Account Name<span class="req">*</span></label>
                                <input type="number" name="bank_account_name" placeholder="Bank Account Name"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Account Number<span class="req">*</span></label>
                                <input type="number" name="bank_account_number" placeholder="Bank Account Number"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Name<span class="req">*</span></label>
                                <input type="number" name="bank_number" placeholder="Bank Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">BKash Number<span class="req">*</span></label>
                                <input type="text" name="bKash_number" placeholder="BKash Number" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Nagad Number<span class="req">*</span></label>
                                <input type="text" name="nagad_number" placeholder="Nagad Number" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Rocket Number<span class="req">*</span></label>
                                <input type="text" name="rocket_number" placeholder="Rocket Number" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">NID Card <span class="req">*</span></label>
                                <input type="file" name="nid_card" placeholder="NID Card" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Trade License <span class="req">*</span></label>
                                <input type="file" name="trade_license" placeholder="Trade License" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">TIN Certificate <span class="req">*</span></label>
                                <input type="file" name="tin_certificate" placeholder="TIN Certificate"
                                    class="form-control" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Save" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>