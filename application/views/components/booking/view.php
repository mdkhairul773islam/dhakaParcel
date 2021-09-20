<style>
    .customer_info {
        margin-bottom: 8px;
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

    fieldset {
        border: 1px solid #004AAD;
        padding: 5px 12px 0;
        margin: 8px 0 10px;
    }

    fieldset legend {
        border: 1px solid #004AAD;
        display: inline-block;
        letter-spacing: 8px;
        padding: 0 0 0 8px;
        font-weight: 600;
        font-size: 15px;
        margin: 0;
        width: auto;
        color: #fff;
        line-height: 23px;
        background: #004AAD;
        text-transform: uppercase;
    }

    .table {
        margin-top: 8px;
    }

    .table td,
    .table th {
        padding: 3px 5px;
        font-size: 15px;
    }

    .table-bordered > tbody > tr > th {
        color: white;
    }

    .heading h4 {
        font-weight: 700;
        font-size: 22px;
        color: #004AAD;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading panal-header">
        <div class="panal-header-title pull-left">
            <h1>Booking View</h1>
        </div>
    </div>
    <div class="panel-body">
        <div class="heading">
            <h4>
                <span>Booking Details</span>
                <span class="ml-3 text-dark font-weight-bold font-italic"><small>Your Serial No : <?= $booking_details->booking_no; ?></small></span>
            </h4>
        </div>
        <hr>
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
    <div class="panel-footer">&nbsp;</div>
</div>