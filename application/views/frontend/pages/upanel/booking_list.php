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
                        <h4>Booking List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL</th>
                                <th>Booking List</th>
                                <th>Booking Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Laptop</td>
                                <td>Delivered</td>
                                <td class="text-right action_btn">
                                    <a href="" class="btn"><i class="fas fa-eye"></i></a>
                                    <a href="" class="btn delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Laptop</td>
                                <td>Delivered</td>
                                <td class="text-right action_btn">
                                    <a href="" class="btn"><i class="fas fa-eye"></i></a>
                                    <a href="" class="btn delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Laptop</td>
                                <td>Delivered</td>
                                <td class="text-right action_btn">
                                    <a href="" class="btn"><i class="fas fa-eye"></i></a>
                                    <a href="" class="btn delete"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard section end -->