<div class="container-fluid" ng-controller="marchantController">
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
                                <input type="text" name="name" placeholder="Merchant Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address <span class="req">*</span></label>
                                <textarea name="address" class="form-control" placeholder="Merchant Address"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Business Address </label>
                                <textarea name="business_address" class="form-control"
                                    placeholder="Business Address"></textarea>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label class="control-label">Districts <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" name="district_id"
                                    ng-change="getThanaUpazalaFn()" class="form-control" ng-model="district_id"
                                    data-placeholder="Select Districts">
                                    <option value="" selected disable></option>
                                    <?php 
                                        foreach($districtList as $distric){
                                    ?>
                                    <option value="<?= $distric->id; ?>"><?= $distric->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Thana/Upazila <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" name="upazila_id" ng-change="getAreaFn()"
                                    class="form-control" ng-model="upazila_id" data-placeholder="Select Thana/Upazila">
                                    <option value="" selected disable></option>
                                    <option ng-repeat="row in thanaUpazilaList" value="{{row.id}}">{{row.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Area <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" name="area_id" class="form-control"
                                    ng-model="area_id" data-placeholder="Select Area">
                                    <option value="" selected disable></option>
                                    <option ng-repeat="row in areaList" value="{{row.id}}">{{row.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" ng-model="branch_id" name="branch"
                                    class="form-control" data-placeholder="Select Branch" required>
                                    <option value="" selected disabled></option>
                                    <?php 
                                            foreach($branchList as $branch){
                                        ?>
                                    <option value="<?= $branch->code; ?>"><?= $branch->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="req">*</span></label>
                                <input type="text" name="mobile" placeholder="Branch Contact Number"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">http://</span>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="Merchant Facebook Url" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Website</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">http://</span>
                                    <input type="text" name="website" class="form-control"
                                        placeholder="Merchant Website Url" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Image </label>
                                <input type="file" name="image" placeholder="Image" class="form-control">
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
                                <label class="control-label">Username <span class="req">*</span></label>
                                <input type="text" name="username" placeholder="Username" class="form-control" required>
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
                                <label class="control-label">COD % </label>
                                <input type="number" name="cod" placeholder="COD %" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Service Area Delivery Charge</label>
                            <hr class="my-1" style="border: 1px dotted #111">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Inside Dhaka Delivery Charge</label>
                                <input type="number" name="inside_dhaka_charge" value="35"
                                    placeholder="Inside Dhaka Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Dhaka Sub Delivery Charge</label>
                                <input type="number" name="dhaka_sub_delivery_charge" value="100"
                                    placeholder="Dhaka Sub Delivery Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Outside Dhaka Delivery Charge</label>
                                <input type="number" name="outside_dhaka_delivery_charge" value="130"
                                    placeholder="Outside Dhaka Delivery Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Test Delivery Charge</label>
                                <input type="number" name="test_delivery_charge" value="15"
                                    placeholder="Test Delivery Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label">Service Area Return Charge</label>
                            <hr class="my-1" style="border: 1px dotted #111">
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Inside Dhaka Return Charge</label>
                                <input type="number" name="inside_dhaka_return_charge"
                                    placeholder="Inside Dhaka Return Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Dhaka Sub Return Charge</label>
                                <input type="number" name="dhaka_sub_return_charge"
                                    placeholder="Dhaka Sub Return Charge" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Outside Dhaka Return Charge</label>
                                <input type="number" name="outside_dhaka_return_charge"
                                    placeholder="Outside Dhaka Return Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Test Return Charge</label>
                                <input type="number" name="test_return_charge" placeholder="Test Return Charge"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Account Name</label>
                                <input type="text" name="bank_account_name" placeholder="Bank Account Name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Account Number</label>
                                <input type="text" name="bank_account_number" placeholder="Bank Account Number"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Bank Name</label>
                                <input type="text" name="bank_name" placeholder="Bank Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">BKash Number</label>
                                <input type="text" name="bKash_number" placeholder="BKash Number" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Nagad Number</label>
                                <input type="text" name="nagad_number" placeholder="Nagad Number" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Rocket Number</label>
                                <input type="text" name="rocket_number" placeholder="Rocket Number"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">NID Card </label>
                                <input type="file" name="nid_card" placeholder="NID Card" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Trade License </label>
                                <input type="file" name="trade_license" placeholder="Trade License"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">TIN Certificate </label>
                                <input type="file" name="tin_certificate" placeholder="TIN Certificate"
                                    class="form-control">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" name="save" value="Save" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
app.controller("marchantController", ["$scope", "$log", "$http", function($scope, $log, $http) {

    $scope.getThanaUpazalaFn = () => {

        $scope.thanaUpazilaList = [];
        var where = {
            table: "upazilas",
            cond: {
                'district_id': $scope.district_id,
                'status': 'active',
                'trash': 0,
            },
            select: ['id', 'name'],
            groupBy: '',
            order_col: 'name',
            order_by: 'ASC'
        };

        $http({
            method: "POST",
            url: angularUrl + "result",
            data: where,
        }).success(function(response) {
            if (response.length > 0) {
                $scope.thanaUpazilaList = response;
            } else {
                $scope.thanaUpazilaList = [];
            }
        });
    }

    $scope.getAreaFn = () => {

        $scope.areaList = [];
        var where = {
            table: "area",
            cond: {
                'district_id': $scope.district_id,
                'upazila_id': $scope.upazila_id,
                'status': 'active',
                'trash': 0,
            },
            select: ['id', 'name'],
            groupBy: '',
            order_col: 'name',
            order_by: 'ASC'
        };

        $http({
            method: "POST",
            url: angularUrl + "result",
            data: where,
        }).success(function(responseArea) {
            if (responseArea.length > 0) {
                $scope.areaList = responseArea;
            } else {
                $scope.areaList = [];
            }
        });
    }
}]);
</script>