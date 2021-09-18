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
                    <?php load('frontend.pages.upanel.notice.message'); ?>
                    <div class="user_option">
                        <a href="#" data-toggle="modal" data-target="#loan_modal">
                            <i class="fas fa-bell"></i>
                            Notification
                        </a>
                        <a href="#">
                            <i class="fas fa-bell"></i>
                            Notification
                        </a>
                        <a href="#">
                            <i class="fas fa-bell"></i>
                            Notification
                        </a>
                        <a href="#">
                            <i class="fas fa-bell"></i>
                            Notification
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->