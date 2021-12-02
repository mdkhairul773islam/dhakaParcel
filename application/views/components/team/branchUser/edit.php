<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Branch User</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <img class="mb-4" style="width: 120px; height: 120px;" src="<?= site_url($branch->image); ?>"
                        alt="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $branch->name; ?>" placeholder="Branch Name"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address </label>
                                <input type="text" name="address" value="<?= $branch->address; ?>"
                                    placeholder="Branch Address" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch </label>
                                <select ui-select2="{allowClear: true}" ng-model="branch_id"
                                    ng-init="branch_id='<?= $branch->branch; ?>'" name="branch" class="form-control"
                                    required>
                                    <option value="" selected disabled>Select Branch</option>
                                    <?php 
                                        if(!empty($branchList)){
                                            foreach($branchList as $key => $row){
                                    ?>
                                    <option value="<?= $row->code; ?>"><?= $row->name; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number </label>
                                <input type="text" name="mobile" value="<?= $branch->mobile; ?>"
                                    placeholder="Branch Contact Number" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email </label>
                                <input type="email" name="email" value="<?= $branch->email; ?>" placeholder="Email"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Password </label>
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Image </label>
                                <input type="file" name="image" placeholder="Image" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Status </label>
                                <select name="status" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option <?= ($branch->status=='active' ? 'selected': '')?> value="active" selected>
                                        Active</option>
                                    <option <?= ($branch->status=='inactive' ? 'selected': '')?> value="inactive">
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" name="update" value="Update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>