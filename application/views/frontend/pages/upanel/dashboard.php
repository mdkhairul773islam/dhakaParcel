<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/user.css')?>">

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
                        <h4>Dashboard</h4>
                    </div>
                    <?php
                        if(!empty($booking_delivered) <= 0){
                            load('frontend.pages.upanel.notice.message');
                        }
                    ?>
                    <div class="user_option">
                        <a href="#" data-toggle="modal" data-target="#loan_modal">
                            <i class="fas"><?= (!empty($booking_info) ? $booking_info : 0); ?></i>
                            Booking
                        </a>
                        <a href="#">
                            <i class="fas"><?= (!empty($booking_pending) ? $booking_pending : 0); ?></i>
                            Pending
                        </a>
                        <a href="#">
                             <i class="fas"><?= (!empty($booking_processing) ? $booking_processing : 0); ?></i>
                            Processing
                        </a>
                        <a href="#">
                            <i class="fas"><?= (!empty($booking_delivered) ? $booking_delivered : 0); ?></i>
                            Delivered
                        </a>
                        <a href="#">
                            <i class="fas"><?= (!empty($booking_info) ? $booking_info : 0) * 120?> ৳</i>
                            Amount
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->