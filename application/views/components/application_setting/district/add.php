<style>
.district-border {
    border: 3px solid red !important;
}
</style>
<div class="container-fluid" ng-controller="dsitrictCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New District</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" ng-model="district"
                                    ng-change="duplicateDistrictEntryFn()" placeholder="District Name"
                                    class="form-control" ng-class="districName" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Service Area <span class="req">*</span></label>
                                <select name="service_area_code" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Service Area</option>
                                    <?php
                                        if(!empty($service_area)){
                                            foreach($service_area as $area){
                                    ?>
                                    <option value="<?= $area->service_area_code;?>"><?= $area->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Home Delivery <span class="req">*</span></label>
                                <select name="home_delivery" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Delivery</option>
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Lock Down Service <span class="req">*</span></label>
                                <select name="lock_down_service" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Delivery</option>
                                    <option value="No" selected>No</option>
                                    <option value="Yes">Yes</option>
                                </select>
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
app.controller("dsitrictCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.duplicateDistrictEntryFn = () => {

        if (typeof $scope.district != 'undefined') {
            var where = {
                table: "districts",
                cond: {
                    'name': $scope.district
                },
                select: ['name']
            };

            $http({
                method: "POST",
                url: angularUrl + "result",
                data: where,
            }).success(function(response) {

                if (response.length > 0) {
                    $scope.districName = 'district-border';
                    alert($scope.district + " Name already taken.");
                    $scope.district = '';
                } else {
                    $scope.districName = '';
                }
            });
        }
    }

}]);
</script>