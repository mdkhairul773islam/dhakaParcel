<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Branch</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">
                                <img src="<?= site_url($merchant->image); ?>" class="img-fluid img-thumbnail"
                                    style="height: 100px" alt="Merchant User">
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-secondary"><?= filter($merchant->status); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th width="30%">Company </th>
                            <td width="70%">
                                <?= $merchant->company_name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>
                                <?= $merchant->name; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Merchant ID</th>
                            <td>
                                <?= $merchant->merchant_code; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Full Address</th>
                            <td>
                                <?= $merchant->address; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Business Address</th>
                            <td>
                                <?= $merchant->business_address; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td>
                                <?php 
                                    $district = get_name('districts', 'name', ['id'=> $merchant->district_id, 'trash'=> 0]);
                                    $upazila = get_name('upazilas', 'name', ['id'=> $merchant->upazila_id, 'trash'=> 0]);
                                    $area   = get_name('area', 'name', ['id'=> $merchant->area_id, 'trash'=> 0]);
                                    $branch = get_name('branch', 'name', ['code'=> $merchant->branch, 'trash'=> 0]);
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
                                <?= $merchant->mobile; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Branch</th>
                            <td>
                                <?= $branch; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= $merchant->email; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>
                                <?= $merchant->username; ?>
                            </td>
                        </tr>


                        <tr>
                            <th>COD</th>
                            <td>
                                <?= number_format($merchant->cod); ?>%
                            </td>
                        </tr>


                        <tr>
                            <th>Service Area Merchant Delivery Charge </th>
                            <td>
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="45%">Service Area</th>
                                            <th width="45%">Charge
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>1
                                            </td>
                                            <td>Inside Dhaka
                                            </td>
                                            <td><?= number_format($merchant->inside_dhaka_charge); ?></td>
                                        </tr>
                                        <tr>
                                            <td>2
                                            </td>
                                            <td>Dhaka Sub
                                            </td>
                                            <td><?= number_format($merchant->dhaka_sub_delivery_charge); ?></td>
                                        </tr>
                                        <tr>
                                            <td>3
                                            </td>
                                            <td>Outside Dhaka
                                            </td>
                                            <td><?= number_format($merchant->outside_dhaka_delivery_charge); ?></td>
                                        </tr>
                                        <tr>
                                            <td>4
                                            </td>
                                            <td>Test
                                            </td>
                                            <td>
                                                <?= number_format($merchant->test_delivery_charge); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>FB URL</th>
                            <td>
                                <?= $merchant->facecbook; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Web Site</th>
                            <td>
                                <?= $merchant->website; ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="33%" class="text-center">Bank Account Name </th>
                                            <th width="33%" class="text-center">Bank Account Number </th>
                                            <th width="33%" class="text-center">Bank Name </th>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <?= $merchant->bank_account_name; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $merchant->bank_account_number; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $merchant->bank_name; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th width="33%" class="text-center">BKash Number</th>
                                            <th width="33%" class="text-center">Nagad Number</th>
                                            <th width="33%" class="text-center">Rocket Number </th>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <?= $merchant->bKash_number; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $merchant->nagad_number; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $merchant->rocket_number; ?>
                                            </td>
                                        </tr>

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