<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/credential.css')?>">

<!-- credential section start -->
<section class="credential_section">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-md-5 pr-0">
                    <div class="welcome_div"></div>
                </div>
                <div class="col-md-7 pl-0">
                    <div class="form_div formForgot_bg">
                        <h2>Thank You For Requesting.</h2>
                        <?php 
                            if(!empty($get_password)){
                        ?>
                            <p>I have send the password  to your mobile number. <br/> Please check it.</p>
                        <?php }else{ ?>
                        <p>Sorry your mobile number did not match with <strong>Dhaka Parcel</strong> Database records. <br/> Please try again...</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- credential section end -->
