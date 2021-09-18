<style>
    .action_td .btn {padding: 2px 8px !important;}
    .action_td {
        vertical-align: middle !important;
        padding: 0 8px !important;
    }
</style>
    
<div class="panel panel-default">
    <div class="panel-heading panal-header">
        <div class="panal-header-title pull-left">
            <h1>All Booking</h1>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="division" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="" selected disable>Select Division</option>
                            <option value="">Division One</option>
                            <option value="">Division Two</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search[name]" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="search[mobile]" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Search">
                    </div>
                </div>
            </div>
        </form>
        <hr>
        
        <?php msg(); ?>
         
        <table class="table table-bordered">
            <tr>
                <th style="width: 45px;">SL</th>
                <th>Name</th>
                <th>Product Name</th>
                <th style="width: 140px;">Mobile No</th>
                <th style="width: 120px;">Division</th>
                <th style="width: 120px;">Status</th>
                <th class="text-right">Action</th>
            </tr>
           
            <tr>
                <td>01</td>
                <td>Demo</td>
                <td>Demo</td>
                <td>Demo</td>
                <td>Demo</td>
                <td>Demo</td>
                <td width="115" class="action_td text-right">
                    <a class="btn btn-primary" href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-danger" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>