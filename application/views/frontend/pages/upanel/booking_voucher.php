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
                        <h4>
                            <span>Booking Details</span>
                            <span class="ml-3 text-dark font-weight-bold font-italic"><small>Your Serial No : <?= $booking_details->booking_no; ?></small></span>
                        </h4>
                    </div>
                    <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="text-align: center;">
                                <tr style="background-color: #004AAD" class="text-white">
                                    <th>Booking Serial No</th>
                                    <th>Booking Status</th>
                                    <th>Delivery Date</th>
                                </tr>
                                <tr>
                                  <td><?= $booking_details->booking_no; ?></td>
                                    <td><?= ucfirst($booking_details->booking_status) ?></td>
                                    <td><?= $booking_details->delivery_date ?></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td colspan="2">
                                        <?= $booking_details->description ?>
                                    </td>
                                </tr>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->
