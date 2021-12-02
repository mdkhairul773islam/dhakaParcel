<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Branch User</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">
                                <img src="<?= site_url($branch->image); ?>" class="img-fluid img-thumbnail"
                                    style="height: 100px" alt="branch User">
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="bg-success"><?= ucwords($branch->status); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Name</th>
                            <td width="70%">
                                <?= $branch->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Branch</th>
                            <td>
                                <?php
                                    $get_branch = get_row('branch', ['code'=>$branch->branch, 'trash'=> 0]);
                                    $district = get_name('districts', 'name', ['id'=>$get_branch->district_id, 'trash'=>0]);
                                    $upazila = get_name('upazilas', 'name', ['id'=>$get_branch->upazila_id, 'trash'=>0]);
                                    $area = get_name('area', 'name', ['id'=>$get_branch->area_id, 'trash'=>0]);
                                    echo $get_branch->name;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>
                                <?= $branch->address; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>
                                <?= $district; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Thana/Upazila</th>
                            <td>
                                <?= $upazila; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Area</th>
                            <td>
                                <?= $area; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                                <?= $branch->mobile; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= $branch->email; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>