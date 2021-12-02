<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Raider</h1>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-secondary"><?= ucfirst($rider[0]->status); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Name</th>
                            <td width="70%">
                                <?= ucfirst($rider[0]->name); ?>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Rider ID</th>
                            <td width="70%">
                                <?= ucfirst($rider[0]->rider_code); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>
                                <?= ucfirst($rider[0]->address); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>
                                <?php 
                                    $branch = get_row('branch', ['code'=>$rider[0]->branch, 'trash'=>0]);
                                    $upazila = get_name('upazilas', 'name', ['id'=>$branch->upazila_id, 'trash'=>0]);
                                    $district = get_name('districts', 'name', ['id'=>$branch->district_id, 'trash'=>0]);
                                    $area = get_name('area', 'name', ['id'=>$branch->area_id, 'trash'=>0]);
                                    echo $district;
                               ?>

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
                            <th>Branch</th>
                            <td>
                                <?= $branch->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                                <?= ucfirst($rider[0]->mobile); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= ucfirst($rider[0]->email); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>
                                <?= ucfirst($rider[0]->username); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <img style="width: 120px; height: 120px;" src="<?= site_url($rider[0]->image); ?>"
                                    alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>