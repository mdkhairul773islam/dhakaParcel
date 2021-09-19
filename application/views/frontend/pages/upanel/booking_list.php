<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/user.css')?>">
<style>
    .table-bordered td, .table-bordered th {
        vertical-align: middle;
    }
</style>

<!-- dashboard section start -->
<section class="user_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php load('frontend.pages.upanel.aside'); ?>
            </div>
            <div class="col-md-8">
                <div class="user_content">
                    <div class="heading">
                        <h4>Booking List</h4>
                    </div>
                    <div class="table-responsive">
                        <?php
                            if(!empty($bookingList)){
                        ?>
                        <table class="table table-bordered table-hover" style="text-align: center;">
                            <tr style="background-color: #004AAD" class="text-white">
                                <th>SL</th>
                                <th>Booking Serial No</th>
                                <th>Booking Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($bookingList as $key => $booking){ ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $booking->booking_no; ?></td>
                                <td><?php echo ucfirst($booking->booking_status); ?></td>
                                <td class="action_btn">
                                    <a href="<?php echo site_url('user-panel/serialNo?serialNo='.$booking->booking_no); ?>" class="btn"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo site_url('user-panel/delete?serialNo='.$booking->booking_no); ?>" class="btn delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php } else{ ?>
                            <h4 class="my-2" style="color: #EF0606">Soory, You haven't booked yet!</h4>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->