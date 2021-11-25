<div class="container-fluid" ng-controller="roadMappingCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Road Mapping</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php 
                    echo msg();
                ?>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" name="date" value="<?= date('Y-m-d'); ?>" class="form-control" placeholder="From">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <table class="table table-bordered" ng-cloak>
                        <tr>
                            <th>SL</th>
                            <th>Car Number</th>
                            <th>Engine No</th>
                            <th>Chassis No</th>
                            <th>Driver Name</th>
                            <th>Mobile</th>
                            <th>Road Mapping</th>
                        </tr>
                        <tr ng-repeat="(index, item) in roadsMap">
                            <td>
                                {{ index+1 }}
                                <input type="hidden" name="transport_code[]" ng-value="item.code" required>
                            </td>
                            <td>{{ item.car_number }}</td>
                            <td>{{ item.engine_no }}</td>
                            <td>{{ item.chassis_no }}</td>
                            <td>{{ item.driver_name }}</td>
                            <td>{{ item.driver_mobile }}</td>
                            <td>
                                <select name="road[]" class="form-control" required>
                                    <option value="">Select Road</option>
                                    <?php 
                                        foreach($roads as $road){
                                    ?>
                                    <option value="<?php echo $road->id; ?>"><?= filter($road->road_name); ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                    <hr />
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
    
    
    
//SMS Controller
app.controller("roadMappingCtrl", [
  "$scope",
  "$log",
  "$http",
  function ($scope, $log, $http) {
      
      $scope.roadsMap = [];
      
      var where = {
        table: "transport",
        cond: {'trash': 0},
        select: [],
      };

      $http({
        method: "POST",
        url: angularUrl + "result",
        data: where,
      }).success(function (response) {
        console.log('response', response);
        if (response.length > 0) {
         $scope.roadsMap = response
        } else {
            $scope.roadsMap = [];
        }
        
      });


  },
]);
</script>

