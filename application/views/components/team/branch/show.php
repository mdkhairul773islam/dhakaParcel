<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Branch</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th><?= filter($branch->status); ?></th>
                            <td>
                                <span class="badge bg-secondary">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Name</th>
                            <td width="70%">
                                <?= $branch->name; ?>
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
                                <?php 
                                    $district = get_name('districts', 'name', ['id'=> $branch->district_id, 'trash'=> 0]);
                                    $upazila = get_name('upazilas', 'name', ['id'=> $branch->upazila_id, 'trash'=> 0]);
                                    $area   = get_name('area', 'name', ['id'=> $branch->area_id, 'trash'=> 0]);
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
                            <th>Contact Number</th>
                            <td>
                                <?= $branch->contact_number; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= $branch->email; ?>
                            </td>
                        </tr>

                        <?php 
                            $register_branch_list = get_result('users', ['privilege'=>'branch', 'trash'=>0]);
                            $merchant_list = get_result('users', ['privilege'=>'merchant', 'trash'=>0]);
                            $rider_list = get_result('users', ['privilege'=>'rider', 'trash'=>0]);
                        ?>

                        <tr>
                            <th>Branch User List</th>
                            <td>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="30%">Name</th>
                                            <th width="30%">Address
                                            </th>
                                            <th width="30%">Contact Number
                                            </th>
                                        </tr>
                                        <?php 
                                            if(!empty($register_branch_list)){
                                                foreach($register_branch_list as $key => $branchList){
                                        ?>
                                        <tr>
                                            <td><?= ($key+1); ?></td>
                                            <td><?= $branchList->name; ?></td>
                                            <td><?= $branchList->address; ?></td>
                                            <td><?= $branchList->mobile; ?> </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Merchant List</th>
                            <td>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="30%">Name</th>
                                            <th width="30%">Address
                                            </th>
                                            <th width="30%">Contact Number
                                            </th>
                                        </tr>
                                        <?php 
                                            if(!empty($merchant_list)){
                                                foreach($merchant_list as $key => $merchant){
                                        ?>
                                        <tr>
                                            <td><?= ($key+1); ?></td>
                                            <td><?= $merchant->name; ?></td>
                                            <td><?= $merchant->address; ?></td>
                                            <td><?= $merchant->mobile; ?> </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Rider List</th>
                            <td>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="30%">Name</th>
                                            <th width="30%">Address
                                            </th>
                                            <th width="30%">Contact Number
                                            </th>
                                        </tr>
                                        <?php 
                                            if(!empty($rider_list)){
                                                foreach($rider_list as $key => $rider){
                                        ?>
                                        <tr>
                                            <td><?= ($key+1); ?></td>
                                            <td><?= $rider->name; ?></td>
                                            <td><?= $rider->address; ?></td>
                                            <td><?= $rider->mobile; ?> </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>