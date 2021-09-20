<!-- include css -->
<link rel="stylesheet" href="<?= site_url('public/style/user.css') ?>">

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
                                    <!--This Code are not Deleted-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="category_id" class="form-control selectpicker" data-live-search="true" required>
                                                <option value="" selected disabled>Category</option>
                                                <?php foreach ($categoryList as $category){ ?>
                                                    <option value="<?= $category->id ?>"><?= $category->category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="subcategory_id" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Sub Category</option>
                                                <?php foreach ($subCategoryList as $sub){ ?>
                                                    <option value="<?= $sub->id ?>"><?= $sub->subcategory ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="description" rows="3" class="form-control" required
                                                      placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mt-1">
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>From</legend>
                                        <div class="form-group">
                                            <input type="text" name="from_name" class="form-control" placeholder="Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="from_mobile" pattern="[0-9]{11}"  class="form-control" placeholder="Mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="from_division" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select Division</option>
                                                <?php
                                                    foreach ($divisions as $division){
                                                ?>
                                                <option value="<?= $division->name; ?>"><?= $division->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="from_districts" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select District</option>
                                                <?php
                                                foreach ($districts as $district){
                                                    ?>
                                                    <option value="<?= $district->name; ?>"><?= $district->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="from_upazila" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select Upzila</option>
                                                <?php
                                                foreach ($upazillas as $upazilla){
                                                    ?>
                                                    <option value="<?= $upazilla->name; ?>"><?= $upazilla->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="from_address" rows="3" name="" class="form-control"
                                                      placeholder="Adderss"></textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6">
                                    <fieldset>
                                        <legend>To</legend>
                                        <div class="form-group">
                                            <input type="text" name="to_name" class="form-control" placeholder="Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="to_mobile" pattern="[0-9]{11}" class="form-control" placeholder="Mobile" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="to_division" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select Division</option>
                                                <?php
                                                foreach ($divisions as $division){
                                                    ?>
                                                    <option value="<?= $division->name; ?>"><?= $division->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="to_zila" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select District</option>
                                                <?php
                                                foreach ($districts as $district){
                                                    ?>
                                                    <option value="<?= $district->name; ?>"><?= $district->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="to_upazila" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected disabled>Select Upzila</option>
                                                <?php
                                                foreach ($upazillas as $upazilla){
                                                    ?>
                                                    <option value="<?= $upazilla->name; ?>"><?= $upazilla->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="to_address" rows="3" class="form-control"
                                                      placeholder="Adderss"></textarea>
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
                                            <select name="payment" class="form-control selectpicker" data-live-search="true" required>
                                                <option value="" selected disabled>Payment Method</option>
                                                <?php
                                                    foreach ($payment_methods as $method){
                                                ?>
                                                <option value="<?= $method->name ?>"><?= $method->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="trx_number" placeholder="TRX Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="trx_mobile" placeholder="TRX Mobile No" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group text-right">
                                <button type="submit" style="letter-spacing: 5px;" class="btn submit_btn">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile section end -->