<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/credential.css')?>">

<!-- credential section start -->
<section class="credential_section">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-md-5 pr-0">
                    <div class="welcome_div">

                    </div>
                </div>
                <div class="col-md-7 pl-0">
                    <div class="form_div">
                        <h2>Password Forgot</h2>
                        <p>Enter the Mobile phone number associated with your Dhaka Parcel account.</p>
                        <form action="<?php echo site_url('/get_password'); ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="mobile_no" pattern="[0-9]{11}" placeholder="Mobile phone number" class="form-control" required>
                                <label>Mobile phone number</label>
                            </div>
                            <button type="submit" class="btn">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- credential section end -->