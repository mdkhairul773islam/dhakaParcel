<!-- include css -->
<link rel="stylesheet" href="<?=site_url('public/style/user.css')?>">

<!-- profile section start -->
<section class="user_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php load('frontend.pages.upanel.aside'); ?>
            </div>
            <div class="col-md-8">
                <div class="user_content">
                    <div class="heading">
                        <h4>Booking</h4>
                    </div>
                    <div class="user_box">
                        <form action="#" method="post">
                            <fieldset>
                                <legend>Product Details</legend>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Category</option>
                                                <option value="">Category One</option>
                                                <option value="">Category Two</option>
                                                <option value="">Category Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Sub Category</option>
                                                <option value="">Category One</option>
                                                <option value="">Category Two</option>
                                                <option value="">Category Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea rows="3" name="" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mt-1">
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>From</legend>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Division</option>
                                                <option value="">Division One</option>
                                                <option value="">Division Two</option>
                                                <option value="">Division Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Zila</option>
                                                <option value="">Zila One</option>
                                                <option value="">Zila Two</option>
                                                <option value="">Zila Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Upzila</option>
                                                <option value="">Upzila One</option>
                                                <option value="">Upzila Two</option>
                                                <option value="">Upzila Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="3" name="" class="form-control" placeholder="Adderss"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>To</legend>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Division</option>
                                                <option value="">Division One</option>
                                                <option value="">Division Two</option>
                                                <option value="">Division Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Zila</option>
                                                <option value="">Zila One</option>
                                                <option value="">Zila Two</option>
                                                <option value="">Zila Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Select Upzila</option>
                                                <option value="">Upzila One</option>
                                                <option value="">Upzila Two</option>
                                                <option value="">Upzila Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="3" name="" class="form-control" placeholder="Adderss"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <p><strong>Service Charge</strong> : 120 Tk</p>
                            <fieldset class="mt-1">
                                <legend>Payment Information</legend>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="division" class="form-control">
                                                <option value="" selected disabled>Payment Method</option>
                                                <option value="">Bkash</option>
                                                <option value="">Nagot</option>
                                                <option value="">Rocket</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="" placeholder="TRX Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="" placeholder="TRX Mobile No">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group text-right">
                                <button type="submit" style="letter-spacing: 5px;" class="btn submit_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile section end -->