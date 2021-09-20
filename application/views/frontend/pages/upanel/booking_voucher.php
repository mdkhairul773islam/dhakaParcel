<!-- include css -->
<link rel="stylesheet" href="<?= site_url('public/style/user.css') ?>">
<style>
    .customer_info {
        flex-wrap: wrap;
        display: flex;
    }

    .customer_info li strong {
        display: inline-block;
        min-width: 85px;
    }

    .customer_info li {
        min-width: 245px;
        width: 33.3333%;
        margin: 2px 0;
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
                        <table class="table table-bordered table-hover">
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
                                <td colspan="2"> <?= $booking_details->description ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <fieldset>
                        <legend>Product Details</legend>
                        <ul class="customer_info">
                            <?php
                            $category = get_name('categories', 'category', ['id' => $booking_details->category_id]);
                            $sub_category = get_name('subcategories', 'subcategory', ['id' => $booking_details->subcategory_id])
                            ?>
                            <li><strong>Category</strong> : <?= $category ?></li>
                            <li><strong>Sub Category</strong> : <?= $sub_category ?></li>
                        </ul>
                    </fieldset>
                    <div class="row mt-1">
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>From</legend>
                                <ul class="customer_info">
                                    <li><strong>Full Name</strong> : <?= $booking_details->from_name ?></li>
                                    <li><strong>Mobile</strong> : <?= $booking_details->from_mobile ?></li>
                                    <li><strong>Addre</strong> : <?= $booking_details->from_address ?></li>
                                    <li><strong>Division</strong> : <?= $booking_details->from_division ?></li>
                                    <li><strong>District</strong> : <?= $booking_details->from_districts ?></li>
                                    <li><strong>Upazila</strong> : <?= $booking_details->from_upazila ?></li>
                                </ul>
                            </fieldset>
                        </div>
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>To</legend>
                                <ul class="customer_info">
                                    <li><strong>Full Name</strong> : <?= $booking_details->to_name ?></li>
                                    <li><strong>MObile</strong> : <?= $booking_details->to_mobile ?></li>
                                    <li><strong>Addre</strong> : <?= $booking_details->to_address ?></li>
                                    <li><strong>Division</strong> : <?= $booking_details->to_division ?></li>
                                    <li><strong>District</strong> : <?= $booking_details->to_zila ?></li>
                                    <li><strong>Upazila</strong> : <?= $booking_details->to_upazila ?></li>
                                </ul>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->
