<div class="container-fluid" ng-controller="editAreaControler">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Area</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label">Districts </label>
                                <select ui-select2="{allowClear: true}" name="district_id" ng-model="district_id"
                                    ng-init="district_id='<?= $area->district_id?>'" class="form-control"
                                    ng-change="getThanaUpazalaFn()" required>
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
                                <label class="control-label">Thana/Upazila </label>
                                <select ui-select2="{allowClear: true}" name="upazila_id"
                                    ng-init="upazila_id='<?= $area->upazila_id?>'" class="form-control"
                                    ng-model="upazila_id" data-placeholder="Select Thana/Upazila">
                                    <option value="" selected disable></option>
                                    <option ng-repeat="row in thanaUpazilaList" value="{{row.id}}">{{row.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $area->name; ?>" placeholder="Area Name"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Post Code </label>
                                <input type="text" name="post_code" value="<?= $area->post_code; ?>"
                                    placeholder="Area Post Code" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" name="update" value="Update" class="btn btn-success">
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
app.controller("editAreaControler", ["$scope", "$http", function($scope, $http) {

    $scope.$watch('district_id', function(district_id) {

        $scope.getThanaUpazalaFn = () => {

            $scope.thanaUpazilaList = [];
            var where = {
                table: "upazilas",
                cond: {
                    'district_id': district_id
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
        $scope.getThanaUpazalaFn();
    });
}]);
</script>