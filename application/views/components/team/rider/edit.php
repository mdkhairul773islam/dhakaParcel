<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Rider</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $rider[0]->name; ?>" placeholder="Rider Name"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address </label>
                                <input type="text" name="address" value="<?= $rider[0]->address; ?>"
                                    placeholder="Rider Address" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Districts </label>
                                <select ui-select2="{allowClear: true}" ng-model="district_id"
                                    ng-init="district_id='<?= $rider[0]->district_id; ?>'" name="district_id"
                                    class="form-control" data-placeholder="Select Districts" required>
                                    <option value="" selected disabled></option>
                                    <?php
                                        if(!empty($districtList)){
                                            foreach($districtList as $row){
                                    ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch </label>
                                <select ui-select2="{allowClear: true}" ng-model="branch_id"
                                    ng-init="branch_id='<?= $rider[0]->branch; ?>'" name="branch" class="form-control"
                                    data-placeholder="Select Branch" required>
                                    <option value="" selected disabled></option>
                                    <?php
                                        if(!empty($branchList)){
                                            foreach($branchList as $branch){
                                    ?>
                                    <option value="<?= $branch->code; ?>"><?= $branch->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number </label>
                                <input type="text" name="mobile" value="<?= $rider[0]->mobile; ?>"
                                    placeholder="Rider Contact Number" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email </label>
                                <input type="email" value="<?= $rider[0]->email; ?>" name="email" placeholder="Email"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Username </label>
                                <input type="text" name="username" value="<?= $rider[0]->username; ?>"
                                    placeholder="Username" class="form-control" required>
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
                                <select name="status" class="form-control" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option <?= ($rider[0]->status=='active' ? 'selected' : ''); ?> value="active"
                                        selected>Active</option>
                                    <option <?= ($rider[0]->status=='inactive' ? 'selected' : ''); ?> value="inactive">
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