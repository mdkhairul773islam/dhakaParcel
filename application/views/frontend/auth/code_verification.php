<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/credential.css')?>">

<!-- credential section start -->
<section class="credential_section">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <?php if($this->session->flashdata('err')){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5>Warning</h5>
                Your Verification Code Is Wrong!!! <a href="<?=site_url('/resend_verification_code')?>">Resend Code</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-5 pr-0">
                    <div class="welcome_div"></div>
                </div>
                <div class="col-md-7 pl-0">
                    <div class="form_div">
                        <h2>Code Verification</h2>
                        <p>Please check your inbox - <?=($mobile)?></p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" id="code_verification" name="code" placeholder="Enter your code" class="form-control" autocomplete="off" required>
                                <label for="code_verification">Code</label>
                            </div>
                            <button type="submit" class="btn">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- credential section end -->
