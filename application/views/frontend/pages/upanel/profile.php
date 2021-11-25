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
                        <h4>Profile</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile_info">
                                <div class="header_info">
                                    <a class="profile_img" href="">
                                        <img src="<?= site_url((!empty($user_data->image) ? $user_data->image : 'public\images\user\01.png')); ?>"
                                            alt="">
                                        <span class="cover">
                                            <i class="icon ion-md-images"></i>
                                        </span>
                                        <input @change='uploadFile()' type="file" name="image" id="file" ref="userFile">
                                    </a>
                                    <div class="title">
                                        <h5><?= (!empty($user_data->name) ? $user_data->name: 'Please Update Your username.')?></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="profile_info">
                                <div class="profile_edit">
                                    <h4>Personal Information</h4>
                                    <a href="#" data-toggle="modal" data-target="#edit_modal" title="Edit">
                                        <i class="icon ion-ios-create"></i>
                                    </a>
                                </div>
                                <ul>
                                    <li><strong>ID Number</strong>:
                                        <?= (!empty($user_data->subscriber_id) ? $user_data->subscriber_id: '')?></li>
                                    <li><strong>Email</strong>:
                                        <?= (!empty($user_data->email) ? $user_data->email: '')?></li>
                                    <li><strong>Mobile No</strong>:
                                        <?= (!empty($user_data->mobile) ? $user_data->mobile: '')?></li>
                                    <li><strong>Joined on</strong>:
                                        <?= (!empty($user_data->date) ? date("d-m-Y h:m:s A", strtotime($user_data->date)): '')?>
                                    </li>
                                    <li><strong>Address</strong>:
                                        <?= (!empty($user_data->address) ? $user_data->address: '')?></li>
                                </ul>
                            </div>

                            <!-- edit modal -->
                            <div class="modal fade" id="edit_modal">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Personal Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form content -->
                                            <form action="#" method="post">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label">Full Name</label>
                                                        <input type="text" name="name" value="<?= (!empty($user_data->name) ? $user_data->name: '')?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label">Mobile Number</label>
                                                        <input type="text" name="mobile" value="<?= (!empty($user_data->mobile) ? $user_data->mobile: '')?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" value="<?= (!empty($user_data->email) ? $user_data->email: '')?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" value="<?= (!empty($user_data->address) ? $user_data->address: '')?>" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <button type="submit" class="btn submit_btn">Update</button>
                                                        <button type="reset" class="btn reset_btn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="password_form">
                                <h4>Change Password</h4>
                                <form action="#" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" name="password" value="<?= $user_data->password ?>"
                                            placeholder="Old password" class="form-control" readonly>
                                        <input type="text" value="<?= $user_data->orginal_password ?>"
                                            placeholder="Old password" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="new_password" placeholder="New password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" placeholder="Confirm password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="change_password" class="btn submit_btn">Change
                                            Password</button>
                                        <button type="reset" class="btn reset_btn">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile section end -->