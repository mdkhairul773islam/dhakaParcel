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
                                <label class="control-label">Warehouse Name <span class="req">*</span></label>
                                <input type="text" name="name" placeholder="Warehouse Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Warehouse <span class="req">*</span></label>
                                <select name="warehouse_type" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>