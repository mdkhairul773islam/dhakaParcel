<div class="container-fluid" ng-controller="serviceSettingCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Service Area Setting</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Service Area <span class="req">*</span></label>
                                <select name="service_area_code" ng-model="service_area_code"
                                    ng-change="getWeightPackage()" class="form-control" required>
                                    <option value="" selected disabled>Select Service Area</option>
                                    <?php
                                        if(!empty($serviceArea)){
                                            foreach($serviceArea as $area){
                                    ?>
                                    <option value="<?= $area->service_area_code; ?>"><?= $area->name; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div ng-repeat="package in weightPackageList">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" ng-bind="package.name"><span
                                            class="req">*</span></label>
                                    <input type="hidden" name="weight_package_id[]" ng-value="package.wp_id"
                                        placeholder="Upto 1 kg" class="form-control" required>
                                    <input type="number" name="rate[]" placeholder="0" ng-value="package.rate"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" name="save" value="Submit" class="btn btn-success">
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
app.controller("serviceSettingCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.weightPackageList = [];
    $scope.getWeightPackage = () => {

        var where = {
            table: "weight_package",
            cond: {
                'trash': 0
            }
        };

        $http({
            method: "POST",
            url: angularUrl + "result",
            data: where,
        }).success(function(response) {
            if (response.length > 0) {
                $scope.weightPackageList = response;
            } else {
                $scope.weightPackageList = [];
            }
        });


        var whereWeignt = {
            table: "service_area_setting",
            cond: {
                'service_area_code': $scope.service_area_code,
                'trash': 0
            },
        };

        $http({
            method: "POST",
            url: angularUrl + "result",
            data: whereWeignt,
        }).success(function(responseWeight) {

            if (responseWeight.length > 0) {
                angular.forEach(responseWeight, function(value, index) {
                    $scope.weightPackageList[index].rate = parseFloat(value.rate);
                });
            }
        });
    }

}]);
</script>