<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Rider Payment</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th width="300">Description</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>

                    <tr>
                        <td>01</td>
                        <td><img src="" alt="" height="35" width="40"></td>
                        <td>Demo Name</td>
                        <td>Demo Designation</td>
                        <td>Demo Description</td>
                        <td class="text-right">
                            <a class="btn btn-warning" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
