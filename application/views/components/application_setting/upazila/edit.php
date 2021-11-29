<div class="container-fluid" ng-controller="editUpazilaControler">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Thana/Upazila</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $upazila->id; ?>"
                        ng-init="upazila_id='<?= $upazila->id;?>'">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Districts <span class="req">*</span></label>
                                <select ui-select2="{allowClear: true}" name="district_id" ng-model="district_id"
                                    ng-init="district_id='<?= $upazila->district_id?>'" class="form-control"
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
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" ng-value="thanaUpazilaList"
                                    placeholder="Thana/Upazila Name" class="form-control" required>
                            </div>
                        </div>
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

<script>
app.controller("editUpazilaControler", ["$scope", "$http", function($scope, $http) {

    $scope.$watchGroup(['district_id', 'upazila_id'], function(upazilaInfo) {

        $scope.getThanaUpazalaFn = () => {

            $scope.thanaUpazilaList = '';
            var where = {
                table: "upazilas",
                cond: {
                    'district_id': upazilaInfo[0],
                    'id': upazilaInfo[1]
                },
                select: ['id', 'name']
            };

            $http({
                method: "POST",
                url: angularUrl + "result",
                data: where,
            }).success(function(response) {
                if (response.length > 0) {
                    $scope.thanaUpazilaList = response[0].name;
                } else {
                    $scope.thanaUpazilaList = '';
                }
            });
        }
        $scope.getThanaUpazalaFn();
    });
}]);
</script>