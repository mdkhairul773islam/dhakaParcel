<div class="container-fluid" ng-controller="branchController">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Branch</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" placeholder="Branch Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address <span class="req">*</span></label>
                                <input type="text" name="address" placeholder="Branch Address" class="form-control"
                                    required>
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
                                <label class="control-label">Contact Number <span class="req">*</span></label>
                                <input type="text" name="contact_number" placeholder="Branch Contact Number"
                                    class="form-control" required>
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
                                <label class="control-label">Image </label>
                                <input type="file" name="image" placeholder="Image" class="form-control">
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
app.controller("branchController", ["$scope", "$log", "$http", function($scope, $log, $http) {

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