<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/credential.css')?>">

<!-- credential section start -->
<section class="credential_section">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <?php if($this->session->flashdata('err')){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h5>Warning</h5>
                Your Access Is Wrong!! Please Try Again...
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
                        <h2>Please login</h2>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Mobile Number" id="mobile" value="<?=(isset($_GET['user']) ? $_GET['user'] : '')?>" class="form-control" required autocomplete="off">
                                <label for="mobile">Mobile Number</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required autocomplete="off">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-group forgot-div">
                                <div class="form-check">
                                    <input style="margin-top: 5px;" type="checkbox" class="form-check-input" id="check">
                                    <label class="form-check-label" for="check">Remember Me</label>
                                </div>
                                <a href="<?=site_url('forgot')?>">Forgot password</a>
                            </div>
                            <button type="submit" class="btn">Login</button>
                        </form>

                        <h6 class="credential-condition">Don’t have an account? <a href="<?=site_url('registration')?>">Register Now!</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- credential section end -->
