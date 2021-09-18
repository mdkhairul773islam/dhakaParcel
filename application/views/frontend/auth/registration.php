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
                    <div class="form_div">
                        <h2>Create an Account</h2>
                        <form action="" method="POST" id="form">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Full name" id="full_name" class="form-control" required>
                                <label for="full_name">Full name</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Phone number" id="mobile" class="form-control" required>
                                <label for="mobile">Phone number</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" placeholder="Confirm password" id="confirm_password" class="form-control" required>
                                <label for="confirm_password">Confirm password</label>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>

                        <h6 class="credential-condition">Already have an account? <a href="<?=site_url('login')?>">Sign in</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- credential section end -->