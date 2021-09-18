<style>
    .table tr td {vertical-align: middle !important;}
</style>
<div class="container-fluid">
    <div class="row">
    <?php msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>View All Profile</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php
                    if ($profiles != NULL) {
                ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="select" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option value="" selected disable>Select Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="select" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                                    <option selected disable>Select Zone</option>
                                </select>
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
                <table class="table table-bordered">
                    <tr>
                        <th width="45px">SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Privilege</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach ($profiles as $key => $value) { ?>
                    <tr>
                        <td><?php echo($key + 1); ?></td>
                        <td style="width: 55px; padding: 2px;"><img src="<?php echo site_url($value->image); ?>" alt="" style="width: 55px; height: 55px;"></td>
                        <td><?php echo filter($value->name); ?></td>
                        <td><?php echo $value->username; ?></td>
                        <td><?php echo filter($value->privilege); ?></td>
                        <td style="width: 160px;">
                            <a class="btn btn-info" href="<?php echo site_url("settings/showProfile?id=" . $value->id); ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="<?php echo site_url("settings/editProfile?id=" . $value->id); ?>">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a onclick="return confirm('This Data will delete permanently')" class="btn btn-danger" href="<?php echo site_url("settings/allProfile?img_url=".$value->image."&id=" . $value->id); ?>">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

                <?php } else {
                    echo "<h3 style='text-align:center;'>No Accounts Available !</h3>";
                }
                ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
