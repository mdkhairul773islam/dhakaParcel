<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Branch User</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name <span class="req">*</span></label>
                                <input type="text" name="name" placeholder="Branch Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Full Address <span class="req">*</span></label>
                                <input type="text" name="address" placeholder="Branch Address" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Branch <span class="req">*</span></label>
                                <select name="branch_id" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Branch</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Contact Number <span class="req">*</span></label>
                                <input type="text" name="contact_number" placeholder="Branch Contact Number"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Password <span class="req">*</span></label>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Image <span class="req">*</span></label>
                                <input type="file" name="image" placeholder="Image" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Save" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>