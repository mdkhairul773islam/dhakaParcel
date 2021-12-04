<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Warehouse</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-secondary"><?php echo filter($info->status); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Name</th>
                            <td width="70%">
                            <?php echo $info->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Warehouse</th>
                            <td width="70%">
                            <?php echo get_name('warehouse', 'name', ['code' => $info->branch]); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>
                               <?php echo $info->address; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                            <?php echo $info->mobile; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                            <?php echo $info->email; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>
                            <?php echo $info->username; ?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <th>Password</th>
                            <td>
                                shaokat71@stitbd.com
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>