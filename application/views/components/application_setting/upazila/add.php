<div class="container-fluid" ng-controller="upazilaControler">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Thana/Upazila</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                    msg();
                 ?>
                <form action="" method="post" enctype="multipart/form-data">
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
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" ng-value="thanaUpazilaList"
                                    placeholder="Thana/Upazila Name" class="form-control" required>
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
app.controller("upazilaControler", ["$scope", "$http", function($scope, $http) {

    $scope.getThanaUpazalaFn = () => {

        $scope.thanaUpazilaList = '';
        var where = {
            table: "upazilas",
            cond: {
                'district_id': $scope.district_id
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

}]);
</script>