<div class="container-fluid" ng-controller="areaControler">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Area</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Districts <span class="req">*</span></label>
                                <select name="district_id" ng-model="district_id" class="form-control selectpicker"
                                    data-live-search="true" ng-change="getThanaUpazalaFn()" required>
                                    <option value="" selected disabled>Select Districts</option>
                                    <?php 
                                        foreach($districts as $row){
                                    ?>
                                    <option value="<?= $row->district_id; ?>"><?= ucfirst($row->name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thana/Upazila <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" name="upazila_id" class="form-control"
                                    ng-model="upazila_id" data-placeholder="Select Thana/Upazila">
                                    <option value="" selected disable></option>
                                    <option ng-repeat="row in thanaUpazilaList" value="{{row.id}}">{{row.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" ng-model="areaName" ng-change="duplicateAreaEntryFn()"
                                    placeholder="Area Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Post Code <span class="req">*</span></label>
                                <input type="text" name="post_code" placeholder="Area Post Code" class="form-control"
                                    required>
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
app.controller("areaControler", ["$scope", "$log", "$http", function($scope, $log, $http) {

    $scope.getThanaUpazalaFn = () => {

        $scope.thanaUpazilaList = [];
        var where = {
            table: "upazilas",
            cond: {
                'district_id': $scope.district_id
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

    $scope.duplicateAreaEntryFn = () => {

        if (typeof $scope.areaName != 'undefined' && typeof $scope.upazila_id != 'undefined') {
            var where = {
                table: "area",
                cond: {
                    'name': $scope.areaName,
                    'upazila_id': $scope.upazila_id,
                    'trash': 0
                },
                select: ['name']
            };

            $http({
                method: "POST",
                url: angularUrl + "result",
                data: where,
            }).success(function(response) {
                if (response.length > 0) {
                    alert($scope.areaName + " Name already taken.");
                    $scope.areaName = '';
                }
            });
        }
    }

}]);
</script>