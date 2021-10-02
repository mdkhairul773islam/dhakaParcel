<div class="container-fluid" >
    <div class="panel panel-default none">
        <div class="panel-heading">
            <div class="panal-header-title pull-left">
                <h1>Search Data</h1>
            </div>
        </div>
        <div class="panel-body">
            <?php
            $attr = array(
                "class" => "form-horizontal",
                "id" => "search_data"
            );
            echo form_open("access_info/access_info", $attr);
            ?>
            <div class="form-group">   
                <div class="col-md-3">
                    <div class="input-group date datetimepickerTo" >
                        <input type="text" name="from" class="form-control"  placeholder="From">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="col-md-1">
                    <input type="submit" value="Show" name="show" class="btn btn-primary">
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

     <div class="panel panel-default">      
        <div class="panel-heading">
            <div class="panal-header-title pull-left">
                <h1>Activity Log</h1>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 50px;">SL</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>User</th>
                    <th>Os</th>
                    <th>Browser</th>
                    <th>Acess Time </th>
                </tr>

                <?php 
                $total = $totalDedit = $totalCredit = 0.00;
                foreach($resultset as $key => $row) { 
                ?>
                <tr>
                    <td> <?php echo ($key + 1); ?> </td>
                    <td> <?php $date = explode(' ',$row->login_period); echo $date[0]; ?> </td>
                    <td> <?php echo $date[1] ; ?> </td>
                    <td>
                        <?php
                            $user_id = $row->user_id;
                            $user = get_result('users',array('id' => $user_id));
                            if(!empty($user)){
                                echo $user[0]->name;
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                        $os = $row->os;
                        if (strpos($os, 'Unknown') !== false) {
                                $os_arr = explode('Unknown',$os);
                                echo $os_arr[1];
                        }else{
                            echo $os;
                        } 
                        ?>        
                    </td>
                    <td><?php echo $row->browser; ?></td>
                    <td> 
                       <?php
                            if($row->logout_period != '0000-00-00 00:00:00')
                            {
                                $date1 = strtotime($row->logout_period);  
                                $date2 = strtotime($row->login_period);  
                         
                                $hour = abs($date1 - $date2)/3600;
                                $min = abs($date1 - $date2)/60;
                
                                if($hour <1){

                                }else{
                                    echo number_format($hour).':';
                                }
                                $tot_min = round($min);
                                $tot_hour_min = round($hour)*60;
                                echo $tot_min - $tot_hour_min;
                                echo '&nbsp; min';
                           }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </table> 
        </div>
        <div class="panel-footer">&nbsp;</div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datetimepickerTo').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        });
    });    
</script>