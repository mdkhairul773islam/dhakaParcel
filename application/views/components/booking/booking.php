<style>
    .action_td .btn {
        padding: 2px 8px !important;
    }

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
                <div class="col-md-2">
                    <div class="form-group">
                        <input name="booking_no" placeholder="Booking No" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="from_name" placeholder="Name From	">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="from_mobile" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="booking_status" class="form-control">
                            <option value="" selected disabled>Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
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
                <th>Boking No</th>
                <th>Name From</th>
                <th>Name To</th>
                <th>Category</th>
                <th>SubCategory</th>
                <th style="width: 140px;">Mobile No</th>
                <th style="width: 120px;">Division</th>
                <th style="width: 120px;">Status</th>
                <th class="text-center">Action</th>
            </tr>
            <?php
            foreach ($bookingList as $key => $list) {
                $category = get_name('categories', 'category', ['id' => $list->category_id]);
                $sub_category = get_name('subcategories', 'subcategory', ['id' => $list->subcategory_id])
                ?>
                <tr>
                    <td><?php echo($key + 1); ?></td>
                    <td><?php echo $list->booking_no; ?></td>
                    <td><?php echo filter($list->from_name); ?></td>
                    <td><?php echo filter($list->to_name); ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $sub_category; ?></td>
                    <td><?php echo $list->from_mobile; ?></td>
                    <td><?php echo $list->from_division; ?></td>
                    <td>
                        <select name="status" class="form-control" id="status<?= $list->id ?>"
                                onchange="updateStatus('<?= $list->id; ?>')">
                            <option value="" selected disabled>Select Status</option>
                            <option <?= ($list->booking_status == 'pending' ? 'selected' : '') ?> value="pending">
                                Pending
                            </option>
                            <option <?= ($list->booking_status == 'processing' ? 'selected' : '') ?> value="processing">
                                Processing
                            </option>
                            <option <?= ($list->booking_status == 'delivered' ? 'selected' : '') ?> value="delivered">
                                Delivered
                            </option>
                        </select>
                    </td>
                    <td width="115" class="action_td text-center">
                        <a class="btn btn-primary"
                           href="<?php echo site_url('booking/booking/view/' . $list->booking_no) ?>"><i
                                    class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" onclick="return confirm('Are your sure to proccess this action ?')"
                           href="<?php echo site_url('booking/booking/delete/' . $list->booking_no) ?>"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>

<script>
    function updateStatus(id) {

        var status = $('#status' + id).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('booking/booking/status_update'); ?>",
            data: {
                id: id,
                status: status,
            }
        }).then(function (response) {
            //console.log(response);
            if (response == 'success') {
                toastr.success('Booking status successfully updated.', 'Success')
            } else {
                toastr.error('Some thing wrong check again.', 'Error')
            }
        });
    }
</script>